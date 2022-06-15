<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Tbchat;
use Session;
use Illuminate\Routing\Controller as BaseController;

class chatcontroller extends BaseController
{
  /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function visualizza(Request $rq)
    {
        if(Session::get('id',-1)!=-1)
        {
          //$str= DB::select(" SELECT * FROM tbchat,user where tbchat.fkutente=user.id and tbchat.fkevento='".$rq->num."'ORDER BY `tbchat`.`id` ASC");
          $str=tbchat::join("user",'tbchat.fkutente', '=', 'user.id')->where('tbchat.fkevento','=',$rq->num)->orderBy('tbchat.id','ASC')->get();
            print_r(json_encode($str));
        }
    }
        public function scrivi(Request $rq)
        {
            if(Session::get('id',-1)!=-1)
            {
              //$str= DB::select("INSERT INTO tbchat (`id`, `fkutente`, `fkevento`, `scritto`)  VALUES (NULL,'".$rq->ut."','".$rq->id."','".stripcslashes($rq->tx)."')");
              $chat = new tbchat;
              $chat->fkutente = $rq->ut;
              $chat->fkevento = $rq->id;
              $chat->scritto = $rq->tx;
              $chat->save();
            }
        }
    }
