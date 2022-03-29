<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function show()
    {
        $tasks = DB::table('tasks')->get()->toArray();

        return $tasks;
    }
    public function create()
    {
        return 'Create';
    }
    public function update()
    {
        return 'Update';
    }
    public function delete()
    {
        return 'Delete';
    }
}
