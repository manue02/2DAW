<%-- 
    Document   : verDatos
    Created on : 05-oct-2022, 11:20:28
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
            <h3>Estos son sus datos</h3>
            <p>Nombre
                <h:outputText value="#{datos.nombre}"/></p>
            <p>Está en D.A.W. porque:<br>
                <h:outputText value="#{datos.motivo}"/></p>
            <p>S.O. 
                <h:outputText value="#{datos.sistema}"/></p>
             <p>Idiomas 
                 <h:outputText value="#{datos.concadenaIdiomas()}"/></p>
             <p>Lenguajes de Programación 
                 <h:outputText value="#{datos.concadenaLenguajes()}"/></p>
        </body>
    </html>
</f:view>
