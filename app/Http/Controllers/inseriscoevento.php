<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Tblike;
use App\Models\Tbeventi;
class inseriscoevento extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function inserisco(Request $rq)
    {

  $percorso='immagini/';
function file_extension($filename)
  {
    $ext = explode(".", $filename);
    return $ext[count($ext)-1];
  }
  $msg="Nessun file selezionato !!";
  if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $msg="File caricato con successo !!";
    // Controllo che il file non superi i 800 KB
    if ($_FILES['image']['size'] > 11807200) {
      $msg = "<p>Il file non deve superare gli 800 KB!!</p>";
      die($msg);
    }
 $tipo=file_extension($_FILES['image']['name']);
    //echo $_FILES['image']['tmp_name'];
    // Ottengo le informazioni sull'immagine
    list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    // Controllo che le dimensioni (in pixel) non superino 960x1080
    if (($width > 9960) || ($height > 91080)) {
        $msg = "<p>Dimensioni non corrette!!</p>";
       die($msg);
    }
    $tipo=file_extension($_FILES['image']['name']);
    // Restituisce: l'estensione passando il nome completo del file

    // Controllo che il file sia in uno dei formati GIF, JPG o PNG
    // Senza questo controllo posso caricare tutti i file

    if (($tipo!="png") && ($tipo!="jpg") && ($tipo!="gif")) {
      $msg = "<p>Formato non corretto!!</p>";
      die($msg);
    }

    // Verifico che sul sul server non esista già un file con lo stesso nome
    if (file_exists($percorso.$_FILES['image']['name'])) {
      $msg = "<p>File gia' esistente sul server. Rinominarlo e riprovare.</p>";
      die($msg);
    }

    $tempidn="data".date("d-m-y")."ora".date("H-i-s");
	  $nomeDef="foto".$tempidn.".".$tipo;
      // Sposto il file nella cartella da me desiderata
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $percorso.$nomeDef)) {
      $msg = "<p>Errore nel caricamento dell'immagine!!</p>";
	     die($msg);
    }
  }
  echo $msg;
  $per=$percorso.$_FILES['image']['name'];


// $strqry=  DB::insert("INSERT INTO `tblike` (`id`, `numvoti`) VALUES (NULL, '0')");
$like = new tblike;
$like->numvoti =0;
$like->save();

$ultimo_id=tblike::orderBy("id","DESC")->first();
print_r($ultimo_id);
 $time = strtotime($rq->input('data'));

 if ($time) {
   $new_date = date('Y-m-d', $time);
 }
 $cerca = array("'",'"');
 $sostituisci = array("\'",'\"');
 $tit=str_replace($cerca, $sostituisci, $rq->input('titolo'));
 $descrizione=str_replace($cerca, $sostituisci, $rq->input('descrizione'));
 //$strqry=  DB::insert("INSERT INTO `tbeventi` (`idevento`, `titolo`, `descrizione`, `data`, `fklike`, `img`) VALUES (NULL,'".$tit."','".$descrizione."' ,'".$new_date."','".$ultimo_id[0]->num."','".$nomeDef."')");
 $eventi = new tbeventi;
 $eventi->titolo =$tit;
 $eventi->descrizione =$descrizione;
 $eventi->data =$new_date;
 $eventi->fklike =$ultimo_id->id;
 $eventi->img =$nomeDef;
 $eventi->save();
  return redirect('/amministratore');
    }
}
