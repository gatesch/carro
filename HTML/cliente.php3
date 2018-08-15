<html>
<head>
<BASE TARGET="Carro">
</head>
<body background="imagenes/backgroundbrown1.gif">
<?php
$db=mysql_connect("localhost","root");
mysql_select_db("carros",$db);
$sql="select * from carro where id=$id";
$result=mysql_query($sql,$db);
$row=mysql_fetch_row($result);
$sql2="select * from cliente where ci=$row[2]";
$result2=mysql_query($sql2,$db);
$row2=mysql_fetch_row($result2);
$sql3="select * from imagen where id_carro=$id";
$result3=mysql_query($sql3,$db);
echo "<br>";
echo "<table border=1 align=center>";
echo "<tr><td><font color=yellow size=6>Contacto</font></td></tr>";
echo "</table>";
echo "<br>";
echo "<table border=1 align=center>";
echo "<tr><td><font color=white>Nombre: ".$row2[1]." ".$row2[2]."</font></td><td><font color=white>Telefono: ".$row2[3]."</font></td><td><font color=white>Celular: ".$row2[4]."</font></td></tr>";
echo "</table>";
echo "<table border=1 align=center>";
echo "<tr><td><font color=white>E-mail: ".$row2[5]."</font></td></tr>";
echo "</table>";
echo "<br>";

if($row3=mysql_fetch_row($result3))
{
        do
        {
                echo "<table border=1 align=center>";
                echo "<tr><td><img src=".$row3[0]."></td></tr>";
                echo "</table>";
                echo "<br>";
        }while($row3=mysql_fetch_row($result3));
}
else
{
        echo"<p align=center><font color=red size=3>No hay imagen disponible</font></p>";
}
echo "<br>";
echo "<table border=1 align=center>";
echo "<tr><td><font color=yellow size=6>Detalles del Vehiculo</font></td></tr>";
echo "</table>";

echo "<br>";

echo "<table border=1 align=center>";
echo "<tr><td><font color=white>Modelo: ".$row[5]."</font></td><td><font color=white>Placa: ".$row[6]."</font></td><td><font color=white>Recorrido: ".$row[7]."</font></td></tr>";
echo "<tr><td><font color=white>Color: ".$row[8]."</font></td><td><font color=white>Motor: ".$row[9]."</font></td><td><font color=white>Transmision: ".$row[10]."</font></td></tr>";
echo "<tr><td><font color=white>Direccion: ".$row[11]."</font></td><td><font color=white>Vidrios: ".$row[12]."</font></td><td><font color=white>Aire: ".$row[13]."</font></td></tr>";
echo "<tr><td><font color=white>Asientos: ".$row[14]."</font></td><td><font color=white>Sonido: ".$row[15]."</font></td><td><font color=white>Alarma: ".$row[16]."</font></td></tr>";
echo "</table>";
if ($row[4]!="")
{
        echo "<br>";
        echo "<table border=1 align=center>";
        echo "<tr><td><font color=yellow>Extras: </font><font color=white>".$row[4]."</font></td></tr>";
        echo "</table>";
}
echo "<br>";
echo "<table border=1 align=center>";
echo "<tr><td><font color=yellow size=6>Costo ".$row[17]."</font></td></tr>";
echo "</table>";
echo "<br>";
echo "<p align=center><a href=\"portada.html\"><font color=yellow size=4>Inicio</font></a></p>";
?>
</body>
</html>