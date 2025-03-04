<x-layout title="Jobs">
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($jobs as $job)
            <article>
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                    <div>
                        <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }}€ per year.
                    </div>
                </a>
            </article>
        @endforeach
    </div>
</x-layout>
