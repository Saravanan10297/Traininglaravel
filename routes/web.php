<?php

use App\Http\Controllers\student;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[student::class,'index']);


Route::get('/student/create',[student::class,'create']);

Route::post('/student/store',[student::class,'store']);

//Route::get('/student/')
//Route::post('/student/store',[student::class,'']);
Route::post('/student/onestudent',[student::class,'singledate'])->name('student.fetch'); //This key word for call route in HTML student.fetch
//Route::post('/student/onestudent', [student::class, 'singledate'])->name('student.fetch');

Route::get('/student/update',[student::class,'dropdown']);
Route::post('/student/storeUpdate',[student::class,'update'])->name('student.update');

