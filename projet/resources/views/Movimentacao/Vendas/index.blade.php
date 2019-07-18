<!--@extends('adminlte::page')-->

@section('content')



<div class="container">
 <div class="row">
  <div class="col-md-11">
   <div class="panel panel-default">

    <ol class="breadcrumb panel-heading">
     <li><a href="{{route('home')}}">Home</a></li>
     <li class="active">Relatório de Vendas</li>
    </ol> 

    <div class="panel-body">
     <div class="col-md-1">
      <a class="btn btn-primary btn-sm" href="{{ route('categoria.adicionar')}}">Adicionar</a>
     </div>

     <div class="col-md-4">
      <form action="{{ route ('testevendas.index')}}" method="get">
       {{ csrf_field()}}
       <div class="input-group input-group-sm">
        <input type="text" name="criterio" class="form-control" placeholder="buscar por nome...">
        <div class="input-group-btn">
         <button type="submit" class="btn btn-primary">

          <i class="glyphicon glyphicon-search"></i>
         </button>
        </div>
       </div>
      </form>
     </div> 

    </div>

   </div>
  </div>
 </div>
</div>

<div class="container">
 <div class="row">
  <div class="col-md-11">
   <div class="panel panel-default">

    <!--container-->
    <div class="container">
     <ul class="nav nav-tabs">
      <!--li class="nav active"><a href="#A" data-toggle="tab">Data</a></li-->
      <li class="nav"><a href="#A" data-toggle="tab">Data</a></li>
      <li class="nav active"><a href="#B" data-toggle="tab">Clientes</a></li>
      <li class="nav"><a href="#C" data-toggle="tab">Produto</a></li>
      <li class="nav"><a href="#D" data-toggle="tab">Agrup Prod</a></li>
      <li class="nav"><a href="#E" data-toggle="tab">Vendedor</a></li>
      <li class="nav"><a href="#F" data-toggle="tab">Região</a></li>
      <li class="nav"><a href="#G" data-toggle="tab">Estabelecimento</a></li>
      <li class="nav"><a href="#H" data-toggle="tab">Categoria</a></li>
      <li class="nav"><a href="#I" data-toggle="tab">Cidade</a></li>
      <li class="nav"><a href="#J" data-toggle="tab">UF</a></li>
      <li class="nav"><a href="#L" data-toggle="tab">Regional</a></li>

     </ul>

     <!-- Tab panes -->
     <div class="tab-content">
      <div class="tab-pane" id="A">
       <br>
       <div class="form-group">
        <label class="col-sm-1 control-label" for="dt_alt">Data Inicial:</label>
        <div class="col-sm-2">
         <input class="form-control" name="dt_alt" type="date">
        </div>
       </div>
       <br><br>
       <div class="form-group">
        <label class="col-sm-1 control-label" for="dt_alt">Data Final:</label>
        <div class="col-sm-2">
         <input class="form-control" name="dt_alt" type="date">
        </div>
       </div>
      </div>

      <!--div class="tab-pane fade fade in active" id="B"-->
      <div class="tab-pane fade fade in active" id="B">

       <table class="table table-bordered" style="width:100%">

        <thead class="thead-light">
         <tr>
          <th><input type="checkbox" id="checkTodos" name="checkTodos"></th>
          <!--th class="col-md-1">Código</th-->
          <th class="col-md-12">Nome</a></th>
         </tr>
        </thead>
        <tbody>

         @foreach($pessoas as $pessoa)

         <tr>
          <td><input type="checkbox" name="nomecheck" id="nomecheck"></td>
                                   
          <td >{{$pessoa->nome}}</td>

          @endforeach

         </tbody>
        </table>

        <div align="center">

         @if (isset($form))
         {!! $pessoas->appends($form)->links()!!}
         @else
         {!! $pessoas->links() !!}
         @endif

        </div>

       </div> <!--id="B"-->

       <div class="tab-pane" id="C">

        <table class="table table-bordered" style="width:100%">

         <thead class="thead-light">
          <tr>
           <th>#</th>
           <!--th class="col-md-1">Código</th-->
           <th class="col-md-12">Nome</a></th>
          </tr>
         </thead>
         <tbody>

          @foreach($produtos as $produto)

          <tr>
           <td><input type="checkbox" name="produtocheck" id="produtocheck"></td>
           <!--td >{{$produto->id_item}}</td-->                          
           <td >{{$produto->nome}}</td>

           @endforeach

          </tbody>
         </table>

         <div align="center">

          @if (isset($form))
          {!! $produtos->appends($form)->links()!!}
          @else
          {!! $produtos->links() !!}
          @endif

         </div>

        </div><!--id="C"-->

        <div class="tab-pane" id="D">Verificar Agrupamento
        </div> <!--id="D"-->

        <div class="tab-pane" id="E">

         <table class="table table-bordered" style="width:100%">

          <thead class="thead-light">
           <tr>
            <th>#</th>
            <!--th class="col-md-1">Código</th-->
            <th class="col-md-12">Nome</a></th>
           </tr>
          </thead>
          <tbody>

           @foreach($vendedores as $vendedor)

           <tr>
            <td><input type="checkbox" name="vendedorcheck" id="vendedorcheck"></td>
            <!--td >{{$vendedor->id_vend}}</td-->                          
            <td >{{$vendedor->nome}}</td>

            @endforeach

           </tbody>
          </table>

          <div align="center">

           @if (isset($form))
           {!! $vendedores->appends($form)->links()!!}
           @else
           {!! $vendedores->links() !!}
           @endif

          </div>
         </div><!--id="E"-->

         <div class="tab-pane" id="F">

          <table class="table table-bordered" style="width:100%">

           <thead class="thead-light">
            <tr>
             <th>#</th>
             <!--th class="col-md-1">Código</th-->
             <th class="col-md-12">Nome</a></th>
            </tr>
           </thead>
           <tbody>

            @foreach($regioes as $regiao)

            <tr>
             <td><input type="checkbox" name="regiaocheck" id="regiaocheck"></td>
             <!--td >{{$regiao->id_regiao}}</td-->                          
             <td >{{$regiao->nome}}</td>

             @endforeach

            </tbody>
           </table>

           <div align="center">

            @if (isset($form))
            {!! $regioes->appends($form)->links()!!}
            @else
            {!! $regioes->links() !!}
            @endif

           </div>

          </div> <!--id="F"-->

           <div class="tab-pane" id="G">

          <table class="table table-bordered" style="width:100%">

           <thead class="thead-light">
            <tr>
             <th>#</th>
             <!--th class="col-md-1">Código</th-->
             <th class="col-md-12">Nome</a></th>
            </tr>
           </thead>
           <tbody>

            @foreach($estabelecimentos as $estabelecimento)

            <tr>
             <td><input type="checkbox" name="estabcheck" id="estabcheck"></td>
             <!--td >{{$estabelecimento->id_estab}}</td-->                          
             <td >{{$estabelecimento->nome}}</td>

             @endforeach

            </tbody>
           </table>

           <div align="center">

            @if (isset($form))
            {!! $estabelecimentos->appends($form)->links()!!}
            @else
            {!! $estabelecimentos->links() !!}
            @endif

           </div>

          </div> <!--id="G"-->


           <div class="tab-pane" id="H">

          <table class="table table-bordered" style="width:100%">

           <thead class="thead-light">
            <tr>
             <th>#</th>
             <!--th class="col-md-1">Código</th-->
             <th class="col-md-12">Nome</a></th>
            </tr>
           </thead>
           <tbody>

            @foreach($categorias as $categoria)

            <tr>
             <td><input type="checkbox" name="categcheck" id="categcheck"></td>
             <!--td >{{$categoria->id_categ}}</td-->                          
             <td >{{$categoria->nome}}</td>

             @endforeach

            </tbody>
           </table>

           <div align="center">

            @if (isset($form))
            {!! $categorias->appends($form)->links()!!}
            @else
            {!! $categorias->links() !!}
            @endif

           </div>

          </div> <!--id="H"-->

          <div class="tab-pane" id="I">

       <table class="table table-bordered" style="width:100%">

        <thead class="thead-light">
         <tr>
          <th><input type="checkbox" id="checkTodos" name="checkTodos"></th>
          <!--th class="col-md-1">Código</th-->
          <th class="col-md-12">Nome</a></th>
         </tr>
        </thead>
        <tbody>

         @foreach($pessoas as $pessoa)

         <tr>
          <td><input type="checkbox" name="cidadecheck" id="cidadecheck"></td>
          <!--td >{{$pessoa->id_pessoa}}</td-->                          
          <td >{{$pessoa->cidade}}</td>

          @endforeach

         </tbody>
        </table>

        <div align="center">

         @if (isset($form))
         {!! $pessoas->appends($form)->links()!!}
         @else
         {!! $pessoas->links() !!}
         @endif

        </div>

       </div> <!--id="I"-->

        <div class="tab-pane" id="J">

       <table class="table table-bordered" style="width:100%">

        <thead class="thead-light">
         <tr>
          <th><input type="checkbox" id="checkTodos" name="checkTodos"></th>
          <!--th class="col-md-1">Código</th-->
          <th class="col-md-12">Nome</a></th>
         </tr>
        </thead>
        <tbody>

         @foreach($ufs as $uf)

         <tr>
          <td><input type="checkbox" name="ufcheck" id="ufcheck"></td>
                             
          <td >{{$uf->uf}}</td>

          @endforeach

         </tbody>
        </table>

        <div align="center">

         @if (isset($form))
         {!! $ufs->appends($form)->links()!!}
         @else
         {!! $ufs->links() !!}
         @endif

        </div>

       </div> <!--id="J"-->

        <div class="tab-pane" id="L">

        <table class="table table-bordered" style="width:100%">

         <thead class="thead-light">
          <tr>
           <th>#</th>
           <!--th class="col-md-1">Código</th-->
           <th class="col-md-12">Nome</a></th>
          </tr>
         </thead>
         <tbody>

          @foreach($regionais as $regional)

          <tr>
           <td><input type="checkbox" name="regionalcheck" id="regionalcheck"></td>
           <!--td >{{$regional->id_regional}}</td-->                          
           <td >{{$regional->nome}}</td>

           @endforeach

          </tbody>
         </table>

         <div align="center">

          @if (isset($form))
          {!! $regionais->appends($form)->links()!!}
          @else
          {!! $regionais->links() !!}
          @endif

         </div>

        </div><!--id="L"-->



         </div> <!-- Tab panes -->

        </div><!--container-->


       </div> 
      </div>
     </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    $("#checkTodos").click(function(){
     $('input:checkbox').prop('checked', $(this).prop('checked'));
    });

   
  </script> 

    @stop
