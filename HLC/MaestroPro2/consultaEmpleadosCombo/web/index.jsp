<%-- 
    Document   : index
    Created on : 20-nov-2020, 8:23:22
    Author     : Juan
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
            <h:form>
            <h3><h:outputText value="Consulta De Personas"/></h3>
            <h:outputText value="Personas"/>
     
            <h:selectOneMenu value="#{empleados.Indice}" >
                <f:selectItems value="#{empleados.listaDepartamentos}"/>
            </h:selectOneMenu>
                 <br>
            
            <h:commandButton value="Seleccionar" action="verDatos"/>
            </h:form>            
        </body>
    </html>
</f:view>
