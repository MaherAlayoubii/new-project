<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/tasks', function () {
    return view('tasks');
});

Route::post('create', function () {
    $tasks_name = $_POST['name'];
    DB::table('tasks')->insert([
        'name' => $tasks_name,
       
    ]);
    return view('tasks');
});
