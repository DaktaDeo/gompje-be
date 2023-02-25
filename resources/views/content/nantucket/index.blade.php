<x-master-layout page-title="nantucket">

<x-post-index page-title="There once was a man in Nantucket. 🪣"
              page-link="/nantucket"
              page-subtitle="A collection of silly & _dark_ writings"
              read-more-text="Read →"
                :show-excerpt="false"
              :posts="app(\App\Repositories\PostsRepository::class)
                        ->findByCategory('nantucket')
                        ->sortByDesc('date')"
>
    <x-slot name="messages">
        <div class="text-xl text-orange-700 my-4">
            <strong>Everything I write is NEVER intended to offend anyone.</strong>
        </div>
    </x-slot>
    <x-slot name="intro">
            <p>
                Ah! Nantucket. Home of the man who once had a bucket.
            </p>
            <p class="mt-4">
                These aren’t limericks I guess.., although I try to follow the same cadans they have.
                There is something about that starting phrase “there once was a man in
                Nantucket” that just gets me started writing silly, sarcastic, unusual
                things. I have an odd sense of humour that isn’t for everyone.
            </p>
            <p class="mt-4">
                No. I don’t live in Nantucket. I don’t even live in the US. I live in Ghent, Belgium.
            </p>
            <p class="mt-4">
                I’m not sure why I started writing these, but I think it was because I was
                reading a lot and I wanted to try my hand at these. I’m not sure
                if I’m any good at it, but I do enjoy writing them.
            </p>
            <p class="mt-4">
                And no, Copilot didn’t write any of them. I did. I’m not sure if I should be.
            </p>
    </x-slot>
</x-post-index>
</x-master-layout>


