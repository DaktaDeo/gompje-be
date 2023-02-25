<x-master-layout page-title="journal">

    <x-post-index page-title="journal"
                  page-link="/journal"
                  page-subtitle="A very very very small set of entries.."
                  read-more-text="Read this entry →"
                  :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('journal')
                        ->sortByDesc('date')"
    >
        <x-slot name="intro">
            <p>
                I have written a LOT of journal entries. First in a paper journal, then in a digital journal. Thousands.
            </p>
            <p class="mt-4">
                Writing & drawing helps me a lot to get my thoughts in order. I have a lot of thoughts, and I guess I
                need to get them out of my head.
                Almost all of these are very private.
            </p>
            <p class="mt-4">
                But I sometimes write stuff that I feel like sharing. So here we are.
            </p>
        </x-slot>

    </x-post-index>

</x-master-layout>


