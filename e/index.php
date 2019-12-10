<?php 

session_start();

require_once('inc/inicio.php'); 

?>

<br>



    <div class="text-center">

    <h3 class="fonte destitulo cor">Bem Vindo(a) <b><?php echo $_SESSION['nome_usuario'] ?></b> !</h3>
                
        <br>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="i1.jpg" alt="Primeiro Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="i4.jpg" alt="Terceiro Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="i5.jpg" alt="Terceiro Slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>


    </div>


<br>
<br>


    <div>
        <hr class="hr">
        <h3 class="fonteg destitulo cor">Produtos em Destaque</h3>
        <br>
        <div class="ha">
            <div class="card text-center" style="width: 10rem;">
                <img class="card-img-top" src="c1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cebola</h5>
                    <p class="card-text">R$ 5,00</p>
                </div>

                <div class="card-body">
                    <a href="infoProduto.html" class="btn btn-outline-danger">Comprar</a>
                </div>
            </div>


            <div class="card text-center" style="width: 10rem;">
                <img class="card-img-top" src="c2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cenoura</h5>
                    <p class="card-text">R$ 5,00</p>
                </div>

                <div class="card-body">
                    <a href="informacoes.html" class="btn btn-outline-danger">Comprar</a>
                </div>
            </div>

            <div class="card text-center" style="width: 10rem;">
                <img class="card-img-top" src="c3.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Alface</h5>
                    <p class="card-text">R$ 5,00</p>
                </div>

                <div class="card-body">
                    <a href="informacoes.html" class="btn btn-outline-danger">Comprar</a>
                </div>
            </div>

            <div class="card text-center" style="width: 10rem;">
                <img class="card-img-top" src="c4.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Tomate</h5>
                    <p class="card-text">R$ 5,00</p>
                </div>

                <div class="card-body">
                    <a href="informacoes.html" class="btn btn-outline-danger">Comprar</a>
                </div>
            </div>
        </div>
  
    </div>

    <br>
    <br>

<!--
    <div>Icons made by
        <a href="https://br.flaticon.com/autores/freepik" title="Freepik">Freepik</a> from
        <a href="https://br.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by
        <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0"
            target="_blank">CC 3.0 BY</a>
    </div>-->

    <script async src="sw.js"></script>

    <script>
               
               if (navigator.serviceWorker.controller) {
                 console.log('[PWA Builder] active service worker found, no need to register')
               } else {
                 navigator.serviceWorker.register('sw.js', {
                   scope: './'
                 }).then(function(reg) {
                   console.log('Service worker has been registered for scope:'+ reg.scope);
                 });
               }
           </script>

    

<?php require_once('inc/fim.php'); ?>