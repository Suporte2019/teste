<?php

namespace App\Http\Controllers\wsim\Metas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class zebraController extends Controller
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

}

