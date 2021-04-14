<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RegisterAuthRequests;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;






class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->matricule = $request->matricule;
        $user->password = bcrypt($request->password) ;
        $user->filiere = $request->filiere;
        $user->save();

        if($this->loginAfterSignUp){
            return $this->login($request);
        }

        return response()->json([
            'status' => 'ok',
            'data' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $input = $request->only('matricule', 'password');

        $jwt_token = null;
        if(!$jwt_token = JWTAuth::attempt($input)){
            dd(JWTAuth::attempt($input));
            return response()->json([
                'status'=>'invalid_credentials',
                'message' => 'the informations you entered are not valide.',
            ], 401);
        }

        return response()->json([
            'status' => 'ok',
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'reuqired'
        ]);

        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'status'=>'ok',
                'message' => 'je sais pas se que sa veut dire',
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'status'=>'internal server error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAuthUser(Request $request){
        $this->validator($request,[
            'token'=> 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        return response()->json(['user'=>$user]);
    }

    protected function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code,
        ['Content-type' =>  'application/json;charset=UTF-8',
         'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE

        );
    }


}
