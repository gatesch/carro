<html>
<head>
<title>
Pedidos realizados por el cliente
</title>
</head>
<body>
<?php
// me conecto a la base de datos desde esta pagina
$db=mysql_connect("localhost","root");
// selecciono la base de datos pedido
mysql_select_db("agua",$db);
// hago un query para saber que pedidos tiene el cliente
$sql2="select * from pedido where rif_cliente='$cliente'";
// hago otro query para traerme los datos del cliente. Notese que al ser un string va entre comillas simples
$sql="select * from cliente where rif_cliente='$cliente'";
$result=mysql_query($sql,$db);
?>
<p align=center>
<font color=#ff0000 size=7>
Los siguientes son los pedidos perteneciantes al cliente:
<?php
printf("%s",mysql_result($result,0,"nombre"));
?>
</font>
</p>
<br><br><br><br>

</body>
</html>