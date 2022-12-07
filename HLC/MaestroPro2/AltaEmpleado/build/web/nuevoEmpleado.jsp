<%-- 
    Document   : nuevoEmpleado
    Created on : 21-nov-2022, 14:14:21
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
            <h4><h:outputText value="Nuevo Empleado"/></h4>
            <h:form>
            <h:panelGrid columns="2">
                <h:outputText value="Nombre" />
                <h:inputText value="#{nuevo.nombre}"/>
                <h:outputText value="Sueldo" />
                <h:inputText value="#{nuevo.sueldo}"/>
                <h:outputText value="Departamento:" />
                <h:selectOneRadio value="#{nuevo.numDepartamento}">
                    <f:selectItems value="#{nuevo.listaDepartamentos}"/>
                </h:selectOneRadio>
                <h:outputText value="Oficio:" />
                <h:selectOneMenu value="#{nuevo.oficio}">
                    <f:selectItems value="#{nuevo.listaOficios}"/>
                </h:selectOneMenu>
                <h:outputText value="Jefe:" />
                <h:selectOneMenu value="#{nuevo.numJefe}">                    
                    <f:selectItems value="#{nuevo.listaJefes}"/>
                </h:selectOneMenu>
            </h:panelGrid>
            <h:commandButton value="Grabar" action="#{nuevo.grabarEmpleado()}"/>
        </h:form>
        </body>
    </html>
</f:view>
