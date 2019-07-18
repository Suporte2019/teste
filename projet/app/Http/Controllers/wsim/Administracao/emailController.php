<?php

namespace App\Http\Controllers\wsim\administracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;




class emailController extends Controller
{
 
	public function index()
	{


		return view('wsim.administracao.email.primeiroemail');
	}



 public function primeiroemail()
 {

   	//Mail::to('marcio@frosi.net.br')->send(new email());
  
      //  return 'OK';

  Mail::send('wsim.administracao.email.primeiroemail', [], function($message)
  {    

   $message->to('marcio@frosi.net.br');
   $message->subject('Envio de anexo');
   $message->attach( public_path() .'/teste.txt',

    [
    'as' => 'Anexo Teste.txt',
    'mime' => 'application/txt'
    ]);
   
  }); 
  

  return 'Enviado com anexo.';

 }

 
}
