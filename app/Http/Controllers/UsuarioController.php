<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function store(UsuarioRequest $request)
    {
        $user = Usuario::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'celular' => $request->celular,
            'email' => $request->email,
            'password'=> Hash::make($request->password)
        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Usuario Cadastro com sucesso",
            "data" => $user
        ],200);
    }
    public function pesquisarPorld($id){
        $usuario = Usuario::find($id);

        if($usuario == null){
            return response()->json([
                'status' => false,
                'message' => "Usuario nao encontrado"
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $usuario
        ]);
    }

    public function pesquisarPorCpf($cpf)
    {
$usuario = Usuario::where('cpf' , '=' , $cpf)->first();

        return response()->json([
            'status' => true,
            'data' => $usuario
        ]);
    }

    public function retornarTodos(){
       $usuarios = Usuario::all(); 

        return response()->json([
            'status' => true,
            'data' => $usuarios
        ]);
           
    }
    public function pesquisarPorNome(Request $request)
    {
        $usuarios = Usuario::where('nome' , 'like' , '%' . $request->nome .'%')->get();

        if(count($usuarios) > 0){
       
        return response()->json([
            'status' => true,
            'data' => $usuarios
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => 'Não há resultados para pesquisa.'
    ]);
    }
}

