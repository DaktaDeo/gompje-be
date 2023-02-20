<div class="mt-12 spaced-y-10">
    <div>
        <div class="flex mt-1 text-gray-500 text-xs mb-2 gap-2">
            <x-relative-time :date-time="$post->release_date" prefix="Published →" />
            <div>
                {{$post->readingTime}} min read
            </div>
        </div>

        @if($post->is_compact)
            <span class="text-lg text-gray-900 dark:text-gray-200">
                {{$post->title}}
            </span>
        @else
            <a href="{{$post->view}}"
               class="
        text-gray-900
        dark:text-gray-200
        text-xl
        font-bold
        no-underline
        hover:underline hover:text-indigo-400
        dark:hover:text-indigo-400
      ">
                {{ $post->title }}
            </a>
        @endif
    </div>

    <div class="text-base leading-normal mt-1">
        {{ $post->excerpt }}
    </div>

    @if(!$post->isCompact)
        <div class="text-base leading-normal mt-2">
            <a href="{{$post->view}}"
               class=" text-gray-900 dark:text-gray-200 hover:text-indigo-400 dark:hover:text-indigo-400 text-sm no-underline hover:underline "
               style="outline-width: 0px !important; user-select: auto !important;"
            >
                {{ $readMoreText }}
            </a>
        </div>
    @endif
</div>
