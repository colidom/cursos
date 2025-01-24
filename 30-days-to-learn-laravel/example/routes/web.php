<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Colidom'
        ]);
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Programmer',
                'salary' => '40000'
            ],
            [
                'id' => 2,
                'title' => 'Teacher',
                'salary' => '40000'
            ],
            [
                'id' => 3,
                'title' => 'Director',
                'salary' => '10000'
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Programmer',
            'salary' => '40000'
        ],
        [
            'id' => 2,
            'title' => 'Teacher',
            'salary' => '40000'
        ],
        [
            'id' => 3,
            'title' => 'Director',
            'salary' => '10000'
        ]
    ];
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ['job'=> $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

