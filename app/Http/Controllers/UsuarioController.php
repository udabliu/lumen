<?php

namespace App\Http\Controllers;

use App\Models\Usuario as ModelsUsuario;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function mostrarTodosUsuarios()
    {
        return response()->json(ModelsUsuario::all());// retorna usuarios do banco
    }

    public function cadastrarUsuario(Request $request)
    {   
        //validação dos campos
        $this->validate($request,[
            //campo usuario tem q ter no min 5 carac e max 40 carac
            'usuario' => 'required|min:5|max:40',
            'email' => 'required|email|unique: usuarios,email',
            'password' => 'required'
        ]);

        //inserindo usuario
        //instanciei
        $usuario = new ModelsUsuario();
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        //precisa salvar o registro no banco
        $usuario->save();
        return response()->json($usuario);
    }


    public function mostrarUmUsuario($id)
    {
        return response()->json(ModelsUsuario::find($id));
    }

    public function atualizarUsuario($id, Request $request)
    {
        $usuario = ModelsUsuario::find($id);
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();
        return response()->json($usuario);
    }


    public function deletarUsuario($id)
    {   
        //peguei o usuario do banco atraves do id
        $usuario = ModelsUsuario::find($id);
        $usuario->delete();

        //200 é o status da requisiçao (tipo o 404)
        return response()->json("deletado com sucesso", 200);
    }

    //
}
