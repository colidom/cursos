<x-layout title="Job">
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p class="font-bold">This Job Pays {{ $job['salary'] }}€ per year.</p>
</x-layout>
