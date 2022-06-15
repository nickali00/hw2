<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Session;
use Illuminate\Routing\Controller as BaseController;

class logincontroller extends BaseController
{
  /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifico(Request $rq)
    {
      if($rq->input('pas')!==null && $rq->input('email')!==null  )
      {
   //$strqry = user::where('email','=',$rq->input('email'),'and','password','=',MD5($rq->input('pas')))->get();
     $strqry=  DB::select("SELECT * FROM `user` where email='".stripcslashes($rq->input('email'))."' and password ='".MD5(stripcslashes($rq->input('pas')))."'");
        if($strqry!=null)
        {
          echo("entrato");
          Session::put("id",$strqry[0]->id);
          Session::put("livello",$strqry[0]->livello);
          if($strqry[0]->livello==0)
          return redirect('/home');
          else {
            return redirect('/amministratore');
          }
        }else{
          echo("non entrato");
          return redirect('login');
          //whinput e old? return post::all();
        }
      }else {
        echo "<h1>email esistente</h1>";
        return redirect('/index');
      }


    }




}
