<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link href="../resources/css/app.css" rel="stylesheet">
    <script src="../resources/js/chat.js" defer="true"></script>
    <title></title>
  </head>
  <body>
<?php echo $__env->make('header',array('aut'=>$liv), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <section>
    <h1> EVENTI ACIREALE </h1>
    <?php if($liv==0): ?>
      <?php if($sem==0): ?>
      <?php $__currentLoopData = $nonpreferiti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nonpreferito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="cont">
          <h1>titolo:<?php echo e($nonpreferito->titolo); ?></h1>
          <h1>data:<?php echo e($nonpreferito->data); ?></h1>
        </div>

        <div class="cont">
          <div class="cont2">
            <h1>descrizione: </h1>
            <p>
              <?php echo e($nonpreferito->descrizione); ?>

            </p>
          </div>
          <div class="cont2">
            <img  src="immagini/<?php echo e($nonpreferito->img); ?>" class="logo">
          </div>
        </div>
        <div class="cont">
          <div>
            <?php $__currentLoopData = $num; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($numero->id==$nonpreferito->idevento): ?>
            <a href="modifica?id=<?php echo e($nonpreferito->idevento); ?>&tipo=2&user=<?php echo e($log); ?>&val=<?php echo e($numero->numvoti); ?>">
              <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/hearts.png");?>">
            </a>
            <h1>

                    <?php echo e($numero->numvoti); ?>

                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </h1>
          </div>
          <div>
            <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/chat.png" class="chat" num="<?php echo e($nonpreferito->idevento); ?>" user="<?php echo e($log); ?>">
          </div>

        </div>
        <div class="spazio"></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      <?php $__currentLoopData = $preferiti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preferito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="cont">
          <h1>titolo:<?php echo e($preferito->titolo); ?></h1>
          <h1>data:<?php echo e($preferito->data); ?></h1>
        </div>

        <div class="cont">
          <div class="cont2">
            <h1>descrizione: </h1>
            <p>
              <?php echo e($preferito->descrizione); ?>

            </p>
          </div>
          <div class="cont2">
            <img  src="immagini/<?php echo e($preferito->img); ?>" class="logo">
          </div>
        </div>
        <div class="cont">
          <div>
            <?php $__currentLoopData = $num; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($numero->id==$preferito->idevento): ?>
              <a href="modifica?id=<?php echo e($preferito->idevento); ?>&tipo=1&user=<?php echo e($log); ?>&val=<?php echo e($numero->numvoti); ?>">
            <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/heart.png">
          </a>
            <h1>

                    <?php echo e($numero->numvoti); ?>

                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </h1>
          </div>
          <div>
            <img src="<?php echo("http://nicolaaliuni.altervista.org/mhw4/immagini/chat.png");?>" class="chat" num="<?php echo e($preferito->idevento); ?>" user="<?php echo e($log); ?>">
          </div>
        </div>
        <div class="spazio"></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php elseif($liv==1): ?>
    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="cont">
        <h1>titolo:<?php echo e($results->titolo); ?></h1>
        <h1>data:<?php echo e($results->data); ?></h1>
      </div>

      <div class="cont">
        <div class="cont2">
          <h1>descrizione: </h1>
          <p>
            <?php echo e($results->descrizione); ?>

          </p>
        </div>
        <div class="cont2">
          <img  src="immagini/<?php echo e($results->img); ?>" class="logo">
        </div>
      </div>
      <div class="cont">
        <div>
          <a href="modifica?id=<?php echo e($results->id); ?>&tipo=3">
            <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/trash2.png">
          </a>
        </div>
      </div>
      <div class="spazio"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="cont">
        <h1>titolo:<?php echo e($results->titolo); ?></h1>
        <h1>data:<?php echo e($results->data); ?></h1>
      </div>

      <div class="cont">
        <div class="cont2">
          <h1>descrizione: </h1>
          <p>
            <?php echo e($results->descrizione); ?>

          </p>
        </div>
        <div class="cont2">
          <img  src="immagini/<?php echo e($results->img); ?>" class="logo">
        </div>
      </div>
      <div class="cont">
        <div>
          <img src="http://nicolaaliuni.altervista.org/mhw4/immagini/heart.png">
          <h1>
              <?php $__currentLoopData = $num; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($numero->id==$results->idevento): ?>
                  <?php echo e($numero->numvoti); ?>

                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </h1>
        </div>
      </div>
      <div class="spazio"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>
    </section>

      <section id="modal-view" class="hidden"></section>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\myapp\resources\views/index.blade.php ENDPATH**/ ?>