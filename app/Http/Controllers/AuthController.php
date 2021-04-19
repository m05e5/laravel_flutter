<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RegisterAuthRequests;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;






class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->pseudo = $request->pseudo;
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

    public function show(){
        return Auth::user();
    }

    public function login(Request $request)
    {
        $input = $request->only('matricule', 'password');

        $jwt_token = null;
        if(!$jwt_token = JWTAuth::attempt($input)){
            return response()->json([
                'status'=>'invalid_credentials',
                'message' => 'the informations you entered are not valide.',
            ], 401);
        }

        return response()->json([
            'status' => 'ok',
            'token' => $jwt_token,
            'data' => Auth::user()
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

    /**
     * Create a new Array for the response instance.
     *
     * @param string $message
     * @param mixed $issues
     * @param mixed $data
     * @return array
     */
    static function buildResponseDataArray($message, $issues, $data)
    {
        //TODO : maybe add the token tyme in data (Bearer)
        return ["message" => $message, "issues" => $issues, "data" => $data];
    }

    const STATUS_CODES = [
        'response_success' => [
            'ok' => 200,
            'created' => 201,
            'accepted' => 202,
            'no_content' => 204,
            'reset_content' => 205
        ],
        'response_client_errors' => [
            'bad_request' => 400,
            'unauthorized' => 401,
            'forbiden' => 403,
            'not_found' => 404,
            'not_allowed' => 405,
            'request_time_out' => 408,
        ],
        'response_server_errors' => [
            'internal_server_error' => 500,
            'not_implemented' => 501
        ]

    ];


}
