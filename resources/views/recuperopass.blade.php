<html>
  <head>
      <title>Recupero password</title>
        <link href="../resources/css/app.css" rel="stylesheet">
        <link  href="../resources/css/login.css" rel="stylesheet"  />
        <script src="../resources/js/inviaemail.js" defer="true"></script>
  </head>
  <body>
    @include('header',array('aut'=>$liv))
    <section>
      <div class="inserisci">
        <h1>Recupera password</h1>
        <form action ="cambiapass" method="get" onsubmit="submitForm(event)" class="fro">
          <input type="hidden" name="_token" value="csrf_token()">
          <section class="credenziali">
            <h4 class="in">email</h4> <input class="inputheader" type="text" name="email" >
          </section>
          <div class="divin">
            <div class="menu"><a href="login.html">indietro</a></div>
            <div class="menu"><input type="submit" value="recupera" ></div>
          </div>
        </form>
        <div class="nascosto" name=" sem" >0</div>
        <div class="nascosto" name="valore">0</div>
        <div class="errore"></div>
        </div>
      </section>
  </body>
</html>
