<html>
  <head>
  </head>
  <body>
  	<header>
      @if($aut==-1)
      <nav id = "flex2">
        <div class="menu"><a href="index">HOME</a></div>
        <div class="menu"><a href="login">LOGIN</a></div>
        <div class="menu"><a href="registrazione">REGISTRATI</a></div>
      </nav>
      @elseif($aut==0)
      <nav id = "flex2">
        <div class="menu"><a href="preferiti">PREFERITI</a></div>
        <div class="menu"><a href="home">TUTTI</a></div>
        <div class="menu"><a href="logout">LOGOUT</a></div>
      </nav>
      @elseif($aut==1)
      <nav id = "flex2">
        <div class="menu"><a href="amministratore">TUTTI</a></div>
        <div class="menu"><a href="nuovoevento">NUOVO EVENTO</a></div>
        <div class="menu"><a href="logout">LOGOUT</a></div>
      </nav>
      @endif
    </header>
  </body>
</html>
