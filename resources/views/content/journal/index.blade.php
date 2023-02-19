<x-master-layout title="journal">

<x-post-index page-title="journal"
              page-link="/journal"
              page-subtitle="A collection of journal entries I've written"
                read-more-text="Read this article →"
              :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('journal')
                        ->sortByDesc('date')"
/>

</x-master-layout>


