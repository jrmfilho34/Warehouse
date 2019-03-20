<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadastro;
use Validator;
use App\Saida;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;

class SaidaController extends Controller
{
    public function index($id){

        $cadastro = Cadastro::find($id);

    	return view('saida',['cadastro'=> $cadastro]);
    }

    public function baixar(Request $request)
    {
    	  $validator = Validator::make($request->all(), [
            'destino' => 'required|max:255',
            'data' => 'required',
            'quantidadeS' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $x = $request->quantidadeS;
        $cadastro = Cadastro::find($request->id);
        $y = $cadastro->quantidade;
        $tem = Saida::where('cadastro_id',$request->id)->orderBy('id', 'desc')->get();
        if ($tem->count() > 0) {
        	$a = $tem->first()->estoque;
        	$estoque = $a - $request->quantidadeS;
        }else
        {
        	$estoque = $y-$x;
        }
        

        $Saida = new Saida;
        $Saida->cadastro_id = $cadastro->id;
        $Saida->nome = $cadastro->Nproduto;
        $Saida->quantidadeS = $request->quantidadeS;
        $Saida->estoque = $estoque;
        $Saida->Destino = $request->destino;
        $Saida->data = $request->data;
        $Saida->grupo = $cadastro->grupo;
        $Saida->autor = Auth::user()->name;
        $Saida->save();

        return redirect()->route('home');
    }

    public function editar($id)
    {
       
       $cadastro = Cadastro::find($id);
       $saida =  DB::table('saidas')->where('cadastro_id', $cadastro->id)->first();
       
       return view('editarSaida',['saida' => $saida,'cadastro' => $cadastro]);
    }

    public function remove($id)
    {
       $Saida = Saida::find($id)->delete();
       return redirect()->route('home');

    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'destino' => 'required|max:255',
            'data' => 'required',
            'quantidadeS' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $Saida = Saida::find($request->id);
        $cadastro = Cadastro::find($request->cadastro_id);
        if($Saida->quantidadeS >= $request->quantidadeS )
        {
        	$estoque = $Saida->estoque + ($Saida->quantidadeS - $request->quantidadeS ) ;
        }else{
           $estoque = $Saida->estoque + ($Saida->quantidadeS-$request->quantidadeS) ;
       }
        
        $Saida->cadastro_id = $cadastro->id;
        $Saida->nome = $cadastro->Nproduto;
        $Saida->quantidadeS = $request->quantidadeS;
        $Saida->estoque = $estoque;
        $Saida->Destino = $request->destino;
        $Saida->data = $request->data;
        $Saida->grupo = $cadastro->grupo;
        $Saida->autor = Auth::user()->name;
        $Saida->save();

        return redirect()->route('home');

    }

}
