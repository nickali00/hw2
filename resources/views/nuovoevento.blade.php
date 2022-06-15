<html>
  <head>
      <title>nuovo evento</title>
        <link href="../resources/css/app.css" rel="stylesheet">
        <link  href="../resources/css/login.css" rel="stylesheet"  />
        <script src="../resources/js/compila.js" defer="true"></script>
  </head>
  <body>
    @include('header',array('aut'=>$liv))
    <section>
    <div class="inserisci">
      <form action ="nevento" method ="post" enctype="multipart/form-data" onsubmit="submitForm(event)" class="fro">
        <input type="hidden" name="_token" value="csrf_token()">
        <h1>Nuovo Evento</h1>
        <section class="credenziali">
          <h4 class="in">Immagine</h4> <input name="image" id="imgfile" type="file" class="inputheader"/>
        </section>

        <section class="credenziali">
          <h4 class="in">Titolo</h4> <input class="inputheader" type="text" name="titolo" >
        </section>
        <section class="credenziali">
          <h4 class="in">Descrizione</h4> <input class="inputheader" type="text" name="descrizione" >
        </section>
        <section class="credenziali">
          <h4 class="in">Data</h4> <input class="inputheader" type="date" name="data" >
        </section>
        <div class="nascosto" name=" sem" >0</div>
        <div class="divin">
          <div class="menu"><a href="home.php">indietro</a></div>
          <div class="menu"><input type="submit" value="Aggiungi" ></div>
        </div>
      </form>
    </div>
    <div class="errore"></div>
  </section>
  </body>
</html>
