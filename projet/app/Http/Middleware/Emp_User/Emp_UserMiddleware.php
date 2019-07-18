<?php

namespace App\Http\Middleware\Emp_User;

 use Closure;
 use Illuminate\Support\Facades\Auth;
 use App\Models\wsim\Emp_User\Emp_User;
 use App\Empresa\ConectaEmpresa;


 class Emp_UserMiddleware
 {
         /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
         public function handle($request, Closure $next)
         {

          // helper para chamar a classe ConectaEmpresa //
          $conecta = app(ConectaEmpresa::class);
         
          if (Auth::check() ) {

           // Recupera email do usuario logado e o nome do database cadastrado
           // para ele;
           $empresa =$this->getEmpresa();

         
           if (!$empresa) {

            //Auth::logout();
            $request->session()->flush();

            return redirect()->route('erro');

            }
                       
            else if($request->url() != route('erro')){

           $conecta->conexao($empresa);
           
          //Recupera o nome da empresa conectada. //
           $this->getNomeEmpresa($empresa->only([ 'db_database']));  
         
           }

        }          
  
          return $next($request);    
         
         }

         public function getEmpresa()
         {

         if (session()->has('empresaSelecionada')) {
        
         $empresaSession = session('empresaSelecionada');
         
         //dd($empresaSession);

        return Emp_User::where('db_database', $empresaSession->db_database)->first();
          //return Empresa::where('db_database', session('empresaSelecionada'));
        
        }

          return Emp_User::where('usuario',  auth()->user()->email)->first();
         }

       
         public function getNomeEmpresa($nomeempresa)
         {
          session()->put('nomeempresa', $nomeempresa);
         }
        }
