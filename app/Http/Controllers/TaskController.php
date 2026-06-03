<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('tasks'));
    }

    public function tasks(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:10',
        ]);

        DB::table('tasks')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {

        // DB::table('tasks')->where('id', $id)->delete();
        Task::destroy($id);

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }

    public function update()
    {
        $id = $_POST['id'];

        // DB::table('tasks')->where('id', '=', $id)->update([
        //     'name' => $_POST['name'],
        // ]);

        $task = Task::find($id);
        $task->name = $_POST['name'];
        $task->save();

        return redirect('tasks');
    }
}
