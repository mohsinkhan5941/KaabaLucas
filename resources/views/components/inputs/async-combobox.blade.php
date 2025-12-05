@props([
    'name',
    'selected' => '',
    'selectedLabel' => '',
    'searchUrl' => '',
    'placeholder' => 'Search...',
    'required' => false,
    'class' => ''
])

<div x-data="asyncCombobox()" class="relative">
    <div class="relative">
        <input
            type="text"
            x-ref="searchInput"
            @input="search($event.target.value)"
            @focus="loadRecentSearches()"
            @focus="open = true"
            @click.away="open = false"
            :placeholder="selectedLabel || '{{ $placeholder }}'"
            class="form-control {{ $class }}"
            :class="{ 'border-primary-500': open }"
            autocomplete="off"
        />
        
        <input type="hidden" name="{{ $name }}" x-ref="hiddenInput" value="{{ $selected }}" />
        
        <!-- Search Icon -->
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        
        <!-- Loading Indicator -->
        <div x-show="loading" class="absolute inset-y-0 right-0 flex items-center pr-10">
            <svg class="animate-spin h-4 w-4 text-primary-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" 
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 
                         5.291A7.962 7.962 0 014 12H0c0 3.042 
                         1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
    </div>

    <!-- Dropdown -->
    <div x-show="open" x-transition 
         class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg max-h-60 overflow-auto">
         
        <template x-for="(item, index) in filteredItems" :key="index">
            <div
                @click="selectItem(item)"
                class="px-4 py-2 cursor-pointer hover:bg-gray-100 text-sm"
                :class="{ 'bg-primary-50 text-primary-700': selected === item.value }"
            >
                <span x-text="item.label"></span>
            </div>
        </template>
        
        <div x-show="filteredItems.length === 0 && !loading" 
             class="px-4 py-2 text-sm text-gray-500">
            No record found
        </div>
    </div>
</div>

<script>

function asyncCombobox() {
    return {
        name: '{{ $name }}',
        searchUrl: '{{ $searchUrl }}',
        selected: '{{ $selected }}',
        selectedLabel: '{{ $selectedLabel }}',
        open: false,
        loading: false,
        searchTerm: '',
        items: [],
        filteredItems: [],
        searchTimeout: null,
        recentKey: '',

        init() {
            this.recentKey = 'recent_' + this.name;

            // Load selected item initially
            if (this.selected && this.selectedLabel) {
                this.items = [{ value: this.selected, label: this.selectedLabel }];
                this.filteredItems = this.items;
            }
        },

        async performSearch(query) {
            if (!query || query.length < 1) {
                this.loadRecentSearches();
                return;
            }

            if (!this.searchUrl) {
                console.error('Search URL not provided');
                this.filteredItems = [];
                return;
            }

            this.loading = true;
            try {
                const response = await fetch(`${this.searchUrl}?search=${encodeURIComponent(query)}&limit=5`);
                const data = await response.json();
                
                if (data.success && Array.isArray(data.data)) {
                    // Limit to 5
                    this.items = data.data.slice(0, 5);

                    // Sort alphabetically
                    this.filteredItems = this.items.sort((a, b) => a.label.localeCompare(b.label));
                } else {
                    this.filteredItems = [];
                }
            } catch (error) {
                console.error('Search error:', error);
                this.filteredItems = [];
            } finally {
                this.loading = false;
            }
        },

        search(query) {
            this.searchTerm = query;
            this.open = true;
            if (this.searchTimeout) clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => this.performSearch(query), 300);
        },

        selectItem(item) {
            this.selected = item.value;
            this.selectedLabel = item.label;
            this.$refs.hiddenInput.value = item.value;
            this.$refs.searchInput.value = item.label;
            this.open = false;

            this.saveRecent(item);

            this.$dispatch('combobox-change', {
                name: this.name,
                value: item.value,
                option: item
            });
        },

        saveRecent(item) {
            let recents = JSON.parse(localStorage.getItem(this.recentKey) || '[]');
            
            // Remove duplicate if exists
            recents = recents.filter(r => r.value !== item.value);
            
            // Add new on top
            recents.unshift(item);
            
            // Limit to 5
            if (recents.length > 5) recents = recents.slice(0, 5);

            // Sort ascending by label
            recents = recents.sort((a, b) => a.label.localeCompare(b.label));
            
            localStorage.setItem(this.recentKey, JSON.stringify(recents));
        },

        loadRecentSearches() {
            const recents = JSON.parse(localStorage.getItem(this.recentKey) || '[]');
            if (recents.length > 0) {
                // Sort ascending by label
                this.filteredItems = recents.sort((a, b) => a.label.localeCompare(b.label));
                this.open = true;
            }
        }
    }
}
</script>
