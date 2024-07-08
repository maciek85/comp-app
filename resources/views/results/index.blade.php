<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-xl font-semibold mb-6">Event results</h1>
        
        <!-- Filter controls -->
        <div x-data="{ 
            items: ({{$event_results}}),
            classFilter: 'all',
            teamFilter: 'all',
            applyFilters() {
                this.items = ({{$event_results}}).filter(item => this.matchesFilters(item));
            },
            matchesFilters(item) {
                return (this.classFilter === 'all' || item.class_name === this.classFilter) &&
                       (this.teamFilter === 'all' || item.team_name === this.teamFilter);
            }
        }">
            <!-- Class filter -->
            <div class="mb-4">
                <label class="font-medium mb-2">Filter by Class:</label>
                <select x-model="classFilter" @change="applyFilters()">
                    <option value="all">All Classes</option>
                    <option value="Master">Master</option>
                    <option value="Common">Common</option>
                    <option value="class3">Class 3</option>
                </select>
            </div>
            
            <!-- Team filter -->
            <div class="mb-4">
                <label class="font-medium mb-2">Filter by Team:</label>
                <select x-model="teamFilter" @change="applyFilters()">
                    <option value="all">All Teams</option>
                    <option value="Team 1">Team 1</option>
                    <option value="Team 2">Team 2</option>
                    <option value="Team3">Team 3</option>
                </select>
            </div>
            
            <!-- Display filtered items -->
                <table class="min-w-full leading-normal">
                <thead>
                    <tr><th>Pos.</th><th>Start no.</th><th>First Name</th><th>Last Name</th><th>Class</th><th>Team</th><th>Points</th></tr></thead>
               <tbody>
                    <template x-for="(item) in items" :key="item.competitor_start_number">
                        <tr x-show="matchesFilters(item)">
                            <td x-text="item.competitor_position"></td>
                        <td>
                            <p class="text-gray-600" x-text=item.competitor_start_number></p></td>    
                     
                            <td>
                                <p class="text-gray-600" x-text= item.first_name></p>
                            </td>
                            <td>
                                <p class="text-gray-600" x-text=item.last_name></p>
                            </td>
                            <td>
                                <p class="text-gray-600" x-text=item.class_name></p>
                            </td>
                            <td >
                                <p class="text-gray-600" x-text=item.team_name></p>
                            </td>
                            <td >
                                <p class="text-gray-600" x-text=item.total_points></p>
                            </td>
                        </tr>
                    </template>
                        </tbody>
                    </table>
                        
        </div>
    </div>
</x-app-layout>