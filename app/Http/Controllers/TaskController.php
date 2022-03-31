<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function getAllByUser($userId)
    {
        $tasksByUserId = User::find($userId)->tasks;

        return $tasksByUserId;
    }
}
