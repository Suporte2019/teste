<?php

namespace App\Listeners\Empresa;

use App\Events\Empresa\CriaEmpresa;
use App\Events\Empresa\CriaTabela;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\wsim\Empresa;
use App\Empresa\Database\CriaDatabase;
use App\Empresa\ConectaEmpresa;


class CriaDBEmpresa
{

    private $database;
  
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CriaDatabase $database)
    {
        
        $this->database = $database;
    }

    

    /**
     * Handle the event.
     *
     * @param  EmpresaCriada  $event
     * @return void
     */
    public function handle(CriaEmpresa $event)
    {
        /*Recuperando o Metodo Empresa ( criado em App\events\empresa)
         * para devolver o objeto da empresa.
         * Chama o metodo criadatabase.
        */
       $empresa = $event->empresa();

       if (!$this->database->criadatabase($empresa))
       {

        throw new \Exception('Erro ao criar Database');
       }

       /* Roda migrations
       */

      // event(new CriaTabela($empresa));

    }
}
