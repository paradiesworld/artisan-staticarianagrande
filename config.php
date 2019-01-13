<?php

return [
    'production' => false,
    'baseUrl' => 'https://arianagrande.tk/',
    'site' => [
        'title' => 'Ariana Grande Blog',
        'description' => 'Willkommen bei Ariana Grande Blog. Hier finden Sie alle Informationen über Ariana, Songs, Videos, Awards, Geschichten und vieles mehr über grande life style..',
        'image' => 'default-share.png',
    ],
    'owner' => [
        'name' => 'Ariana Fan',
        'twitter' => '',
        'github' => '',
    ],
    'services' => [
        'analytics' => '',
        'disqus' => '',
        'cloudinary' => '',
        'jumprock' => '',
    ],
    'collections' => [
        'posts' => [
            'path' => 'posts/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
    ],
    'excerpt' => function ($page, $limit = 250, $end = '...') {
        return $page->isPost
            ? str_limit_soft(content_sanitize($page->getContent()), $limit, $end)
            : null;
    },
    'imageCdn' => function ($page, $path) {
        return "https://res.cloudinary.com/{$page->services->cloudinary}/{$path}";
    },
];
