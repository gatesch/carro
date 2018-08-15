<html>
<head>
<title>
Menu Principal
</title>
<body>
<br><br>
<h1>
Consulta de Pedidos por Cliente
</h1>
<?php
// me conecto a la base de datos
$db=mysql_connect("localhost","root");
// me pego a la base de datos agua
mysql_select_db("agua",$db);
// Escojo todos los campos de la tabla clientes y los almaceno en una variable result
$result=mysql_query("select * from cliente",$db);
// Creo la forma que se va a llamar cli, el metodo no se que es y llama a pedidos.php3
echo "<form name=cli method=post action=pedidos.php3>";
// Creo el combo box llamado cliente
echo "<select name=cliente>";
// Relleno el combo con todos los clientes
while ($myrow=mysql_fetch_array($result))
{
        printf ("<option value=%s>%s</option>",$myrow["rif_cliente"],$myrow["nombre"]);
}
echo "</select>";
// Creo el boton que ejecuta la accion de ir a la pagina pedidos.php3
echo "<input type=submit name=buscar1 value=Buscar></center>";
// Termino la forma
echo "</form>";
?>
</body>
</html>
