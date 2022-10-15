<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use LdapRecord\Connection;


class LoginController extends Controller
{
    
    protected function credentials(Request $request){
      if($request->username==null && $request->password==null){
        return [ "respuesta" => "Usuario invalido"];
      };
      try{
        $connection = new Connection([
          'hosts' => ['192.168.1.9'],
          'username' => $request -> username . "@marrz.com",
          'password' => $request -> password
        ]);
        $connection-> connect();
        return [ "respuesta" => "true"];
     }
     catch(\LdapRecord\Auth\BindException $e){
      $error = $e -> getDetailedError();
      return[
        "error" => $error -> getErrorMessage(),
        "code" => $error -> getErrorCode(),
      ];
     }

    }


    protected $redirectTo=RouteServiceProvider::HOME;
}