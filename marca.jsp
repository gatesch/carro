<%@page import="java.util.*,java.sql.*" %>
<html>
<head>
<BASE TARGET="Modelo">
</head>
<body background="imagenes/backgroundbrown2.jpg">
<%
// me conecto a la base de datos
Connection conn=null;
try {
	Class.forName("oracle.jdbc.driver.OracleDriver");
	conn=DriverManager.getConnection("jdbc:oracle:thin:@potter:1521:sid","agua","agua");
	Statement stmt = conn.createStatement();
	ResultSet rs = stmt.executeQuery("Select rif,nombre from agua.cliente");
// Creo la forma que se va a llamar mar, el metodo no se que es y llama a pedidos.php3
	out.println("<form name=mar method=post action=modelo.jsp>");
// Creo el combo box llamado Marca
	out.println ("<font color=yellow size=6><p align=center><i><b>CSA DB</b></i></p></font>");
out.println ("<font color=yellow size=3><p align=center><b><i>Please chose a customer:</i></b></p></Font>");
out.println ("<p align=center>");
out.println ("<select name=marca language=javascript onchange=document.mar.submit();>");
// Relleno el combo con todos las marcas
//while ($myrow=mysql_fetch_array($result))
while (rs.next())
{
        out.println("<option value="+rs.getString("RIF")+">"+rs.getString("nombre")+"</option>");
}
out.println ("</select>");
out.println ("</p>");

//termino la prueba
// Creo el boton que ejecuta la accion de ir a la pagina carro.php3
//echo "<p align=center>";
//echo "<input type=submit name=buscar1 value=Buscar></center>";
//echo "</p>";
// Termino la forma
out.println ("</form>");
}
finally{
           //     if( stmt !=null) try {stmt.close();} catch(Exception e){}
}

%>
</body>
</html>
