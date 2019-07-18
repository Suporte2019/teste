<!--
 * wsim\Relatorios\Relatorio/listar.blade
 *
 * @version    1.0
 * @package    control
 * @subpackage BI
 * @author     FRDI
 * @copyright  Copyright (c) 2018 FRDI
 * @license    FRDI

 ************************************************************************
-->

<!--@extends('adminlte::page')-->


@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-11">
      <div class="panel panel-default">

        <ol class="breadcrumb panel-heading">
          <li><a href="{{route('home')}}">Home</a></li>
          <li><a href="{{route('bipessoa.lista')}}">Relatório</a></li>
          <li class="active">Teste</li>
        </ol>

        <div class="panel-body">

          <form class="form-horizontal" action="{{ route ('relatorio.novapagina')}}" method="get" onsubmit="javascript: abre_relatorio(this)">
            {{ csrf_field() }}




            <div class="form-group">

              
                <div class="col-sm-2">
                  <label >Data Inicio:</label>
                  <div class='input-group date' id='datainicial'>
                    <input type='text' class="form-control" name="dtinicio"/>
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar">
                      </span>
                    </span>
                  </div>
                   </div>
               

                <div class="col-sm-2">
                  <label >Data Fim:</label>
                  <div class='input-group date'  id='dtfinal'>
                    <input type='text' class="form-control" name="dtfinal" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar">
                      </span>
                    </span>
                  </div>
                </div>
              </div>


              <div class="form-group ">

              

              <div class="col-sm-2">
                <label for="categoria">Categoria:</label>
                <select id="categoria" multiple="multiple" class="form-control" name="categoria[]">

                  @foreach($categorias as $categoria)
                  <option value="{{$categoria->id}}"> {{$categoria->nome}}
                  </option>
                  @endforeach
                </select>
              </div>

               <div class="col-sm-2">
                <label for="estabelecimento">Estabelecimento:</label>
                <select id="estabelecimento" multiple="multiple" class="form-control" name="estabelecimento[]">

                  @foreach($estabelecimentos as $estabelecimento)
                  <option value="{{$estabelecimento->id}}"> {{$estabelecimento->nome}}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="col-sm-2">
                <label for="produto">Produto:</label>
                <select id="produto" multiple="multiple" class="form-control" name="produto[]">

                  @foreach($produtos as $produto)
                  <option value="{{$produto->id}}"> {{$produto->nome}}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="col-sm-2">
                <label for="vendedor">Vendedor:</label>
                <select id="vendedor" multiple="multiple" class="form-control" name="vendedor[]">

                  @foreach($vendedores as $vendedor)
                  <option value="{{$vendedor->id}}"> {{$vendedor->nome}}
                  </option>
                  @endforeach
                </select>
              </div>

               <div class="col-sm-2">
                <label for="regiao">Região:</label>
                <select id="regiao" multiple="multiple" class="form-control" name="regiao[]">

                  @foreach($regioes as $regiao)
                  <option value="{{$regiao->id}}"> {{$regiao->nome}}
                  </option>
                  @endforeach
                </select>
              </div>
   
   <div class="col-sm-2">
                <label for="regional">Regional:</label>
                <select id="regional" multiple="multiple" class="form-control" name="regional[]">

                  @foreach($regionais as $regional)
                  <option value="{{$regional->id}}"> {{$regional->nome}}
                  </option>
                  @endforeach
                </select>
              </div>


<div class="col-sm-2">
                <label for="uf">UF:</label>
                <select id="uf" multiple="multiple" class="form-control" name="uf[]">

                  @foreach($ufs as $uf)
                  <option value="{{$uf->id}}"> {{$uf->nome}}
                  </option>
                  @endforeach
                </select>
              </div>


   </div>

            <!--div class="form-group ">

              <!--div class="col-sm-2">
                <label for="dtfim">Data Fim:</label>
                <input class="form-control input-sm" name="dtfim" type="date">
              </div>

            </div-->

            <button type="submit" class="btn btn-primary btn-md">
              Gerar
            </button>

            


          </form>
        </div>

      </div>
    </div>
  </div>
</div>


@stop

@section('multiselect')


<script type="text/javascript" src="{{ asset('bootstrap-multiselect/js/jquery-3.2.1.js') }}"></script>

<link rel="stylesheet" href="{{ asset('bootstrap-multiselect/css/bootstrap-multiselect.css') }}">

<script type="text/javascript" src="{{ asset('bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>



<script type="text/javascript">
$(document).ready(function () {

  $('#categoria').multiselect({
    numberDisplayed: -1,
    maxHeight: 400,
      //includeSelectAllOption: true,
      enableCaseInsensitiveFiltering: true,
      enableFiltering: true

    });
});
</script>

<script type="text/javascript">
$(document).ready(function () {

  $('#estabelecimento').multiselect({
    numberDisplayed: -1,
    maxHeight: 400,
      //includeSelectAllOption: true,
      enableCaseInsensitiveFiltering: true,
      enableFiltering: true

    });
});
</script>


<script type="text/javascript">
$(document).ready(function () {
  $('#produto').multiselect({
    numberDisplayed: -1,
    maxHeight: 400,
      //includeSelectAllOption: true,
      enableCaseInsensitiveFiltering: true,
      enableFiltering: true

    });
});
</script>

<script type="text/javascript">
$(document).ready(function () {

  $('#uf').multiselect({
    numberDisplayed: -1,
    maxHeight: 400,
      //includeSelectAllOption: true,
      enableCaseInsensitiveFiltering: true,
      enableFiltering: true

    });
});
</script>

<script type="text/javascript">
$(document).ready(function () {

  $('#vendedor').multiselect({
    numberDisplayed: -1,
    maxHeight: 400,
      //includeSelectAllOption: true,
      enableCaseInsensitiveFiltering: true,
      enableFiltering: true

    });
});
</script>

<script type="text/javascript">
$(document).ready(function () {

  $('#regiao').multiselect({
    numberDisplayed: -1,
    maxHeight: 400,
      //includeSelectAllOption: true,
      enableCaseInsensitiveFiltering: true,
      enableFiltering: true

    });
});
</script>
<script type="text/javascript">
$(document).ready(function () {

  $('#regional').multiselect({
    numberDisplayed: -1,
    maxHeight: 400,
      //includeSelectAllOption: true,
      enableCaseInsensitiveFiltering: true,
      enableFiltering: true

    });
});
</script>

<script language="javascript" type="text/javascript">
function abre_relatorio(formulario) {
  window.open("_blank","novaJanela","width=" + window.screen.width + ",height=" + window.screen.height + ",scrollbars=NO,TOP,LEFT"); 
   // window.open(URL,"janela1","width=" + window.screen.width + ",height=" + window.screen.height + ",scrollbars=NO,TOP,LEFT");
   formulario.target = 'novaJanela';
   return true;      
 }
 </script>

 @stop



 @section('datapicker')


 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/collapse.js"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">




 <script type="text/javascript">
 $(function () {
  $('#datainicial').datetimepicker({
    viewMode: 'years',
    format: 'MM/YYYY'
    //format: 'yyyy-mm'
  });
});
 </script>

 <script type="text/javascript">
 $(function () {
  $('#dtfinal').datetimepicker({
    viewMode: 'years',
    format: 'MM/YYYY'

  });
});
 </script>

 @stop

