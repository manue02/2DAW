<%-- 
    Document   : VerDatos
    Created on : 05-oct-2022, 11:21:02
    Author     : alumno
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%@taglib prefix="f" uri="http://java.sun.com/jsf/core"%>
<%@taglib prefix="h" uri="http://java.sun.com/jsf/html"%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<f:view>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <title>JSP Page</title>
        </head>
        <body>
            <h3><h:outputText value="Estos son tus datos"/></h3>
            <p>
                Nombre
                <h:outputText value ="#{datos.nombre}"/></p>
            <p>
                Esta en D.A.W porque:<br>
                <h:outputText value ="#{datos.motivo}"/></p><p>
                Nombre
                <h:outputText value ="#{datos.sistema}"/></p>
        </body>
    </html>
</f:view>
