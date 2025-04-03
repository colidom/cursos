<x-layout title="Job">
    <x-slot name="heading">
        Edit Job: {{ $job->title }}
    </x-slot>
    <form method="POST" action="/jobs/{{$job->id}}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="block min-w-0 grow py-1.5 pr-3 px3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="Shift Leader"
                                    value="{{$job->title}}"
                                    required
                                >
                            </div>
                            @error('title')
                                <div class="text-red-500 text-sm font-semibold mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input
                                    type="number"
                                    name="salary"
                                    id="salary"
                                    class="block min-w-0 grow py-1.5 pr-3 px3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="50.000€ per year"
                                    value="{{$job->salary}}"
                                    required
                                >
                            </div>
                            @error('salary')
                            <div class="text-red-500 text-sm font-semibold mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-between gap-x-6">
                <div class="flex items-center">
                    <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
                </div>
                <div class="flex item-center gap-x-6">
                    <div>
                        <a href="/jobs/{{$job->id}}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form method="POST" action="/jobs/{{$job->id}}" id="delete-form" class="hidden">
        @csrf
        @method("DELETE")
    </form>

</x-layout>
