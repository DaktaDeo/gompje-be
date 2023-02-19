<article class="prose dark:prose-invert mx-auto max-w-prose">

    <div>
        {!! $post->content !!}
    </div>

    @if($post->hasAttribute('tags'))
        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            Tags: {{$post->tags}}
        </div>
    @endif

    <div class="flex justify-between mt-8 text-gray-500 text-xs uppercase mt-6">
        @if($post->hasAttribute('date'))
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
</article>
