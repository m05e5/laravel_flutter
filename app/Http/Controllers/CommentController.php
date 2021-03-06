<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use Exception;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($comments = Comment::get()) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => CommentResource::collection($comments)
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
     * Show the form for crea ting a new resource.
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
            $comment = new Comment();
            $comment->user_id = Auth::id();
            if($request->imgUrl == 'null'){
                $comment->imgUrl = null;
            } else {
                $comment->imgUrl = $request->imgUrl;
            }
            $comment->post_id = $request->post_id;
            $comment->content = $request->content;
            $comment->save();
             //---------------------updating user questios answered---------
             $useranswered = Auth::user()->question_answered;
             $useranswered = $useranswered + 1;
             DB::table('users')->where('id', '=', Auth::id())->update(['question_answered' => $useranswered]);
             //-----------------------------------------------------------
            return Response()->json([
                'status' => 'created',
                'data' => $comment,
            ], 201);
        } catch (Exception $e) {
            return Response()->json([
                'status' => 'internal_server_error',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    public function commentsOnPost($id)
    {
        try {
            if ($post = DB::table('comments')->where('post_id', $id)->get()) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => CommentResource::collection($post),
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if ($comment = Comment::findOrFail($id)) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => CommentResource::collection($comment),
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
            $comment = Comment::findOrFail($id);
            $comment->user_id = Auth::id();
            $comment->post_id = $request->post_id;
            $comment->content = $request->content;
            $comment->save();
            return Response()->json([
                'status' => 'Updated',
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return Response()->json([
                'status' => 'ok',
                'data' => null,
            ], 200);
        } catch (Exception $e) {
            return Response()->json([
                'status' => 'internal_server_error',
                'data' => $e->getMessage(),
            ], 500);
        }
    }
}
