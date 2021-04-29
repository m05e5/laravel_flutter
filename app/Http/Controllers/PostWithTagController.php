<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostWithTagResource;
use Exception;
use Illuminate\Http\Request;
use App\Models\postWithTag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostWithTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($postWithTag = PostWithTag::get()) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => PostWithTagResource::collection($postWithTag)
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $data = $request->all();
            foreach ($data['tag_id'] as $tags) {
                $postWithTag = new postWithTag();
                $postWithTag->post_id = $request->post_id;
                $postWithTag->tag_id = $request->$tags;
                $postWithTag->save();
                return Response()->json([
                    'status' => 'created',
                    'data' => $postWithTag,
                ], 201);
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
    public function postWithTags($id)
    {
        try {
            if ($post = DB::table('post_with_tags')->where('id', $id)->get()) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => PostWithTagResource::collection($post),
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            $post = PostWithTag::findOrFail($id);
            $post->delete();
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
