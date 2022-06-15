<html>
  <head>
    <title>Cambia password</title>
      <link href="../resources/css/app.css" rel="stylesheet">
      <link  href="../resources/css/login.css" rel="stylesheet"  />
      <script src="../resources/js/inviaemail.js" defer="true"></script>
  </head>
  <body>
    <?php echo $__env->make('header',array('aut'=>$liv), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section>
      <div class="inserisci">
        <h1>CAMBIA PASSWORD</h1>
        <p>abbiamo inviato un email per il codice</p>
        <form action ="index" onsubmit="submitForm(event)" class="fro">
          <section class="credenziali">
            <h4 class="in">codice</h4> <input class="inputheader" type="text" name="email" >
          </section>
          <section class="credenziali">
            <h4 class="in">password</h4><input class="inputheader" type="password" name="pas">
          </section>
          <section class="credenziali">
            <h4 class="in">conferma password</h4><input class="inputheader" type="password" name="pas">
          </section>
          <div class="divin">
            <div class="menu"><a href="index.html">indietro</a></div>
            <div class="menu"><input type="submit" value="conferma" ></div>
          </div>
        </form>
        <div class="nascosto" name=" sem" >1</div>
        <div class="errore"></div>
      </div>
      </section>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\myapp\resources\views/cambiapass.blade.php ENDPATH**/ ?>