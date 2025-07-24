<?php

dataset('invalid_categories', [
    'name is required' => [
        ['description' => 'description'],
        'name'
    ],
    'name must be at least 3 characters long' => [
        ['name' => 'ab', 'description' => 'description'],
        'name'
    ],
    'name must be at most 255 characters long' => [
        ['name' => str_repeat('a', 256), 'description' => 'description'],
        'name'
    ],
    'description must be at most 1000 characters long' => [
        ['name' => 'name', 'description' => str_repeat('a', 1001)],
        'description'
    ]
]);