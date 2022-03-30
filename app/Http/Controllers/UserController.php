<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        try {
            $users = User::all();

            $data = [
                'data' => $users,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }   public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    } public function findOne($id)
    {
        try {
            $user = User::find($id);

            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}


