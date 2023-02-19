<div>
    <div>
        @if($post->hasAttribute('date'))
            <div class="text-gray-400 text-xs uppercase">
                {{$post->date}}
            </div>
        @endif

        @if($post->isCompact)
            <span class="text-lg text-gray-900 dark:text-gray-200">
                {{$post->title}}
            </span>
        @elseif($post->hasAttribute('title'))
            <a href="{{$post->permalink}}"
               class=" text-gray-900 dark:text-gray-200 text-lg font-bold no-underline hover:underline hover:text-indigo-400 dark:hover:text-indigo-400 ">
                {{ $post->title }}
            </a>
        @endif
    </div>

    @if($post->hasAttribute('blurb'))
        <div class="text-base leading-normal mt-1">
            @if($post->hasAttribute('blurb.image'))
                {{$post->blurbImage}}
            @endif

            @if($post->hasAttribute('blurb.text'))
                {{$post->blurbText}}
            @endif
        </div>
    @endif

    @if(!$post->isCompact)
        <div class="text-base leading-normal mt-2">
            <a href="{{$post->permalink}}"
               class="text-gray-900 dark:text-gray-200 hover:text-indigo-400 dark:hover:text-indigo-400 text-sm no-underline hover:underline">
                {{ $readMoreText }}
            </a>
        </div>
    @endif
</div>
