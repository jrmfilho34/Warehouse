<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadastro;
use App\Saida;

class RelatorioController extends Controller
{
    public function index()
    {
        $saida = Saida::all();
    	$cadastro = Cadastro::all();
    	return view('relatorio',['saida' => $saida,'cadastro' => $cadastro]);
    }

    public function createPDF(Request $request)
    {
        $pdf = \App::make('dompdf.wrapper');
        $texto = $request->query;
        $pdf->loadHTML('<h1>De uoa</h1>');
        return $pdf->stream();

      
    }
}
