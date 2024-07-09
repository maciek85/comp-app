<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8" >
        <h1 class="text-xl font-semibold mb-6">Event results</h1>
        
        <!-- Filter controls -->
        <div x-data="{ 
            items: ({{$event_results}}),
            teams: ({{$teams}}),
            competitor_classes: ({{$competitor_classes}}),
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
             <div >
            <div class="mb-4">
                <label class="font-medium mb-2">Filter by Class:</label>
                <select x-model="classFilter" @change="applyFilters()">
                    <option value="all">All</option>
                   <template x-for="comp_class in competitor_classes" :key="comp_class.class_id">
                        <option x-text="comp_class.class_name" :value="comp_class.class_name"></option>
                    </template>
                </select>
            </div>
            
            <!-- Team filter -->
            <div class="mb-4" >
                <label class="font-medium mb-2">Filter by Team:</label>
                <select   x-model="teamFilter" @change="applyFilters()">
                    <option value="all">All</option>
                    <template x-for="team in teams">
                        <option x-text="team.team_name" :value="team.team_name"></option>
                    </template>
                </select>
            </div>
            </div>
            <!-- Display filtered items -->
                <table class="min-w-full leading-normal">
                <thead>
                    <tr><th>Pos.</th><th>Start no.</th><th>First Name</th><th>Last Name</th><th>Class</th><th>Team</th><th>Points</th></tr></thead>
               <tbody>
                    <template  x-for="(item) in items" :key="item.competitor_start_number">
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700" x-show="matchesFilters(item)" >
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