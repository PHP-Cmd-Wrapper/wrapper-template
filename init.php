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

if ($words->count() > 1) {
    $namespace = $words->map('ucwords')->slice(0, -1)->implode('\\');
} else {
    $namespace = $title;
}

$composerNewContent = str_replace(
    ['wrapper-name-slug', 'wrapper-name-title', 'wrapper-namespace'],
    [$slug, $title, $namespace],
    file_get_contents('composer.json'),
);

file_put_contents('composer.json', $composerNewContent);
