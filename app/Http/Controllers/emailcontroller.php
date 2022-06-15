<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use App\Models\Tblike
use Illuminate\Routing\Controller as BaseController;

class emailcontroller extends BaseController
{
  /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


      public function email()
      {

            //$str= DB::select("SELECT * FROM `user` ");
            $str= user::all();
              print_r(json_encode($str));

        }
      

    }
