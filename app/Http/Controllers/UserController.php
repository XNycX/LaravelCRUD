<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
    public function show(Request $request)
    {
        dd($request->query('active'));


        Log::info('all User');
        try {
            $users = User::all();

            $data = [
                'data' => $users,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function create(Request $request)
    {
        Log::info('create User');
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            $validator = FacadesValidator::make($request->all(), [
                'name' => 'required'|'min:3'|'max:20'|'unique:users'|'string',
                'email' => 'required'|'email'|'unique:users',
                'password' => 'required'|'min:6'|'max:20',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }

            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function update(Request $request, $id)
    {
        Log::info('update User');
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
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }   public function delete($id)
    {
        Log::info('delete User');
        try {
            $user = User::find($id);
            $user->delete();

            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    } public function findOne($id)
    {
        Log::info('findOne User');
        try {
            $user = User::find($id);

            $data = [
                'data' => $user,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}


