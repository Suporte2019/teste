<?php

namespace App\Http\Controllers\wsim\Administracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Queue\ShouldQueue;




class phpinfoController extends Controller
{
 
	public function index()
	{

    $phpinfo = phpinfo();

		return view('wsim.Administracao.Phpinfo.index');

		return '$phpinfo';
	}


 
}
