<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
   return view('home', [
        'greeting' => 'Hello',
        'name' => 'Colidom'
        ]);
});

Route::get('/jobs', function () {
    // Carga de datos anticipada (Limitado en Providers)
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    return view('/jobs/index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {

    // Validation...
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('jobs');

});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);
    return view('jobs.show', ['job'=> $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

