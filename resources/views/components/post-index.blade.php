<div class="relative px-4 sm:px-6 lg:px-8">
    <div class="text-lg max-w-prose mx-auto">
        <h1>
        <span
            class=" block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase ">{{ $pageTitle }}</span>
            <span
                class=" mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight sm:text-4xl "
            >{{ $pageSubtitle }}</span>
        </h1>

        <div class="mt-4">
            @foreach($posts as $post)
                <x-post-preview :post="$post" :read-more-text="$readMoreText"/>
            @endforeach
        </div>
    </div>
</div>
