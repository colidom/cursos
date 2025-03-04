<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use function Pest\Laravel\get;

Route::get('/', function () {
   return view('home', [
        'greeting' => 'Hello',
        'name' => 'Colidom'
        ]);
});

Route::get('/jobs', function () {
    // Carga de datos anticipada (Limitado en Providers)
    $jobs = Job::with('employer')->get();
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);
    return view('job', ['job'=> $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

