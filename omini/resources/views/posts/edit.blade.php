<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }} [id: {{ $post->id }}]
        </h2>
    </x-slot>

    <div>
        <form action="" method="post">
            @csrf
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <x-input-label for="title" :value="__('Post Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $post->title }}" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="content" :value="__('Post Content')" />
                            <x-textarea-input id="content" class="block mt-1 w-full" type="text" name="content" required autocomplete="content" rows="5"> {{ $post->content }} </x-textarea-input>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</x-app-layout>
