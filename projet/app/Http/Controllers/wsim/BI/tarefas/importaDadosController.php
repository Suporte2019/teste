<?php

namespace App\Http\Controllers\wsim\BI\tarefas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Response;
use App\Models\wsim\bifatura;
use App\Models\wsim\bicateg;

class importaDadosController extends Controller
{

	public function impfaturamento()
	{
		return view('wsim.BI.tarefas.importar.impfaturamento');
	}

    public function impfaturamentocsv(Request $request)
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

         //"Pega" o arquivo do imput- $request//
         $file = $request->file('file');
        
         //Faz a leitura do arquivo.//
        // $file = fopen($file, 'r');
         $data = file_get_contents($file);

         $data = explode("\n", $data);

         // Limpa tabela antes de Importar.//
         //DB::table('bi_categ')->truncate();

        $result = [];
        foreach ($data as $row) {
            if (!$row) continue;
         $result[] = str_getcsv($row, ';'); 
        
       

        }

         //dd($result);

             $a = array('id_categ' => $result[0], 
                        'nome'     => $result[1],
                        'dt_alt'   => $result[2]);
           dd($a);  
       bicateg::create($a);

       
      
        
        return redirect()->back();

}
   

     public function expfaturamentoCSV()
    {

    
    $file = fopen('php://output', 'w'); 

    $categ = bicateg::all()->toarray();

        foreach ($categ as $row) {
             fputcsv($file, $row, ';');
            }
        
        fclose($file);

    header("Content-type: text/csv");
    header("Content-disposition: attachment; filename = bifatura.csv");
    

    }

     public function expfaturamentoXLSX()
    {

    
    $file = fopen('php://output', 'w'); 

    $categ = bicateg::all()->toarray();

        foreach ($categ as $row) {
             fputcsv($file, $row, ';');
            }
        
        fclose($file);

    header("Content-type: application/xls");
    header("Content-disposition: attachment; filename = bicateg.xlsx");
    

    }

		

}



