<?php

namespace App\Http\Controllers\wsim\administracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\wsim\biprod;



class exportarController extends Controller
{


	/*public function xlsx()

    {

        $data = biprod::get()->toArray();
            
        return Excel::create('Produtos', function($excel) use ($data)
         {
            $excel->sheet('produtos', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    } */

    public function xlsx()
    {

        $produtos = DB::table('bi_prod')->get();

        $prodata ="";

        if(count($produtos) >0)
        {
         $prodata .='<table>
         <tr>
         <th>codigo</th>
         <th>nome</th>
         <th>id_grupo</th>
         <th>unidade</th>
         <th>ativo</th>
         </tr>';
         

         foreach ($produtos as $produto) 
         {
             $prodata .='<tr>
                         <td>'.$produto->id_item.'</td>
                         <td>'.$produto->nome.'</td>
                         <td>'.$produto->id_grupo.'</td>
                         <td>'.$produto->un.'</td>
                         <td>'.$produto->ativo.'</td>
                        </tr>';
                        
         }
         
         $prodata .='</table>';

        }

        header('Content-Type: application/xlsx');
        header('content-Disposition: attachment; filename=produto.xls');
        echo $prodata;
    }



    public function CSV()
    {

        

      

        
    }

    


}    
