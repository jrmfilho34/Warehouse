@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="container">
</div>
@stop
@section('content')
<div class="container">
	<div class="row">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	 <form method="POST" action="{{ route('armazena') }}" >
       {{ csrf_field() }}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nome do Produto</label>
	    <input name="Nproduto" value="{{ old('Nproduto') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome do produto">
	    <small id="emailHelp" class="form-text text-muted">Código é de referência é gerado automaticamente.</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Data</label>
	    <input name="data" value="{{ old('data') }}" type="date" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Grupo</label>
	    <select name="grupo" class="form-control" id="exampleFormControlSelect1">
	      <option>Materiais de construção</option>
	      <option>Materiais elétricos</option>
	      <option>Escritório</option>
	      <option>Oficinas</option>
	      <option>Ferramentas</option>
	      <option>Hidráulico</option>
          <option>Higiene</option>
          <option>Horta</option>
          <option>Iformática</option>
   	      <option>Limpeza</option>
          <option>Móveis</option>
          <option>Oficina</option>
          <option>Pintura</option>
          <option>Utensílio Detentos</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Unidade</label>
	    <input name="unidade" value="{{ old('unidade') }}" type="text" class="form-control" id="exampleInputPassword1" placeholder="unidade de medida">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Valor</label>
	    <input name="valor" value="{{ old('valor') }}"type="number" class="form-control" id="exampleInputPassword1" step="0.01" placeholder="valor">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Quantidade</label>
	    <input name="quantidade" value="{{ old('quantidade') }}" type="number" class="form-control" id="exampleInputPassword1" placeholder="Quantidade">
	  </div>
	  <button type="submit" class="btn btn-primary">Cadastrar</button>
	</form>
</div>
</div>

@stop