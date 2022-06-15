<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Tbpreferit;
use App\Models\Tblike;
use App\Models\Tbeventi;
use Session;
use Illuminate\Routing\Controller as BaseController;

class modificacontroller extends BaseController
{
  /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modifica(Request $rq)
    {
if(Session::get('id',-1)!=-1)
  {

    if($rq->tipo==1){
      //$strqry= DB::delete("DELETE FROM `tbpreferit` WHERE `tbpreferit`.`fklike` ='".$rq->id."' and tbpreferit.fkuser='".$rq->user."'");
      $deleted = tbpreferit::where("tbpreferit.fklike","=",$rq->id,'and',"tbpreferit.fkuser","=",$rq->user)->delete();

      $val=$rq->val-1;
    }else if($rq->tipo==2){
      //$strqry= DB::insert("INSERT INTO `tbpreferit` (`id`, `fklike`, `fkuser`) VALUES (null,'".$rq->id."', '".$rq->user."')");
      $preferiti = new tbpreferit;
      $preferiti->fklike =$rq->id;
      $preferiti->fkuser =$rq->user;
      $preferiti->save();
      $val=$rq->val+1;
    }else if($rq->tipo==3){
      //$strqry= DB::delete("DELETE FROM `tbeventi` WHERE `tbeventi`.`idevento` ='".$rq->id."'");
      //$strqry2= DB::delete("DELETE FROM `tblike` WHERE `tblike`.`id` ='".$rq->id."'");
      $deleted = tbeventi::where("tbeventi.idevento", $rq->id)->delete();
      $deleted = tblike::where("tblike.id", $rq->id)->delete();
        return redirect('/amministratore');
    }
    if($rq->val!=null){
         //$strqry2=DB::update("UPDATE `tblike` SET numvoti ='".$val."'  WHERE `tblike`.`id` = '".$rq->id."'");
         $like = tblike::where("tblike.id",$rq->id)->update(['numvoti' =>$val]);
      }
    }
    return redirect('/home');


    }




}
