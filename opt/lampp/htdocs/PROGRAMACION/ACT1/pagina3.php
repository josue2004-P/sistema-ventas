<html>

<head>SEGUNDO PROGRAMA</head>

<body>
  <?php
  echo "<br>";
  echo "<br>";
$dia = date("d");
  if ($dia <= 30) {
    echo "sitio activo";
  } else {
    echo "sitio fuera de servicio";
  }
  ?>
</body>

</html>