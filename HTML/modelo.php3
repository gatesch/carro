<html>
<head>
<BASE TARGET="Carro">
</head>
<body background="imagenes/backgroundbrown2.jpg">
<?php
// me conecto a la base de datos
$db=mysql_connect("localhost","root");
// me pego a la base de datos carros
mysql_select_db("carros",$db);
// Escojo todos los campos de la tabla clientes y los almaceno en una variable result
// Creo la forma que se va a llamar mar, el metodo no se que es y llama a pedidos.php3
echo "<form name=mar method=post action=carro.php3>";

// Relleno el combo con todos las marcas
echo "<font color=yellow size=3><p align=center><b><i>Seleccione el modelo de su agrado:</i></b></p></font>";
//empiezo una prueba
$result2=mysql_query("select * from modelo where id_marca = $marca order by nombre",$db);
echo "<p align=center>";
if ($marca!='')
{
echo "<select name=modelo>";
while ($myrow=mysql_fetch_array($result2))
{
        printf ("<option value=%d>%s</option>",$myrow["id"],$myrow["nombre"]);
}
echo "</select>";
}

else
{
$result3=mysql_query("select * from modelo where id_marca = 1 order by nombre",$db);
echo "<select name=modelo>";
while ($myrow=mysql_fetch_array($result3))
{
        printf ("<option value=%d>%s</option>",$myrow["id"],$myrow["nombre"]);
}
echo "</select>";
}

echo "</p>";
//termino la prueba
// Creo el boton que ejecuta la accion de ir a la pagina carro.php3
echo "<p align=center>";
echo "<input type=submit name=buscar1 value=Buscar></center>";
echo "</p>";
// Termino la forma
echo "</form>";
?>
</body>
</html>