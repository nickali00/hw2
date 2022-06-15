<html>
  <head>
    <title>Registrazione</title>
    <link href="../resources/css/app.css" rel="stylesheet">
    <link  href="../resources/css/login.css" rel="stylesheet"  />
    <script src="../resources/js/compila.js" defer="true"></script>
  </head>
  <body>
  	<header>
    @include('header',array('aut'=>$liv))
    </header>
    <section>
      <div class="inserisci">
      <h1>REGISTRAZIONE</h1>
      <form action ="ins" method ="post" onsubmit="submitForm(event)" class="fro">
        <input type="hidden" name="_token" value="csrf_token()">
        <section class="credenziali">
          <h4 class="in">nome</h4> <input class="inputheader" type="text" name="nome">
        </section>
        <section class="credenziali">
          <h4 class="in">cognome</h4><input class="inputheader" type="text" name="cognome">
        </section>
        <section class="credenziali">
          <h4 class="in">email</h4> <input class="inputheader" type="text" name="email">
        </section>
        <section class="credenziali">
          <h4 class="in">password</h4> <input class="inputheader" type="password" name="pas" >
        </section>
        <section class="credenziali">
          <h4 class="in">conferma password</h4><input class="inputheader" type="password" name="pas" >
        </section>
        <div class="nascosto" name=" sem" >1</div>
        <div class="divin">
          <div class="menu"><a href="index.html">indietro</a></div>
          <div class="menu"><input type="submit" value="Registrati" ></div>
        </div>
      </form>
      <div class="errore"></div>
      </div>
    </section>
  </body>
</html>
