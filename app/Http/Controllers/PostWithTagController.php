<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostWithTagResource;
use Exception;
use Illuminate\Http\Request;
use App\Models\postWithTag;
use Illuminate\Support\Facades\Auth;

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

            for ($i=0; $i < count($request->tag_id[]); $i++) {
                $postWithTag = new postWithTag();
                $postWithTag->post_id = $request->post_id;
                $postWithTag->tag_id = $request->tag_id[$i];
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
    public function show($id)
    {
        //
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
        //
    }
}
