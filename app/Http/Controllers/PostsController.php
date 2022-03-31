<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    public function show()
    {
        try {
            $posts = Post::all();

            $data = [
                'data' => $posts,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function createTwo()
    {
        try {
            $post = new Post();
            $post->title = 'Title';
            $post->body = 'Body';
            $post->save();

            $data = [
                'data' => $post,
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
        try {
            $post = Post::findOrFail($id);
            if (isset($request->title)) {
                $post->title = $request->title;
                if ($request->has('description')) {
                    $post->description = $request->description;
                }
                $post->save();
            }


            $data = [
                'data' => $post,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function delete($id)
    {
        try {
            $post = Post::find($id);
            $post->delete();

            $data = [
                'data' => $post,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function findOne($id)
    {
        try {
            $post = Post::find($id);

            $data = [
                'data' => $post,
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
        try {
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id = $request->user_id;
            $post->save();

            $data = [
                'data' => $post,
                'sucess' => 'ok'
            ];
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
