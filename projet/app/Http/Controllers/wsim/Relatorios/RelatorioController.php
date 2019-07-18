<?php

namespace App\Http\Controllers\wsim\relatorios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wsim\biprod;
use App\Models\wsim\bivend;
use App\Models\wsim\biprodplanonivel;
use App\Models\wsim\biuf;
use App\Models\wsim\bicateg;
use App\Models\wsim\bicondpagto;
use App\Models\wsim\biestab;
use App\Models\wsim\biregiao;
use App\Models\wsim\biregional;

use App\Models\wsim\biprodplano;
use DB;





class RelatorioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Direcionar para autenticação.
     *
     *@return \Illuminate\Http\Response
     */

    public function lista(Request $request)
    {

        
        // variável $form recebe do formulario para ajuste de paginação //
        $form = $request->except('_token');

        $produtos = \App\Models\wsim\biprod::all();
        $vendedores = \App\Models\wsim\bivend::all();
        $regioes = \App\Models\wsim\biregiao::all();
        $regionais = \App\Models\wsim\biregional::all();
        $estabelecimentos = \App\Models\wsim\biestab::all();
        $categorias = \App\Models\wsim\bicateg::all();
        $condpagtos = \App\Models\wsim\bicondpagto::all();
        $ufs= \App\Models\wsim\biuf::all();

       
        return view('wsim.relatorios.relatorio.lista', compact('form',
                                                                                        'produtos',
                                                                                        'vendedores',
                                                                                        'regioes',
                                                                                        'regionais',
                                                                                        'estabelecimentos',
                                                                                        'categorias',
                                                                                        'condpagtos',
                                                                                         'ufs'));
    }

    public function gerar(Request $request)
    {

         //dd($request);

        //return redirect()->route('wsim.relatorios.relatorio.lista');
    }

    public function novapagina(Request $request)

    

    {
       

       //$date = date('Y-m'); 
        $datainicial = $request->dtinicio;
        $data = explode('  ', $datainicial);
        list ($date) = $datainicial;
        $dtinicio = array_reverse(explode("/", $datainicial));
        $dtinicio = implode("-", $dtinicio);
        
      
    
        $datafinal = $request->dtfinal;
        $data = explode('  ', $datafinal);
        list ($date) = $datafinal;
        $dtfim = array_reverse(explode("/", $datafinal));
        $dtfim = implode("-", $dtfim);
        // $dtfim = date('Y-m',strtotime($request->dtfinal));
        $produtos = $request->produto;
        $vendedores = $request->vendedores;
        $regioes = $request->regiao;
        $regionais = $request->regional;
        $estabelecimentos = $request->estabelecimento;
        $categorias = $request->categoria;
        $condpagtos = $request->condpagto;
        $ufs= $request->uf;
        
       //dd( $dtinicio, $dtfim,  $produtos, $vendedores, $regioes,  $regionais, $estabelecimentos, $categorias, $condpagtos, $ufs );
       
       // $prodplanos = DB::table('bi_prod_plano')->whereIn('nivel', $nivelplano)->get();

        $faturamentos = DB::table('bi_fatura')->whereBetween('dt_emis', [$dtinicio, $dtfim])->get();

       // $prodplanos = biprodplano::wherein('nivel', $nivelplano)->get();

        //$prodplanos = biprodplano::find($nivelplano)->all();

      

          //dd( $prodplanos);
        
        //$form = $request->except('_token');

     //$pessoas = DB::table('bi_pessoa')->get();

       // dd($request);
      //$prodplanos = biprodplano::paginate(100);
      //$pessoas = \App\Models\wsim\bipessoa::all();
     
        // dd($pessoas);

        return view('wsim.relatorios.relatorio.modelo',compact('faturamentos'));
    }



}
