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

                <div class="max-w-xl text-gray-900 dark:text-gray-100 p-6">
                    <form action="{{ route('posts.comment', ['post' => $post->id]) }}" method="post">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="comment" :value="__('Add Comment')" />
                            <x-textarea-input id="comment" class="block mt-1 w-full" type="text" name="comment" required autocomplete="comment" rows="5"> {{ old('comment') }} </x-textarea-input>
                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Add comment') }}
                            </x-primary-button>
                        </div>

                    </form>

                </div>
                <div class=" text-gray-900 dark:text-gray-100 p-6">
                    <div style="font-style: italic">{{ __('All Comments') }}</div>
                    @foreach($post->comments()->get() as $comment)
                        <div class="text-wrap">
                        {{ $comment->comment }}
                        <hr />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
