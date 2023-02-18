<?php

namespace App\Models;

class Post extends MpSushiModel
{
    protected array $rows = [
        [
            'slug' => 'index', //relative to the folder content/ folder, will load file. this is a pk

            'title' => 'Who the hell am I?',
            'author' => 'Veerle Deschepper',
            'description' => '',
            //            'post_types' => ['home'],
            //            'labels' => [],

            'created_at' => '',
            'updated_at' => '',
        ],
    ];
}
