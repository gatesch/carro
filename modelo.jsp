<%@page import="java.util.*,java.sql.*" %>
<html>
<head>
<BASE TARGET="Carro">
</head>
<body background="imagenes/backgroundbrown2.jpg">
<%
// me conecto a la base de datos
// me pego a la base de datos carros
try {
	String sq = "select id,direccion from sucursal where rif = ?";
	Class.forName("oracle.jdbc.driver.OracleDriver");
	Connection conn2=DriverManager.getConnection("jdbc:oracle:thin:@potter:1521:sid","agua","agua");
	PreparedStatement ps = conn2.prepareStatement(sq);

	ps.setString(1,request.getParameter("marca"));

	ResultSet rs = ps.executeQuery();
// Escojo todos los campos de la tabla clientes y los almaceno en una variable result
// Creo la forma que se va a llamar mar, el metodo no se que es y llama a pedidos.php3
out.println("<form name=mar method=post action=carro.jsp>");
// Relleno el combo con todos las marcas
out.println("<font color=yellow size=3><p align=center><b><i>please chose a branch:</i></b></p></font>");
//empiezo una prueba
//$result2=mysql_query("select * from modelo where id_marca = $marca order by nombre",$db);
out.println("<p align=center>");
//if (marca!='')
//{
out.println("<select name=modelo>");
while (rs.next())
{
        out.println("<option value="+rs.getString("id")+">"+rs.getString("direccion")+"</option>");
}
out.println("</select>");

out.println("</p>");
//termino la prueba
// Creo el boton que ejecuta la accion de ir a la pagina carro.php3
out.println("<p align=center>");
out.println("<input type=submit name=buscar1 value=Search></center>");
out.println("</p>");
// Termino la forma
out.println("</form>");
}
finally{
           //	  if( stmt !=null) try {stmt.close();} catch(Exception e){}
}

//out.println(request.getParameter("marca"));
%>
</body>
</html>
