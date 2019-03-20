@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

<div class="container">
    <div class="input-group margin">
  <input type="text"  class="form-control" name="search" id="search" placeholder="Buscar">
  <span class="input-group-btn">
    <button type="button" class="btn btn-info btn-flat"> Procurar cadastro
    </button>
  </span>

</div>
  <section id="conteudo" class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total de Itens: 
                
                   <small id="total_records" class="label pull-right bg-blue"></small>
           </h3>
           <a  id="relatorioSaida" class="btn btn-app"><i class="fa fa-file-pdf-o"></i>Relatório</a>
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
                  <th>Quantidade</th>
                  <th>Ação</th>
                </tr>
                </thead>
                <tbody id="cadastro">
             

                </tbody>
              </table>
            </div>
        
            <!-- /.box-body -->
          </div>
        </div> 
      </div>
    </section>
</div>
@stop
@section('content')

@stop
@section('js')
<script type="text/javascript" src="{{ asset('jquery/dist/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/jspdf/dist/jspdf.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/html2canvas.min.js')}}"></script>
<script>
      $(document).ready(function(){
            /* primeira função*/
            function saida(query='')
            {
               $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url:"{{ route('buscarSaida') }}",
                  method:'GET',
                  data:{query:query},
                  dataType:'json',
                  success:function(data2){
                       $('#total_records2').text(data2.total_data2);
                       var saida="";
                     $.each(data2.valores2, function( index, value) {
                      saida +='<tr><td>'+value.id+'</td>'+
                            '<td>'+value.cadastro_id+'</td>'+
                            '<td>'+value.grupo+'</td>'+
                            '<td>'+value.quantidadeS+'</td>'+
                            '<td>'+value.estoque+'</td>'+
                            '<td>'+value.Destino+'</td>'+
                            '<td>'+value.autor+'</td>'+
                            '<td>'+value.data+'</td>'+
                            '<td><a href="/edit/saida/'+value.id+'" class="btn btn-app"><i class="fa fa-edit"></i>edit</a>'+
                            '<td><a href="/remove/saida/'+value.id+'" class="btn btn-app"><i class="fa fa-remove"></i>deletar</a>'+
                            '</td></tr>';
                    
                     });
                   
                      $('#resultado').html(saida);
                  }
               });
            }// termino da primeira função


            /* Leitura de variaveis e chamada da função */
            $(document).on('keyup','#saida',function()
            {
                 var query = $(this).val();
                 saida(query);  
   
            });// termino da chamada
          

           $('#relatorioSaida').click(function(){
                        
                html2canvas(document.getElementById("conteudo")).then(canvas => {
                    let pdf = new jsPDF('p', 'mm', 'a4');
                    pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 0, ($('#conteudo').width()/7), ($('#conteudo').height()/7));
                    pdf.save('doc.pdf');
                });
                  
             });

            /* segunda função*/
            function dados(query ='')
            {

              $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:"{{ route('buscar') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data){
                  //$('tbody').html(data.table_data);
                  $('#total_records').text(data.total_data);
                  var html="";
                  $.each(data.valores, function( index, value) {
                     html +='<tr><td>'+value.id+'</td>'+
                            '<td>'+value.Nproduto+'</td>'+
                            '<td>'+value.data+'</td>'+
                            '<td>'+value.grupo+'</td>'+
                            '<td>'+value.unidade+'</td>'+
                            '<td>'+value.valor+'</td>'+
                            '<td>'+value.quantidade+'</td>'+
                            '<td><a href="/edit/'+value.id+'" class="btn btn-app"><i class="fa fa-edit"></i>edit</a>'+
                                 '<a href="/saida/'+value.id+'" class="btn btn-app"><i class="fa fa-caret-square-o-down"></i>Saída</a>'+
                            '</td></tr>';
                     console.log(value.Nproduto);
                  });
                  $('#cadastro').html(html);
                }
              })
            }
            /*Leitura das variaveis e chamada da função */
            $(document).on('keyup','#search',function()
            {
                 var query = $(this).val();
                 dados(query);  
            });
      });
</script>
@stop