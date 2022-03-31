<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    public function show()
    {   
        Log::info('all Posts');
        try {
            $posts = Post::all();
            Log::info('all posts done');

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
        Log::info('create Posts');
        try {
            $post = new Post();
            $post->title = 'Title';
            $post->description = 'description';
            $post->save();
            Log::info('create post two done');
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
        Log::info('update Posts');
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
            Log::info('update post done');
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function delete($id)
    {
        Log::info('delete Posts');
        try {
            $post = Post::find($id);
            $post->delete();

            $data = [
                'data' => $post,
                'sucess' => 'ok'
            ];
            Log::info('delete post done');
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function findOne($id)
    {
        Log::info('findOne Posts');
        try {
            $post = Post::find($id);

            $data = [
                'data' => $post,
                'sucess' => 'ok'
            ];
            Log::info('findOne post done');
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function create(Request $request)
    {
        Log::info('create Posts');
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
            Log::info('create post done');
            return response()->json($data, 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }public function handle(Request $request, Closure $next)
    {
        Log::info('FSD Middleware');

if ($request->is_admin === 1) {

        return $next($request);
    }
    return response()->json(['error' => 'Unauthorized'], 401);
    }
}
