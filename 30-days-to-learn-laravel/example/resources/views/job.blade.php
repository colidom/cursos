<x-layout title="Job">
    <x-slot name="heading">
        Job Page
    </x-slot>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p class="text-blue-500">This Job Pays {{ $job['salary'] }}€ per year.</p>
</x-layout>
