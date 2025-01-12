<?php

use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/vote', [VoteController::class, 'index'])->name('voting.index');
Route::get('/candidates/{category}', [VoteController::class, 'getCandidates'])->name('voting.getCandidates');
Route::post('/vote', [VoteController::class, 'vote'])->name('voting.vote');
Route::get('/results', [VoteController::class, 'results'])->name('voting.results');
