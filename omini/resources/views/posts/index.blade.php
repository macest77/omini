<x-app-layout>
    <x-slot name="header">
        <x-input-error :messages="$errors->get('access')" class="mt-2" />
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List All Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($posts as $post)
                <div class="border-b">
                    <div class="px-6 py-1 text-gray-900 dark:text-gray-100 w-3/4" style="float: left">
                        <div >{{ __('Title') }}:
                            <div class="ml-12">{{ $post->title }}</div>
                        </div>
                        <div>{{ __('Content') }}:
                            <div class="ml-12">{{ substr($post->content,0,100) }}
                            @if (strlen($post->content) > 100)
                                ...
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-1 text-gray-900 dark:text-gray-100" style="float: right">
                        <a href="{{ route('posts.edit', $post->id) }}">{{ __('Edit') }}</a><br />
                        <a href="{{ route('posts.show', $post->id) }}">{{ __('Read') }}</a>
                    </div>
                    <div style="clear: both"> </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
