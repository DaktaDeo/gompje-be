<div class="mt-12 spaced-y-10">
    <div>
        @if(!$post->is_draft)
            <div class="text-gray-400 text-xs uppercase">
                {{$post->release_date->format('l jS \\of F Y  H:i:s ')}}
            </div>
        @endif

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
