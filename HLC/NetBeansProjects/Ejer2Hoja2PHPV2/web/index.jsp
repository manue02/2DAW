<%-- 
    Document   : index
    Created on : 28-sep-2022, 10:52:08
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
            <h1><h:outputText value="Ejercio1 Hoja2 PHP!"/></h1>
            <h:form>
            operando 1:
            <h:inputText value="#{datos.operando1}"/><br>
             operando 2:
            <h:inputText value="#{datos.operando2}"/><br>
            Seleccione operacion:
            <h:selectOneMenu value="#{datos.operacion}">
              <%-- Esto es otra forma de hacerlo
                <f:selectItem itemLabel="Suma" itemValue="Suma"/>
                <f:selectItem itemLabel="Resta" itemValue="Resta"/>
                <f:selectItem itemLabel="Multiplicacion" itemValue="Multiplicacion"/>
              --%>
                <f:selectItems value="#{datos.listaOpciones}"/>
            </h:selectOneMenu>
            
            <h:commandButton value="Calcular" action="proceso"/>
            </h:form>
            
        </body>
    </html>
</f:view>
