<?php

namespace App\Http\Controllers\wsim\administracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Excel;
//use DB;
use App\Models\wsim\biprod;

class importarController extends Controller
{

	public function importarindex()
	{
		return view('wsim.administracao.importacao.importar');
	}


	public function importarcsv(Request $request)
	{


		$validator = Validator::make($request->all(), [
			'file' => 'required'
			]);
		
		if ($validator->fails())
		{
			
			
			\Session::flash('mgs_error',[
				'msg'=>"SELECIONAR um aquivo CSV válido!",
				'class'=>"alert-danger"
				]);	

			return redirect()->back();

		}
		
		$file = $request->file('file');
		
  //Faz a leitura do arquivo em uma string.//
		$csvData = file_get_contents($file);
		
  //Mostra todo array linha a linha com cabeçalho.//
  //Analisa uma string CSV e retorna os dados em um array(array_map("str_getcsv")//
		$rows = array_map('str_getcsv',explode("\n",$csvData, -1));

   //Retira o cabeçalho (coluna) do array.//
		$header = array_shift($rows);

				

		foreach ( $rows as $row )
		{
 

   //Cria uma matriz usando um array chave(coluna) e valor(linha).//
   //Combina a matriz com o mesmo comprimento (coluna / Linha).
			$row = array_combine($header, $row);
			
			biprod::create([
				'id_item'	 => $row['id_item'],
				'nome'				 => $row['nome'],
				'id_grupo' => $row['id_grupo'],
							]);

		 }
		
		 \Session::flash('mgs_sucesso',[
			'msg'=>"IMPORTAÇÃO realizada com sucesso!",
			'class'=>"alert-success"
			]);

		 return redirect()->back();
		

	}

}



