<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class ApiAuthController extends Controller
{   /**
    * @OA\POST(
    *     path="/belajar-laravel/api/register",
    *     tags={"Authentication"},
    *     summary="Register User",
    *     description="Register New User",
    *     @OA\RequestBody(
    *          @OA\JsonContent(
    *              type="object",
    *              @OA\Property(property="name", type="string", example="Jhon Doe"),
    *              @OA\Property(property="email", type="string", example="jhondoe@example.com"),
    *              @OA\Property(property="password", type="string", example="12345678"),
    *              @OA\Property(property="password_confirmation", type="string", example="12345678")
    *          ),
    *      ),
    *      @OA\Response(response=200, description="Register New User Data" ),
    *      @OA\Response(response=400, description="Bad request"),
    *      @OA\Response(response=404, description="Resource Not Found")
    * )
    */
    public function register(Request $request)  {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }
    
    /**
     * @OA\Post(
     *     path="/belajar-laravel/api/login",
     *     tags={"Authentication"},
     *     summary="Login (Authentitication)",
     *     operationId="login",
     *
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="Enter your email",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Enter password",
     *                     type="password"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout() {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}