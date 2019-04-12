<?PHP
  
  $articulos = getArticulos();
  
  /* para ver el array que recibe, sacale el comentario a la linea de abajo*/
  //var_dump($articulos);
   
?>
<section class="__wrapper-events" id="events">
  <div class="__header-events">
    <div class="__text-combo __light __max-width">
      <h2>Nombre de la categoria</h2>
      <h3>Breve Descripcion</h3>
    </div>
  </div>
  <div class="__body-events">
    <div class="row __max-width">
    
      <!-- A partir de aca recorrer con un forech y publicar los articulos del array 
      seguir ejemplo de los siguientes
      -->
    
      <article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="__card">
          <div class="__inner-img">
            <img src="img/img_square_1.jpg" alt="">
          </div>
          <div class="__inner-text">
            <h4>Ad lorem ipsum</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est in dicta neque iste repudiandae nulla, amet voluptas sit excepturi quaerat.</p>
            <h5>$250</h5>
          </div>
        </div>
      </article>
      <article class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="__card">
          <div class="__inner-img">
            <img src="img/img_square_1.jpg" alt="">
          </div>
          <div class="__inner-text">
            <h4>Ad lorem ipsum</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est in dicta neque iste repudiandae nulla, amet voluptas sit excepturi quaerat.</p>
            <h5>$250</h5>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>
