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

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);
    return view('jobs.show', ['job'=> $job]);
});

// Store
Route::post('/jobs', function () {

    // Validation...
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('jobs');

});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find($id);
    return view('jobs.edit', ['job'=> $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    // Authorize (On hold...)

    $job = Job::findOrFail($id);
    $job->update([
        'title'=> request('title'),
        'salary' => request('salary')
    ]);
    return redirect('/jobs/' . $job->id);
});

// Delete
Route::delete('/jobs/{id}', function ($id) {

    Job::findOrFail($id)->delete();
    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

