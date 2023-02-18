<x-master-layout>
    <article class="prose dark:prose-invert mx-auto max-w-prose">

        <?php
            ray($content, $frontmatter);
            ?>
        @include($view)
    </article>
</x-master-layout>
