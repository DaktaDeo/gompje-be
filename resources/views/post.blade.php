<x-master-layout :title="$post->title">
    <article class="prose dark:prose-invert mx-auto max-w-prose">

        @if($post->hasTitle())
            <h1 class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight sm:text-4xl">
                {{$post->title}}
            </h1>
        @endif

        <div class="flex justify-between mt-8 text-gray-500 text-xs uppercase mt-6">
            @if($post->hasDate())
                <div>
                    Published → {{$post->date}}
                </div>
            @endif

            {{--                @if($post->hasAuthor())--}}
            {{--                    <div>--}}
            {{--                        By {{$post->author}}--}}
            {{--                    </div>--}}
            {{--                @endif--}}
        </div>

        <div>
            {!! $post->content !!}
        </div>

        @if($post->hasTags())
            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Tags: {{$post->tags}}
            </div>
        @endif


    </article>
</x-master-layout>
