<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Users\InsertUser;
use  App\Users\ReqUser;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function registerUser(Request $req){

        //Validar entrada POST
        $this->validate($req, [

            'user'          =>'required | min:3',
            'password'      =>'required | min:6',
            'confpassword'  =>'required | same:password',
        ],
        [
            'password.required'     => 'Campo senha é obrigatório!',
            'password.min'     => 'Campo senha deve ter no mínimo 6 caracters!',
            'confpassword.required' => 'Campo confirmar senha é obrigatório!',
            'user.required'         => 'Campo usuário é obrigatório!',
            'user.min'         => 'Campo usuário deve ter no mínimo 3 caracters',
            'confpassword.same'     => 'Senhas não são iguais!',
        ]
        );

        try{
            $user = new InsertUser;
            $user->usuario = $req->user;
            $user->senha = bcrypt($req->password);
            $user->created_at = now();
            $user->updated_at = null;
            $user->save();

            return redirect('/singin')->with('success_msg','Usuário(a) '. $req->user .' adicionado(a)!');

        }catch(\Exception $e){
            return redirect('/singin')->with('error_msg','Falha ao cadastrar usuário!', $e);
        }
    }

    function validaUser(Request $req){

        $login    = $req->input( 'user' ); // Email ou username
        $password = bcrypt( $req->password );

        // if (Auth::attempt(['usuario' => $login, 'password' => $password])) {
        //     // The user is active, not suspended, and exists.
        //     echo 'funcionou';
        // }
        $credentials = array(
            'usuario'=> $req->user,
            'senha'=> $req->password,
        );

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            echo 'sucesso';
            //return redirect()->intended('dashboard');
        }else{
            echo 'erro';


        }

        // $user = ReqUser::where('usuario', $login)->first();

        // if($user->senha == $password){
        //     echo "senhas batem";
        // }
        // var_dump($password);
        // var_dump($user->senha);

    //     if (Auth::attempt ( array (
    //         'usuario' => $req->get ( 'user' ),
    //         'senha' => bcrypt($req->get ( 'password' ))
    // ) )) {
    //     session ( [
    //             'usuario' => $req->get ( 'user' )
    //     ] );
    //     return Redirect::back ();
    // } else {
    //     echo 'Falha';
        // Session::flash ( 'message', "Invalid Credentials , Please try again." );
        // return Redirect::back ();




    }
}
