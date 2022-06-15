<html>
  <head>
  </head>
  <body>
  	<header>
      <?php if($aut==-1): ?>
      <nav id = "flex2">
        <div class="menu"><a href="index">HOME</a></div>
        <div class="menu"><a href="login">LOGIN</a></div>
        <div class="menu"><a href="registrazione">REGISTRATI</a></div>
      </nav>
      <?php elseif($aut==0): ?>
      <nav id = "flex2">
        <div class="menu"><a href="preferiti">PREFERITI</a></div>
        <div class="menu"><a href="home">TUTTI</a></div>
        <div class="menu"><a href="logout">LOGOUT</a></div>
      </nav>
      <?php elseif($aut==1): ?>
      <nav id = "flex2">
        <div class="menu"><a href="amministratore">TUTTI</a></div>
        <div class="menu"><a href="nuovoevento">NUOVO EVENTO</a></div>
        <div class="menu"><a href="logout">LOGOUT</a></div>
      </nav>
      <?php endif; ?>
    </header>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\myapp\resources\views/header.blade.php ENDPATH**/ ?>