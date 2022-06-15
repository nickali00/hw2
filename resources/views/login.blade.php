<html>
  <head>
      <title>Registrazione</title>
        <link href="../resources/css/app.css" rel="stylesheet">
        <link  href="../resources/css/login.css" rel="stylesheet"  />
        <script src="../resources/js/compila.js" defer="true"></script>
  </head>
  <body>
    @include('header',array('aut'=>$liv))
    <section>
      <div class="inserisci">
        <h1>ACCEDI</h1>
        <form action ="connect" method ="post" onsubmit="submitForm(event)" class="fro">
          <input type="hidden" name="_token" value="csrf_token()">
          <section class="credenziali">
            <h4 class="in">email</h4> <input class="inputheader" type="text" name="email" >
          </section>
          <section class="credenziali">
            <h4 class="in">password</h4><input class="inputheader" type="password" name="pas">
          </section>
          <div class="divin">
            <div class="menu"><a href="http://localhost/myapp/public/index">indietro</a></div>
            <div class="menu"><input type="submit" value="accedi" ></div>
          </div>
          <div class="divin">
            <div class="menu"><a href="recuperopass">Recupera Password</a></div>
          </div>
        </form>
        <div class="nascosto" name=" sem" >0</div>
        <div class="errore"></div>
      </div>
      </section>
  </body>
</html>
