<html>
<head>
<BASE TARGET="Modelo">
</head>
<body background="imagenes/backgroundbrown2.jpg">
<?php
// me conecto a la base de datos
$db=mysql_connect("localhost","root");
// me pego a la base de datos carros
mysql_select_db("carros",$db);
// Escojo todos los campos de la tabla clientes y los almaceno en una variable result
$result=mysql_query("select * from marca order by nombre",$db);
// Creo la forma que se va a llamar mar, el metodo no se que es y llama a pedidos.php3
echo "<form name=mar method=post action=modelo.php3>";
// Creo el combo box llamado Marca
echo "<font color=yellow size=6><p align=center><i><b>Tu Coche</b></i></p></font>";
echo "<font color=yellow size=3><p align=center><b><i>Escoja su marca favorita:</i></b></p></Font>";
echo "<p align=center>";
echo "<select name=marca language=javascript onchange=document.mar.submit();>";
// Relleno el combo con todos las marcas
while ($myrow=mysql_fetch_array($result))
{
        printf ("<option value=%d>%s</option>",$myrow["id"],$myrow["nombre"]);
}
echo "</select>";
echo "</p>";

//termino la prueba
// Creo el boton que ejecuta la accion de ir a la pagina carro.php3
//echo "<p align=center>";
//echo "<input type=submit name=buscar1 value=Buscar></center>";
//echo "</p>";
// Termino la forma
echo "</form>";
?>
</body>
</html>