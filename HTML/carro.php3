<html>
<head>
<BASE TARGET="Carro">
</head>
<body background="imagenes/backgroundbrown1.gif">
<?php
$db=mysql_connect("localhost","root");
mysql_select_db("carros",$db);
$sql="select * from carro where id_modelo=$modelo";
$result=mysql_query($sql,$db);
$sql2="select nombre from modelo where id=$modelo";
$result2=mysql_query($sql2,$db);
$row2=mysql_fetch_row($result2);
echo "<p align=center><font color=red size=6><b><i>".$row2[0]."</i></b></font></p>";

echo "<table border=1 align=center>";

$i=0;
if($row=mysql_fetch_row($result))
{
do
{
        if ($i==0)
        {
                echo "<tr>";
        }
        echo "<td><a href=cliente.php3?id=".$row[0]."><img src=".$row[1]."></a><p align=center><font color=red>Modelo ".$row[5]."</font></p></td>";

        $i=$i+1;
        if ($i==5)
        {
                echo "</tr>";
                $i=0;
        }
}while($row=mysql_fetch_row($result));
}
else
{
        echo "<p align=center><font color=red size=3>De momento no tenemos ".$row2[0]." disponibles para la venta</font></p>";
}
echo "</table>";
?>
</body>
</html>
