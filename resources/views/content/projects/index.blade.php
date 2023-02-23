<x-master-layout title="projects">
    <x-post-index page-title="projects"
                  page-link="/projects"
                  page-subtitle="Some projects I've worked on"
                  read-more-text="More about this project →"
                  :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('projects')
                        ->sortByDesc('date')"
    >
        <x-slot name="intro">
            <p>
                Given this list is .. like almost empty.. you probably .. should check out these other places I hang
                out:
            </p>
            <div class=" ml-8 mt-2">
                <!--make a html unordered list of links to other places I hang out-->
                <ul class="list-disc">
                    <li>
                        <a href="https://github.com/Gompje" class="text-indigo-600 hover:text-indigo-500">GitHub</a>
                        (I
                        write code)
                    </li>
                    <li>
                        <a href="https://www.printables.com/social/72926-gompje/about"
                           class="text-indigo-600 hover:text-indigo-500">Printables</a> (I make 3D printable stuff)
                    </li>
                    <li>
                        <a href="https://phpc.social/@Gompje"
                           class="text-indigo-600 hover:text-indigo-500">Mastodon</a>
                        (Like Twitter, but better)
                    </li>
                </ul>
            </div>
        </x-slot>


    </x-post-index>
</x-master-layout>



