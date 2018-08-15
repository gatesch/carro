<%@page import="java.sql.*" %>
<html>
<head>
<title>
Customers Database
</title>
</head>
<body background="imagenes/backgroundbrown1.gif">
<CENTER>
<BR><BR>
<B><font color=white size=6>CUSTOMERS</font><B>
<BR><BR>
<% Connection conn3=null;
try 
{
	String sql = "select * from agua.contacto where id_sucursal = ?";
	Class.forName("oracle.jdbc.driver.OracleDriver");
	conn3=DriverManager.getConnection("jdbc:oracle:thin:@potter:1521:sid","agua","agua");
	PreparedStatement pstmt = conn3.prepareStatement(sql);
	pstmt.setString(1,request.getParameter("modelo"));
	ResultSet rs2 = pstmt.executeQuery();
	// print start of table and column headers
	out.println("<TABLE CELLSPACING=\"0\" CELLPADDING=\"3\" BORDER=\"1\">");
	out.println("<TR><TH><font color=white>ID</font></TH><TH><font color=white>NAME</font></TH><TH><font color=white>SURNAME</font></TH>");
	out.println("<TH><font color=white>PHONE</font></TH><TH><font color=white>HANDPHONE</font></TH><TH><font color=white>TITLE</font></TH></TR>");
	//Loop through result of query
	while (rs2.next()){
		out.println("<TR>");
		out.println("<TD><font color=yellow>" + rs2.getString("ID") + "</font></TD>");
		out.println("<TD><font color=yellow>" + rs2.getString("Nombre") + "</font></TD>");
		out.println("<TD><font color=yellow>" + rs2.getString("apellido") + "</font></TD>");
		out.println("<TD><font color=yellow>" + rs2.getString("telefono") + "</font></TD>");
		out.println("<TD><font color=yellow>" + rs2.getString("celular") + "</font></TD>");
		out.println("<TD><font color=yellow>" + rs2.getString("cargo") + "</font></TD>");
		out.println("</TR>");
	}
	out.println("</TABLE>");
} 
catch (SQLException e)
{
	out.println("SQLException: " + e.getMessage() + "<BR>");
	while((e = e.getNextException())!=null)
		out.println(e.getMessage()+"<BR>");
}
catch (ClassNotFoundException e){
	out.println(e.getMessage() + "<BR>");
}
finally {
	try 
		{
			conn3.close();
		}
	catch (Exception ingnored){}
	}
%>
<BR><BR>
<font color=yellow size=3>This is the Updated customer database</font>
</CENTER>
</body>
</html>
