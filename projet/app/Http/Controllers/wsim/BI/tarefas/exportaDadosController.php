<?php

namespace App\Http\Controllers\wsim\BI\tarefas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\wsim\bifatura;



class exportaDadosController extends Controller
{


    public function faturamentoxlsx()
    {

        $faturamento = DB::table('bi_fatura')->get();

        $fatdata ="";

        if(count($faturamento) >0)
        {
         $fatdata .='<table>
         <tr>
         <th>id</th>
         <th>dt_emis</th>
         <th>id_estab</th>
         <th>id_regiao</th>
         <th>id_vend</th>
         <th>id_categ</th>
         <th>id_cli</th>
         <th>id_prod</th>
         <th>id_unid</th>
         <th>qtde</th>
         <th>vl_uni</th>
         <th>vl_total</th>
         <th>nf</th>
         <th>serie</th>
         <th>nr_pedido</th>
         </tr>';


         foreach ($faturamentos as $faturamento) 
         {
             $fatdata .='<tr>
                         <td>'.$faturameto->id.'</td>
                         <td>'.$faturameto->dt_emis.'</td>
                         <td>'.$faturameto->id_estab.'</td>
                         <td>'.$faturameto->id_regiao.'</td>
                         <td>'.$faturameto->id_vend.'</td>
                         <td>'.$faturameto->id_categ.'</td>
                         <td>'.$faturameto->id_cli.'</td>
                         <td>'.$faturameto->id_prod.'</td>
                         <td>'.$faturameto->id_uni.'</td>
                         <td>'.$faturameto->qtde.'</td>
                         <td>'.$faturameto->vl_uni.'</td>
                         <td>'.$faturameto->vl_total.'</td>
                         <td>'.$faturameto->nf.'</td>
                         <td>'.$faturameto->serie.'</td>
                          <td>'.$faturameto->nr_pedido.'</td>
                        </tr>';

                        
         }
         
         $fatdata .='</table>';

        }

        header('Content-Type: application/xlsx');
        header('content-Disposition: attachment; filename=bifatura.xls');
        echo $fatdata;
    }



    public function CSV()
    {

        

      

        
    }

    


}    
