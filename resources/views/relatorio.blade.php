@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="container">

 	  <section id="conteudo" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Relatórios : Saída</h3>
              <a href="#" id="relatorioSaida"class="btn btn-app"><i class="fa fa-file-pdf-o"></i>Relatório</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Referência</th>
                  <th>Produto</th>
                  <th>Quantidade</th>
                  <th>Destino</th>
                  <th>Autor</th>
                  <th>Data</th>
                  <th>Estoque</th>
                </tr>
                </thead>
                <tbody>
                @foreach($saida as $item)
                	<tr>
                		<td>{{ $item->id}}</td>
                	@foreach($cadastro as $element)
                	    @if($element->id == $item->cadastro_id)
                		<td>{{ $element->Nproduto}}</td>
                		@endif
                	@endforeach
                		<td>{{ $item->quantidadeS}}</td>
                		<td>{{ $item->Destino}}</td>
                		<td>{{ $item->autor}}</td>
                		<td>{{ $item->data}}</td>
                		<td>{{ $item->estoque}}</td>
                	</tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div> <!-- /.box -->
        </div>
    </div> 
</section>
</div>
@stop
@section('content')
 <div class="container">

 	  <section id="cadastroA" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Relatórios : Cadastro</h3>
              <a href="#" id="relatorioCadastro"class="btn btn-app"><i class="fa fa-file-pdf-o"></i>Relatório</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Referência</th>
                  <th>Nome</th>
                  <th>Data de registro</th>
                  <th>Grupo</th>
                  <th>Unidade</th>
                  <th>Valor</th>
                  <th>Quantidade Inicial</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cadastro as $item)
                	<tr>
                		<td>{{ $item->id}}</td>
                		<td>{{ $item->Nproduto}}</td>
                		<td>{{ $item->data}}</td>
                		<td>{{ $item->grupo}}</td>
                		<td>{{ $item->unidade}}</td>
                		<td>{{ $item->valor}}</td>
                		<td>{{ $item->quantidade}}</td>
                	</tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div> <!-- /.box -->
        </div>
    </div> 
</section>
</div>
@stop
@section('js')
<script type="text/javascript" src="{{ asset('jquery/dist/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/jspdf/dist/jspdf.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/html2canvas.min.js')}}"></script>
<script>
     $('#relatorioSaida').click(function(){
                  
          html2canvas(document.getElementById("conteudo")).then(canvas => {
              let pdf = new jsPDF('p', 'mm', 'a4');
              pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 0, ($('#conteudo').width()/7), ($('#conteudo').height()/7));
              pdf.save('doc.pdf');
          });
            
       });

      $('#relatorioCadastro').click(function(){

          html2canvas(document.getElementById("cadastroA")).then(canvas => {
              console.log('debug 2');
              let pdf = new jsPDF('p', 'mm', 'a4');
              pdf.addImage(canvas.toDataURL('image/png'), 'PNG',10, 0, ($('#cadastro').width()/7), ($('#cadastro').height()/7));
              pdf.save('doc.pdf');
          });
            
       });
</script>
@stop