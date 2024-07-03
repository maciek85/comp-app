<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-xl font-semibold mb-6">Competitions</h1>
      
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <ul>
                @foreach ($competitions as $competition)
                    <div>{{ $competition-> competition_name }} | {{ $competition -> competition_max_points}}  </div>
                @endforeach
                </ul>
</x-app-layout>