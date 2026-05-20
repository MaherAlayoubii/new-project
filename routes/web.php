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
    $tasks = DB::table('tasks')->get();
    return view('tasks' , compact('tasks'));
});

Route::post('/tasks', function () {
    $tasks_name = $_POST['name'];
    DB::table('tasks')->insert([
        'name' => $tasks_name,

    ]);
    return redirect()->back();
});

Route::post('/tasks/delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});

Route::post('/tasks/edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});

Route::post('update', function () {
    $id = $_POST['id'];
    DB::table('tasks')->where('id','=', $id)->update([
        'name' => $_POST['name'],
    ]);
    return redirect('tasks');
});
