<?php

use ArtARTs36\Str\Str;

require 'vendor/autoload.php';

$slug = $_SERVER['argv'][1] ?? null;

if ($slug === null) {
    echo "You must enter correct name" . PHP_EOL;

    return 1;
}

$words = Str::make($slug)->explode('-');
$title = $words->map('ucwords')->implode('');

$composerNewContent = str_replace(
    ['wrapper-name-slug', 'wrapper-name-title'],
    [$slug, $title],
    file_get_contents('composer.json'),
);
