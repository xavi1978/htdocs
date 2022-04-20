<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Profe" />
    <title></title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="index.css" />
    <style>
    </style>
<body>
<!--
1<div class="main">
<form action="./sender.php" method="get" target="_blank">

<fieldset><legend>Informacion personal</legend>
<p>Nombre completo: <input type="text" name="nombre">
<p> Dirección: <input type="password" name="contraseña">
<p>Teléfono: <input type="tel" name="telefono">
</fieldset>
</form>
<div>
-->
<?php
	 
    /*
    function cosa($x,$y){
      return $x+$y;
    }
  	
    echo cosa(3,1);
    echo '<br />';
    echo cosa(5,1);
    */
    
    $token='0123';
    $date='22.03.28';

    function encrypt($txt,$token1){
      $t= date('y.m.d');
      $tokenizer=$token1.$txt.$t;
      $hash= hash('gost', $tokenizer, false );
    return $hash;
    }
  
    echo encrypt('enrique@gmail.com',$token,date('y.m.d')).' enrique@gmail.com';
    echo '<br />';
    echo encrypt('holo',$token,date('y.m.d')).' holo';

  ?>

</body>
</html>
