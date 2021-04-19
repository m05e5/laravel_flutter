<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Exception;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($posts = Post::get()) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => PostResource::collection($posts)
                ], 200);
            } else {
                return Response()->json([
                    'status' => 'no_content',
                    'data' => null
                ], 204);
            }
        } catch (Exception $e) {
            return Response()->json([
                'status' => 'internal_server_error',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->imgUrl = $request->imgUrl;
            $post->save();
            return Response()->json([
                'status' => 'created',
                'data' => null,
            ], 201);
        } catch (Exception $e) {
            return Response()->json([
                'status' => 'internal_server_error',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if ($post = Post::findOrFail($id)) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => PostResource::collection($post),
                ], 200);
            } else {
                return Response()->json([
                    'status' => 'no_content',
                    'data' => null,
                ], 204);
            }
        } catch (Exception $e) {
            return Response()->json([
                'status' => 'internal_server_error',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->imgUrl = $request->imgUrl;
            $post->save();
            return Response()->json([
                'status' => 'Updated',
                'data' => null,
            ], 201);
        }  catch (Exception $e) {
            return Response()->json([
                'status' => 'internal_server_error',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
