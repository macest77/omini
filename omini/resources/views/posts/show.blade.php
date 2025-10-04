<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-xl text-gray-900 dark:text-gray-100 p-6">
                    <div style="font-style: italic">by {{ $post->user()->get()->value('name') }} on {{ $post->created_at }}</div>
                {{ $post->content }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
