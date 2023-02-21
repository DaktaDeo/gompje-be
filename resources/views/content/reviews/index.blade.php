<x-master-layout title="reviews">

<x-post-index page-title="reviews"
              page-link="/reviews"
              page-subtitle="Sometimes I write reviews of things"
                read-more-text="Read this review →"
              :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('reviews')
                        ->sortByDesc('date')"
>
    <x-slot name="slot">
        <div class="text-sm text-gray-500 mt-4 border-2 p-4">
            <p>
                I read a lot of books, you can find a list of them on <a href="https://www.goodreads.com/user/show/57591973-veerle-deschepper"
                                                                         class="text-indigo-600 hover:text-indigo-500">Goodreads</a>.
                Actually I prefer to listen to them, that way my mind can wander and I can do other things at the same time.
                Most, if not all, the books I read are English, so I listen to them in English.
                I also listen to a lot of podcasts, mostly in English as well. I also watch a lot of movies and series, but I don't write reviews about them.
            </p>
            <p class="mt-4">
                Can you believe Github Copilot has generated the above blurb? I'm not sure if I should be impressed or scared...
            </p>
            <p class="mt-4">
                It even has generated that last sentence, which is a bit scary.. it's like it can read my mind. AGAIN! 😰 😱 ??
                ....... and just as I'm reading The Shining to ...... 😱 😱 😱
            </p>
        </div>
    </x-slot>
</x-post-index>

</x-master-layout>


