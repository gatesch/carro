<%@page import="java.util.*,java.sql.*" %>
<%!
private static String sqlBox1 = "select rif, nombre from cliente";
private static String sqlBox2 = "select direccion from sucursal where rif = ?";
%>
<%
Class.forName("oracle.jdbc.driver.OracleDriver");
Connection conn = null;
Statement stat = null;
PreparedStatement ps = null;
try {
	conn = DriverManager.getConnection("jdbc:oracle:thin:@potter:1521:sid","agua","agua");
	stat = conn.createStatement();
	ResultSet rs = null;
%>
<HTML>
<HEAD>
<script language="JavaScript">
<!--

	function getSelected(selectbox){
		for (i=0;i<selectbox.length;i++)
			if (selectbox.options[i].selected)return selectbox.options[i];
	}

	function update(level){
		var action = "?box1="+getSelected(form1.box1).text;
		if(level>=2)action +="&box2="+getSelected(from1.box2).text;
		location.replace(action);
	}

	//-->
</script>
</head>
<body>
<form name="form1">
	box1:<p>
	<select name="box1" onchange="javascript:update(1)">
<%
	String sel1 = request.getParameter("box1");
	rs = stat.executeQuery(sqlBox1);
	while (rs.next()){
		String option = rs.getString(1);
		if (sel1 == null) sel1=option; //make first as default choice
%>
<option <%=option.equals(sel1)?"selected":""%>><%=option%></option>
<%
	}
	rs.close();
%>
</select><p>

box2: <p>
<select name="box2" onchange=javascript:update(2)">
<%
	String sel2 = request.getParameter("box2");
	ps = conn.prepareStatement(sqlBox2);
	ps.setString(1,sel1);
	rs = ps.executeQuery();
	while(rs.next()){
		String option = rs.getString(1);
		if(sel2 == null) sel2 = option; //make first as default option
%>
	<option<%=option.equals(sel1)?"selected":""%>><%=option%></option>
<% }
rs.close();
ps.close();
%>
</select><p></p>
<%
	}finally{
		if( stat !=null) try {stat.close();} catch(Exception e){}
	}
%>
</form>
</body>
</html>
