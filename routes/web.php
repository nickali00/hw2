<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\User;
use App\Models\Tblike;
use App\Models\Tbchat;
use App\Models\Tbeventi;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('apiemail', function () {
  $results = user::all();
  echo($results);
});




Route::post('connect','App\Http\Controllers\logincontroller@verifico');
Route::post('ins','App\Http\Controllers\inseriscout@inserisco');
Route::post('nevento','App\Http\Controllers\inseriscoevento@inserisco');
Route::get('modifica','App\Http\Controllers\modificacontroller@modifica');
Route::get('apichat','App\Http\Controllers\chatcontroller@visualizza');
Route::get('scrivi','App\Http\Controllers\chatcontroller@scrivi');
//Route::get('apitoken','App\Http\Controllers\emailcontroller@invia');



Route::get('recuperaemail','App\Http\Controllers\emailcontroller@email');
//Route::get('apicredenziali','App\Http\Controllers\emailcontroller@cambiocredenziali');

Route::get('apicredenziali/{tk}/{pas}', function ($par1,$par2) {
  $like = user::where("user.livello",$par2)->update(['password' => md5($par1)]);
  $like = user::where("user.livello",$par2)->update(['livello' => 0]);

});

Route::get('apitoken/{tk}/{email}', function ($par2,$par1) {
  $like = user ::where("user.email",$par1)->update(['livello' => $par2]);
});

Route::get('index', function () {
  $results=tbeventi::join("tblike","tblike.id","=","tbeventi.fklike")->get();
    return view('index')
    -> with("result", $results)
    -> with("num", $results)
     -> with("log",-1)
     -> with("liv",-1);
});


Route::get('amministratore', function () {
  $results=tbeventi::join("tblike","tblike.id","=","tbeventi.fklike")->get();
    return view('index')
    -> with("result", $results)
    -> with("num", $results)
    -> with("liv", Session::get('livello',-1))
    -> with("log", Session::get('id',-1));
});

Route::get('cambiapass', function () {
    return view('cambiapass') -> with("liv", -1);
});
Route::get('recuperopass', function () {
    return view('recuperopass') -> with("liv", -1);
});
Route::get('login', function () {
    return view('login') -> with("liv", -1);
});

Route::get('registrazione', function () {
    return view('registrazione') -> with("liv", -1);
});

Route::get('nuovoevento', function () {
    return view('nuovoevento') -> with("liv", Session::get('livello',-1));
});

Route::get('header', function () {

  //  return view('header')->with("aut",Session::get('livello',-1));
});

Route::get('logout', function () {
Session::flush();
return redirect('index');
});

Route::get('home', function () {
  $num=tbeventi::join("tblike","tblike.id","=","tbeventi.fklike")->get();
  $nonpreferiti = DB::select("SELECT * FROM tbeventi EXCEPT (SELECT * FROM tbeventi WHERE tbeventi.idevento in(SELECT fklike FROM tbpreferit,user where tbpreferit.fkuser=user.id and user.id='".Session::get('id',-1)."'))");
  $preferiti=DB::select("SELECT * FROM tblike,tbeventi where tblike.id=tbeventi.fklike and tbeventi.fklike in (SELECT tbpreferit.fklike FROM user,tbpreferit where user.id=tbpreferit.fkuser and user.id='".Session::get('id')."')");
    return view('index')
      -> with("num", $num)
      -> with("sem", 0)
      -> with("nonpreferiti", $nonpreferiti)
      -> with("preferiti", $preferiti)
      -> with("liv", Session::get('livello',-1))
      -> with("log", Session::get('id',-1));
});


Route::get('preferiti', function () {
  $preferiti=DB::select("SELECT * FROM tblike,tbeventi where tblike.id=tbeventi.fklike and tbeventi.fklike in (SELECT tbpreferit.fklike FROM user,tbpreferit where user.id=tbpreferit.fkuser and user.id='".Session::get('id')."')");
    $num=tbeventi::join("tblike","tblike.id","=","tbeventi.fklike")->get();
    return view('index')
      -> with("preferiti", $preferiti)
      -> with("sem", 1)
      -> with("num", $num)
      -> with("liv", Session::get('livello'))
      -> with("log", Session::get('id'));
});
