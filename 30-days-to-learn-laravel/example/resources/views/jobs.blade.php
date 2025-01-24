<x-layout title="Jobs">
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <h1>Hello from the Jobs Page!</h1>

    <ul>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }}€ per year.
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
