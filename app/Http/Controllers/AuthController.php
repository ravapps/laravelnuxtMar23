<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //  use ApiResponser;

    public function register(Request $request)
    {


      /* try {

        $attr = $request->validate([

        ]);
      } catch (Exception $e) {

      } */


      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed'
         ]);

         if ($validator->fails()) {
           return response()->json([
             'status' => 'Error',
             'message' => 'Invalid data',
             'data' => null
           ], 401);
         }

         $attr = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|unique:users,email',
           'password' => 'required|string|min:6|confirmed'
         ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        /* return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]); */
        if($user) {
            $data = ['token' => $user->createToken('API Token')->plainTextToken];
        }

        return response()->json([
          'status' => 'Success',
          'message' => null,
          'data' => $data
        ], 200);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
          //  return $this->error('Credentials not match', 401);
            return response()->json([
        			'status' => 'Error',
        			'message' => 'Credentials not match',
        			'data' => null
        		], 401);
        }

      /* return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]); */
        $data = [
              'token' => auth()->user()->createToken('API Token')->plainTextToken
          ];


        return response()->json([
          'status' => 'Success',
          'message' => null,
          'data' => $data
        ], 200);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}



/* Sanctum has some features too, for example, you can easily manage and assign token abilities by using this command:

return $user->createToken('token-name', ['server:update'])->plainTextToken;

And check the user’s token abilities with:

if ($user->tokenCan('server:update')) {

}  */
