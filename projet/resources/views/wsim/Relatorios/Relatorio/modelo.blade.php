<!DOCTYPE html>
<html lang="en">
<head>
 <title>Relatório Prosim-WEB</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">




 <script src="//code.jquery.com/jquery-3.3.1.js"></script>
 <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script
 src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
 <link rel="stylesheet"
 href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link rel="stylesheet"
 href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

 <!----------------------- Funcionamento dos botoes no relatorio -------------------->

 <link rel="stylesheet"
 href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

 <script src="//cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
 <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
 <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
 <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

 <!---------------------------------------------------------------------------------->

</head>
<body>






 <div class="container-fluid">
  <h3>Relatório Teste</h3>
  


  <table id="teste" class="table table-striped table-bordered" style="width:100%">

   <thead class="thead-light">
    <tr>
     <th style='width: 20%;' font size='20'>Nome</th>
     <th>coluna1</th>
     <th>Nome</a></th>
     <th>Grupo</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>
     <th>Nome</a></th>



    </tr>

   </thead>
   <tbody>

    @foreach($faturamentos as $faturamento)

    <tr>
     <td >{{$faturamento->dt_emis}}</td>
     




    </tr>
    @endforeach



   </tbody>

  </table>


 </div>
 



</body>
<script>
$(document).ready(function() {
 $('#teste').DataTable( {
  dom: 'Bfrtip',
  buttons: [
  'csv', 'excel', 'pdf', 'print', 'colvis'
  ],

  "language": {
   "sEmptyTable": "Nenhum registro encontrado",
   "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
   "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
   "sInfoFiltered": "(Filtrados de _MAX_ registros)",
   "sInfoPostFix": "",
   "sInfoThousands": ".",
   "sLengthMenu": "_MENU_ resultados por página",
   "sLoadingRecords": "Carregando...",
   "sProcessing": "Processando...",
   "sZeroRecords": "Nenhum registro encontrado",
   "sSearch": "Pesquisar",
   "oPaginate": {
    "sNext": "Próximo",
    "sPrevious": "Anterior",
    "sFirst": "Primeiro",
    "sLast": "Último"
   },
   "oAria": {
    "sSortAscending": ": Ordenar colunas de forma ascendente",
    "sSortDescending": ": Ordenar colunas de forma descendente"
   }

  }


 } );

} );
</script>



</html>