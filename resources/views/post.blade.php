<x-master-layout :title="$title">
    <article class="prose dark:prose-invert mx-auto max-w-prose">

        @if($title !== null)
            <h1 class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight sm:text-4xl">
                {{$title}}
            </h1>
        @endif

        {!! $content !!}
    </article>
</x-master-layout>
