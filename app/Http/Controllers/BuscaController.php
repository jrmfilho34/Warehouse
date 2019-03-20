<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cadastro;
use PDF;


class BuscaController extends Controller
{
     public function index()
     {
          $data12 = DB::table('cadastros')
          ->orderBy('id','desc')
          ->paginate(10);
          $saida12 = DB::table('saidas')
          ->orderBy('id','desc')
          ->paginate(10);
          return view('buscar',['data12' => $data12,'saida12'=>$saida12]);
     }
    
    public function indexsaida()
    {
       $data12 = DB::table('cadastros')
          ->orderBy('id','desc')
          ->paginate(10);
          return view('saidabuscar',['data12'=> $data12]);

    }
    public function buscar(Request $request)
    {
    	if ($request->ajax()) {
    		
    		$query = $request->get('query');
    		if ($query != '') {
    			$data = DB::table('cadastros')
		    			->where('Nproduto','like','%'.$query.'%')
		    			->orwhere('grupo','like','%'.$query.'%')
		    			->orwhere('valor','like','%'.$query.'%')
		    			->orwhere('data','like','%'.$query.'%')
		    			->orwhere('unidade','like','%'.$query.'%')
		    			->orwhere('quantidade','like','%'.$query.'%')
		    			->orwhere('id','like','%'.$query.'%')
		    			->orderBy('id','desc')
		    			->get();
    		}else{
    			$data = DB::table('cadastros')
    			        ->orderBy('id','desc')
    			        ->get();
    		}
    		$total_row = $data->count();

    		if ($total_row > 0) {
    			foreach ($data as $row) 
          {
    				$output ='<tr>
    				             <td>'.$row->id.'</td>
                         <td>'.$row->Nproduto.'</td>
                         <td>'.$row->data.'</td>
                         <td>'.$row->grupo.'</td>
                         <td>'.$row->unidade.'</td>
                         <td>'.$row->valor.'</td>
                         <td>'.$row->quantidade.'</td>
                         <td><a href="/edit" class="btn btn-app">
                              <i class="fa fa-edit"></i>
                              edit
                             </a>
                         </td>
                      </tr>';
    			}
    		}else{$output ='<td>Não foi encontrado nenhum resultado!</td>';}

    		$data = array(
                'table_data' => $output,
                'total_data' => $total_row,
                'valores' => $data,
    		);    		
    	}
        return response()->json($data);
    }
    
    public function editar($id)
    {
        $product = Cadastro::findOrFail($id);
        return view('editar',compact('product'));
    }
 
    public function buscarSaida(Request $request)
    {
        if ($request->ajax()) {
        
        $query2 = $request->get('query');
        if ($query2 != '') {
          $data2 = DB::table('saidas')
              ->where('id','like','%'.$query2.'%')
              ->orwhere('cadastro_id','like','%'.$query2.'%')
              ->orwhere('nome','like','%'.$query2.'%')
              ->orwhere('grupo','like','%'.$query2.'%')
              ->orwhere('quantidadeS','like','%'.$query2.'%')
              ->orwhere('estoque','like','%'.$query2.'%')
              ->orwhere('Destino','like','%'.$query2.'%')
              ->orwhere('autor','like','%'.$query2.'%')
              ->orderBy('id','desc')
              ->get();
        }else{
          $data2 = DB::table('saidas')
                  ->orderBy('id','desc')
                  ->get();
        }
        $total_row2 = $data2->count();
        if ($total_row2 > 0) {
            $output = '';
        }else{
              $output ='<td>Não foi encontrado nenhum resultado!</td>';

        }
         $data2 = array(
                'table_data2' => $output,
                'total_data2' => $total_row2,
                'valores2' => $data2,
            );
        return response()->json($data2);
       }

    }


 }

