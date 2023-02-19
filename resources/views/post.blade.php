<?php
    abort_if(!$post, 404);
?>
<x-master-layout :title="$post->title">
   <x-post-detail :post="$post"/>
</x-master-layout>
