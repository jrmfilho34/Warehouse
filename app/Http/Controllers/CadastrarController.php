<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Cadastro;

class CadastrarController extends Controller
{
    public function index()
    {
    	return view('cadastrar');
    }

    public function store(Request $request)
    {
    	 $validator = Validator::make($request->all(), [
            'Nproduto' => 'required|max:255',
            'data' => 'required',
            'grupo' => 'required',
            'unidade' => 'required',
            'valor' => 'required',
            'quantidade' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('cadastrar')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $cadastro = new Cadastro;
        $cadastro->Nproduto = $request->Nproduto;
        $cadastro->data = $request->data;
        $cadastro->grupo = $request->grupo;
        $cadastro->unidade = $request->unidade;
        $cadastro->valor = $request->valor;
        $cadastro->quantidade = $request->quantidade;
        $cadastro->save();

        return redirect()->route('home');
    
    }

    public function edit(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'Nproduto' => 'required|max:255',
            'data' => 'required',
            'grupo' => 'required',
            'unidade' => 'required',
            'valor' => 'required',
            'quantidade' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $cadastro = Cadastro::find($request->id);

        $cadastro->Nproduto = $request->Nproduto;
        $cadastro->data = $request->data;
        $cadastro->grupo = $request->grupo;
        $cadastro->unidade = $request->unidade;
        $cadastro->valor = $request->valor;
        $cadastro->quantidade = $request->quantidade;
        $cadastro->save();

        return redirect()->route('home');
    
    }
}
