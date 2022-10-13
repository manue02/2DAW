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
            <p>Nombre:<br>
                <h:outputText value="#{datos.nombre}"/></p>
            <p>Correo:<br>
                <h:outputText value="#{datos.correo}"/></p>
            <p>¿Te consideras gamer?<br> 
                <h:outputText value="#{datos.motivo}"/></p>
             <p>Plataforma Favorita:<br> 
                 <h:outputText value="#{datos.concadenaLenguajes()}"/></p>
             <p>Lista de juegos que conoces:<br> 
                 <h:outputText value="#{datos.cadenaSistemas()}"/></p>
             <p>Seleccion de genero Favorito:<br> 
                 <h:outputText value="#{datos.concadenaIdiomas()}"/></p>
        </body>
    </html>
</f:view>
