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


  var options = [];
//DROPDOWN CHECKBOX
$( '.dropdown-menu a' ).on( 'click', function( event ) {
   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();
      
   console.log( options );
   return false;
});
	</script>

  <style type="text/css">
    .col-md-3{
      margin: 0 5px 5px 0;
    }


  </style>
</head>
<body>

<?php include 'cabecalho.php'; ?>

<div class="container-fluid conteudo">


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/banner1.jpg" alt="...">
      <div class="carousel-caption">
       <h1> Notebooks </h1> 
      </div>
    </div>
    <div class="item">
      <img src="img/banner2.jpg" alt="...">
      <div class="carousel-caption">
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
      </div>
    </div>

    <div class="item">
      <img src="img/banner3.jpg" alt="...">
      <div class="carousel-caption">
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br>
<!-- FIM CAROUSEL -->

  <div class="row">
  <div class="col-xs-3 col-md-1 col-lg-1">
<!-- FILTRO -->
<div class="btn-group-vertical" role=group aria-label="...">
    <div class="button-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Marca <span class="caret"></span></button>
<ul class="dropdown-menu">
  <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox"/>&nbsp;Acer</a></li>
  <li><a href="#" class="small" data-value="option2" tabIndex="-1"><input type="checkbox"/>&nbsp;Asus</a></li>
  <li><a href="#" class="small" data-value="option3" tabIndex="-1"><input type="checkbox"/>&nbsp;DELL</a></li>
  <li><a href="#" class="small" data-value="option4" tabIndex="-1"><input type="checkbox"/>&nbsp;HP</a></li>
  <li><a href="#" class="small" data-value="option5" tabIndex="-1"><input type="checkbox"/>&nbsp;Lenovo</a></li>
  <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/>&nbsp;Samsung</a></li>
</ul>
  </div>
  <div class="btn-group">
    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" >Preço <span class="caret"></span></button>
  </div>
</div>
<!-- FIM FILTRO -->
  </div>
  <div class="col-xs-9 col-md-11 col-lg-11">
  <!-- NOTEBOOKS -->
        <?php
          include 'banco.php';
          $sql = "SELECT * FROM produtos";
          $resultado = mysql_query($sql);

          echo "<div class='row'>";
          while ($row = mysql_fetch_array($resultado)){
            $id = $row['id'];
            $categoria = $row['categoria'];
            $produto = $row['produto'];
            $marca = $row['marca'];
            $quantidade = $row['quantidade'];
            $preco = $row['preco'];
            $descricao = $row['descricao'];

          echo "
          <div class='col-x6 col-md-4'>
            <div class='thumbnail'>
              <img src='img/notebooks/note1.jpg' alt'Notebook Cinza'>
              <div class='caption'>
                <h3> {$produto} </h3>
                <p>{$marca}</p>";
                $iniciodescr = substr($descricao, 0, 40);
          echo "<p>{$iniciodescr}...</p>
                <p>R$ {$preco},99</p>
                <p><a href='pedidos.php?id={$row['id']}' class='btn btn-info glyphicon glyphicon-shopping-cart'> Comprar</a></p>
              </div>
            </div>
          </div>";
          }
          echo "</div>";//FIM DIV ROW
        ?>
  <!--FIM NOTEBOOKS -->
  </div>
  </div>
</div>
</body>
</html>