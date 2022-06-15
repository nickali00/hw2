<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link href="../resources/css/app.css" rel="stylesheet">
    <script src="../resources/js/chat.js" defer="true"></script>
    <title></title>
  </head>
  <body>
@include('header',array('aut'=>$liv))


    <section>
    <h1> EVENTI ACIREALE </h1>
    @if($liv==0)
      @if($sem==0)
      @foreach ($nonpreferiti as $nonpreferito)
        <div class="cont">
          <h1>titolo:{{$nonpreferito->titolo}}</h1>
          <h1>data:{{$nonpreferito->data}}</h1>
        </div>

        <div class="cont">
          <div class="cont2">
            <h1>descrizione: </h1>
            <p>
              {{$nonpreferito->descrizione}}
            </p>
          </div>
          <div class="cont2">
            <img  src="immagini/{{$nonpreferito->img}}" class="logo">
          </div>
        </div>
        <div class="cont">
          <div>
            @foreach ($num as $numero)
                @if($numero->id==$nonpreferito->idevento)
            <a href="modifica?id={{$nonpreferito->idevento}}&tipo=2&user={{$log}}&val={{$numero->numvoti}}">
              <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/hearts.png");?>">
            </a>
            <h1>

                    {{$numero->numvoti}}
                  @endif
                @endforeach
            </h1>
          </div>
          <div>
            <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/chat.png" class="chat" num="{{$nonpreferito->idevento}}" user="{{$log}}">
          </div>

        </div>
        <div class="spazio"></div>
      @endforeach
      @endif
      @foreach ($preferiti as $preferito)
        <div class="cont">
          <h1>titolo:{{$preferito->titolo}}</h1>
          <h1>data:{{$preferito->data}}</h1>
        </div>

        <div class="cont">
          <div class="cont2">
            <h1>descrizione: </h1>
            <p>
              {{$preferito->descrizione}}
            </p>
          </div>
          <div class="cont2">
            <img  src="immagini/{{$preferito->img}}" class="logo">
          </div>
        </div>
        <div class="cont">
          <div>
            @foreach ($num as $numero)
              @if($numero->id==$preferito->idevento)
              <a href="modifica?id={{$preferito->idevento}}&tipo=1&user={{$log}}&val={{$numero->numvoti}}">
            <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/heart.png">
          </a>
            <h1>

                    {{$numero->numvoti}}
                  @endif
                @endforeach
            </h1>
          </div>
          <div>
            <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/chat.png");?>" class="chat" num="{{$preferito->idevento}}" user="{{$log}}">
          </div>
        </div>
        <div class="spazio"></div>
      @endforeach
    @elseif($liv==1)
    @foreach ($result as $results)
      <div class="cont">
        <h1>titolo:{{$results->titolo}}</h1>
        <h1>data:{{$results->data}}</h1>
      </div>

      <div class="cont">
        <div class="cont2">
          <h1>descrizione: </h1>
          <p>
            {{$results->descrizione}}
          </p>
        </div>
        <div class="cont2">
          <img  src="immagini/{{$results->img}}" class="logo">
        </div>
      </div>
      <div class="cont">
        <div>
          <a href="modifica?id={{$results->id}}&tipo=3">
            <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/trash2.png">
          </a>
        </div>
      </div>
      <div class="spazio"></div>
    @endforeach
    @else
    @foreach ($result as $results)
      <div class="cont">
        <h1>titolo:{{$results->titolo}}</h1>
        <h1>data:{{$results->data}}</h1>
      </div>

      <div class="cont">
        <div class="cont2">
          <h1>descrizione: </h1>
          <p>
            {{$results->descrizione}}
          </p>
        </div>
        <div class="cont2">
          <img  src="immagini/{{$results->img}}" class="logo">
        </div>
      </div>
      <div class="cont">
        <div>
          <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/heart.png">
          <h1>
              @foreach ($num as $numero)
                @if($numero->id==$results->idevento)
                  {{$numero->numvoti}}
                @endif
              @endforeach
          </h1>
        </div>
      </div>
      <div class="spazio"></div>
    @endforeach

    @endif
    </section>

      <section id="modal-view" class="hidden"></section>
  </body>
</html>
