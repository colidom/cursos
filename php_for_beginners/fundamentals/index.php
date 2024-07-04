<?php

$movies = [
    [
        "title" => "Iron Man",
        "director" => "Jon Favreau",
        "release_year" => 2008,
        "url" => "https://www.marvel.com/movies/iron-man"
    ],
    [
        "title" => "The Avengers",
        "director" => "Joss Whedon",
        "release_year" => 2012,
        "url" => "https://www.marvel.com/movies/the-avengers"
    ],
    [
        "title" => "Guardians of the Galaxy",
        "director" => "James Gunn",
        "release_year" => 2014,
        "url" => "https://www.marvel.com/movies/guardians-of-the-galaxy"
    ],
    [
        "title" => "Black Panther",
        "director" => "Ryan Coogler",
        "release_year" => 2018,
        "url" => "https://www.marvel.com/movies/black-panther"
    ],
    [
        "title" => "Spider-Man: Homecoming",
        "director" => "Jon Watts",
        "release_year" => 2017,
        "url" => "https://www.marvel.com/movies/spider-man-homecoming"
    ]
];

$filteredMovies = array_filter($movies, function ($book) {
    return $book['release_year'] >= 2008 && $book['release_year'] <= 2020;
});

require 'index.view.php';
