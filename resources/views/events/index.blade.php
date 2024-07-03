<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-xl font-semibold mb-6">Events</h1>
      
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <ul>
                @foreach ($events as $event)
                    <div>{{ $event-> event_name }} | {{ $event -> event_description}} | {{$event -> event_date}} </div>
                @endforeach
                </ul>
</x-app-layout>