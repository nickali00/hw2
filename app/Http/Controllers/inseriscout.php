<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;
use DB;
use App\Models\Tblike;
use App\Models\User;
use Session;
use Illuminate\Routing\Controller as BaseController;

class inseriscout extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function inserisco(Request $rq)
    {
        if($rq->input('nome')!==null && $rq->input('cognome')!==null && $rq->input('email')!==null && $rq->input('pas')!==null)
        {
          //verifico email esistente
          $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
          if (preg_match($pattern, trim($rq->input('email'))))
          {
            //verifico se email esiste
            $strqry = user::where("email","=",$rq->input('email'))->get();
            //DB::select("SELECT * FROM `user` where email='".stripcslashes()."'");
            if($strqry!=null)
            {
              echo "<h1>email esistente</h1>";
            return redirect('/index');
            }
            //verifico password
            if(strlen($rq->input('pas'))>4 && strlen($rq->input('pas'))<16)
            {

            }else{
              echo "<h1>password non valida</h1>";
                return redirect('/index');
            }
          }else{
            echo "<h1>formato email non valido</h1>";
              return redirect('/index');
          }
        }else{
          echo "<h1>riempi tutti i campi</h1>";
            return redirect('/index');
        }
        $nome=str($rq->input('nome'));
        $cognome=str($rq->input('cognome'));
        $pas=str($rq->input('pas'));

        //  $strqry=  DB::insert("INSERT INTO `user` (`id`, `Nome`, `Cognome`, `email`, `password`, `livello`) VALUES (NULL, '".$nome."' ,'".$cognome."' , '".$_POST['email']."','".MD5($pas)."','0')");
        $user = new user;
        $user->Nome =$nome;
        $user->Cognome =$cognome;
        $user->email =$rq->input('email');
        $user->password =MD5($pas);
        $user->livello =0;
        echo($user);
        $user->save();
          return redirect('/login');

      function str($s)
      {
        $cerca = array("'",'"');
        $sostituisci = array("\'",'\"');
        return str_replace($cerca, $sostituisci, $s);
      }

    }
}
