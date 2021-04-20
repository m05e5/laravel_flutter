<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserWithTagResource;
use Exception;
use Illuminate\Http\Request;
use App\Models\UserWithTag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserWithTagController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($userWithTag = UserWithTag::get()) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => UserWithTagResource::collection($userWithTag)
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
                $userWithTag = new USerWithTag();
                $userWithTag->user_id = Auth::id();
                $userWithTag->tag_id = $tags;
                $userWithTag->save();

            }
            return Response()->json([
                'status' => 'created',
                'data' => $userWithTag,
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
    public function userWithTags()
    {
        try {
            if ($user = DB::table(' user_with_tags')->where('id', Auth::id())->get()) {
                return Response()->json([
                    'status' => 'ok',
                    'data' => UserWithTagResource::collection($user),
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


    public function destroy($id)
    {
        try {
            $user = UserWithTag::findOrFail($id);
            $user->delete();
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
