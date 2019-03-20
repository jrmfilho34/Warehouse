@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dados do cadastro</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Referência</th>
                  <th>Nome</th>
                  <th>Grupo</th>
                  <th>Unidade</th>
                  <th>Valor</th>
                  <th>Quantidade Inicial</th>
                  <th>Estoque</th>
                </tr>
                </thead>
                <tbody>
                	<tr>
                		<td>{{ $cadastro->id}}</td>
                		<td>{{ $cadastro->Nproduto}}</td>
                		<td>{{ $cadastro->grupo}}</td>
                		<td>{{ $cadastro->unidade}}</td>
                		<td>{{ $cadastro->valor}}</td>
                		<td>{{ $cadastro->quantidade}}</td>
                	</tr>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div> <!-- /.box -->
        </div>
    </div> 
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Formulário de Saída</h3>
     @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <form method="POST" action="{{ route('update') }}" >
			       {{ csrf_field() }}
			       <input type="hidden" name="id" value="{{ $saida->id}}">
             <input type="hidden" name="cadastro_id" value="{{ $saida->cadastro_id}}">
			        <div class="row">
			     	    <div class="col-xs-6">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Data</label>
						    <input name="data" value="{{ $saida->data }}" type="date" class="form-control" id="exampleInputPassword1" placeholder="Password">
						  </div>
						</div>
						<div class="col-xs-6">
						  <div class="form-group">
						    <label for="exampleInputPassword1">Quantidade</label>
						    <input name="quantidadeS" value="{{ $saida->quantidadeS }}" type="number" class="form-control" id="exampleInputPassword1" placeholder="Quantidade">
						  </div>
				        </div>
				    </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Destino</label>
				    <input name="destino" value="{{ $saida->Destino }}" type="text" class="form-control" id="exampleInputPassword1">
				  </div>

				  <button type="submit" class="btn btn-primary">Editar</button>
             </form>
            </div><!-- /.box-body -->
          </div> <!-- /.box -->
        </div>
    </div> 
</section>

@stop
@section('content')
    <p>Para realizar alguma correção ou melhoria, envie um email para: jrmfilho23@gmail.com</p>
@stop