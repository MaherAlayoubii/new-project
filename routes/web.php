<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Maher';

     $Courses = [
      '1' => 'PHP',
      '2' => 'JavaScript',
      '3' => 'Python',
      '4' => 'Java',
      '5' => 'C#',
    ];
    return view('about' , compact('name' ,'Courses')); ;
});


Route::post('/about', function () {
    $name = $_POST['name'];
    $Courses = [
      '1' => 'PHP',
      '2' => 'JavaScript',
      '3' => 'Python',
      '4' => 'Java',
      '5' => 'C#'
    ];
    return view('about', compact('name', 'Courses'));
});

Route::get('/tasks', [TaskController::class , 'index']);

Route::post('/tasks', [TaskController::class , 'tasks']);

Route::post('/tasks/delete/{id}', [TaskController::class , 'destroy']);

Route::post('/tasks/edit/{id}', [TaskController::class , 'edit']);

Route::post('update', [TaskController::class , 'update']);

Route::get('app', function () {
    return view('layout.app');
});
