<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Página Inicial</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
  <script src='js/jquery-3.1.1.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
	  $(function () {
	    $('.dropdown-toggle').dropdown();
	  }); 
	</script>

    <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>

</head>
<body>

<?php include 'cabecalho.php' ?>

<div class="container-fluid conteudo">


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/banner1.jpg" alt="Notebooks">
    </div>

    <div class="item">
      <img src="img/banner2.jpg" alt="Notebooks">
    </div>

    <div class="item">
      <img src="img/banner3.jpg" alt="Notebooks">
    </div>

    <div class="item">
      <img src="img/banner4.jpg" alt="Notebooks">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<!-- DESTAQUES -->
<h2> Notebooks em destaque </h2>

<div class="row">

 <div class="col-x6 col-md-3">
  <a href="#" class="thumbnail">
   <img src="img/notebooks/note1.jpg" alt="Notebook Cinza">
   <div class="caption">
   <p>Notebook Samsung Expert X23 270E5K-XW1 com Intel® Core™ i5-5200U, 8GB, 1TB, Gravador de DVD, HDMI, Placa Gráfica de 2GB, LED 15.6" e Windows 10.</p>
   </div>
  </a>
 </div>

 <div class="col-x6 col-md-3">
  <a href="#" class="thumbnail">
   <img src="img/notebooks/note2.jpg" alt="Notebook Cinza">
   <div class="caption">
   <p>Notebook Asus X555UB-BRA-XX299T Intel Core i5 8GB (2GB de Memória Dedicada) 1TB Tela LED 15,6" Windows 10 - Preto e Cinza.</p>
   </div>
  </a>
 </div>

 <div class="col-x6 col-md-3">
  <a href="#" class="thumbnail">
   <img src="img/notebooks/note3.jpg" alt="Notebook Cinza">
   <div class="caption">
   <p>Notebook Acer E5-573G-58B7 Intel Core i5 8GB (2GB Memória Dedicada) 1TB LED 15,6" Windows 10 - Grafite.</p>
   </div>
  </a>
 </div>

 <div class="col-x6 col-md-3">
  <a href="#" class="thumbnail">
   <img src="img/notebooks/note4.jpg" alt="Notebook Cinza">
   <div class="caption">
   <p>Notebook Dell Inspiron i14-5448-C25 Intel Core i7 8GB (2GB de Memória Dedicada) 1TB 8GB SSD 14" Windows 10.</p>
   </div>
  </a>
 </div>

</div>

</body>
</html>