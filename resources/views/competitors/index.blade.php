<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-xl font-semibold mb-6">Competitors</h1>
      
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <ul>
                @foreach ($competitors as $competitor)
                    <div>{{ $competitor-> competitor_start_number }} | 
                        {{ $competitor-> first_name }} | {{ $competitor -> last_name}}
                    | {{ $competitor->class_name}} | {{ $competitor->team_name }} </div>
                @endforeach
                </ul>
</x-app-layout>