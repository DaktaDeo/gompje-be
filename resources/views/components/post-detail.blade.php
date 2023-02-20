<article class="prose dark:prose-invert mx-auto max-w-prose">

    <h1>
        <a href="{{$post->permaLink}}"
           class="permalink" aria-hidden="true" title="Permalink">
            #
        </a>
        {{$post->title}}
    </h1>


    <div class="flex justify-between mt-8 text-gray-500 text-xs mb-6">
        <x-relative-time :date-time="$post->release_date" prefix="Published →" />
        <div>
            {{$post->readingTime}} min read
        </div>
    </div>

    <div class="mt-4">
        {!! $post->content !!}
    </div>
</article>
