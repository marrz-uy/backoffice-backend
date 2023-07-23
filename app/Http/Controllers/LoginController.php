<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use LdapRecord\Connection;
use App\Http\Controllers\AuthController;
use LdapRecord\Models\ActiveDirectory\User;

class LoginController extends Controller
{
    
    protected function credentials(Request $request){
      if($request->username==null || $request->password==null){
        return [ "respuesta" => "Usuario invalido"];
      };
      try{
        $connection = new Connection([
          'hosts' => ['192.168.1.110'],
          'username' => $request -> username . "@marrz.com",
          'password' => $request -> password
        ]);
        $connection-> connect();
        return [ "respuesta" => "true"];
        $credentials=(['email'=>'Javi@gmail.com','password'=>'123456']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
     }
     catch(\LdapRecord\Auth\BindException $e){
      $error = $e -> getDetailedError();
      return[
        "respuesta" => $error -> getErrorMessage(),
        "code" => $error -> getErrorCode(),
      ];
     }

    }
    public function CrearUsuario(){
        $connection = new Connection([
            'hosts' => ['192.168.0.110'],
            'username' => "Administrador@marrz.com",
            'password' => "Marrz654321."
          ]);
          $connection-> connect();
          $user = (new User)->inside('ou=Users,dc=marrz,dc=com');
          $user->cn = 'John Doe';
          $user->unicodePwd = 'SecretPassword';
          $user->samaccountname = 'jdoe';
          $user->userPrincipalName = 'jdoe@acme.org';

          $user->save();

        //   // Sync the created users attributes.
        //   $user->refresh();

        //   // Enable the user.
        //   $user->userAccountControl = 512;

          try {
              $user->save();
          } catch (\LdapRecord\LdapRecordException $e) {
              // Failed saving user.
              $error = $e -> getDetailedError();
              return[
                "respuesta" => $error -> getErrorMessage(),
                "code" => $error -> getErrorCode(),
              ];
          }
        }
    //JWT----------------------------------------------------------------------------------------------------->
    public function me()
    {
        return response()->json(auth()->user());
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'respuesta'=>'true'
        ]);
    }
    //JWT----------------------------------------------------------------------------------------------------->
    protected $redirectTo=RouteServiceProvider::HOME;
}