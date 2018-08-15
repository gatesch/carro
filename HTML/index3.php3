<html>
<head>
</head>
<body background="imagenes/background8.gif">
<hr color=blue>
<p align=center>
<font color=white size=5>
En esta pagina podras encontrar la informacion acerca de los siguientes <font color=red size=6>Bandas Musicales</font>
</font>
<?php
$db=mysql_connect("localhost","root");
mysql_select_db("bandas",$db);
$result=mysql_query("select * from grupos",$db);
echo "<form name=gru method=post action=banda.php3>";
echo "<center><select name=grupo>";
while ($myrow=mysql_fetch_array($result))
{
        printf ("<option value=%d>%s</option>",$myrow["id_grupo"],$myrow["nombre"]);
}
echo "</select>";
echo "<input type=submit name=buscar1 value=Buscar></center>";
echo "</form>";
?>
<table>
<tr><td><img src=/imagenes/crystal_joe.jpg></td>
<td><form name=ins1 method=post action=insertgrupo.php3>
<input type=hidden name=modo value=1>
<input type=submit value="Insertar un Nuevo Grupo">
</form>
<form name=disq action=disquera.php3 method=post>
<input type=submit name=disque value="Disquera">
</form>
<form name=gene method=post action=genero.php3>
<input type=submit name=gener value="Genero">
</form>
</td></tr>
</table>
</p>
<hr color=blue>
</body>
</html>