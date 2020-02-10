<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Users\InsertUser;
use  App\Users\ReqUser;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //>>REGISTRAR USUÁRIO
    function registerUser(Request $req){

        //Validar entrada POST
        $this->validate($req, [

            'user'          =>'required',
            'password'      =>'required | min:6',
            'confpassword'  =>'required | same:password',
        ],
        [
            'password.required'     => 'Campo senha é obrigatório!',
            'password.min'     => 'Campo senha deve ter no mínimo 6 caracters!',
            'confpassword.required' => 'Campo confirmar senha é obrigatório!',
            'user.required'         => 'Campo usuário é obrigatório!',
            'confpassword.same'     => 'Senhas não são iguais!',
        ]
        );

        try{
            //CRIPTOGRAFAR SENHA
            $password = Hash::make($req->password);
            $user = new InsertUser;
            $user->usuario = $req->user;
            $user->senha = $password;
            $user->created_at = now();
            $user->updated_at = null;
            $user->save();

            return redirect('sign')->with('success_msg','Usuário(a) '. $req->user .' adicionado(a)!');

        }catch(\Exception $e){
            return redirect('sign',['message'=>'Falha ao cadastrar usuário!']);
        }
    }

    //>>VALIDAR ACESSO USUÁRIO
    function validaUser(Request $req){

        $login    = $req->input( 'user' ); // Email ou username
        $password = $req->input('password');

        //VALIDA ACESSO
        try{
            $hashedPassword = ReqUser::where('usuario', $login)->first();

            if(Hash::check($password , $hashedPassword->senha  ) )
            {
                session()->put('user', $hashedPassword->usuario);
                session()->save();
                return redirect('pesquisa');

            }else{
                return redirect('sign')->with('error_msg','Senha  inválida!');
            }

        }catch(\Exception $e){
            return redirect('sign')->with('error','Usuário(a) '. $req->user .' não existe!');
        }

    }

    public function getSignOut() {

        session()->flush();
        return redirect('sign');


    }

}
