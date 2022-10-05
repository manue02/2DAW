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
                <h1><h:outputText value="Cuestionario Alumnado D.A.W"/></h1>
                <p>Teclea tu nombre:
                    <h:inputText value = "#{datos.nombre}"/>
                </p>
                <p>Marca el motivo por el que te matriculastes en D.A.W:</p>
                <h:selectOneRadio value = "#{datos.motivo}">

                    <f:selectItem itemValue="trabajo" itemLabel="Encontrar trabajo"></f:selectItem>
                    <f:selectItem itemValue="trabajo" itemLabel="Siempre me intereso el curso"></f:selectItem>
                    <f:selectItem itemValue="trabajo" itemLabel="Es un sector donde se paga bien"></f:selectItem>

                </h:selectOneRadio>
            </p><p>¿Que sistema suele utilizar?

                <h:selectOneMenu value ="#{datos.sistema}">
                    <f:selectItems value="#{datos.listaSistemas}"/>     
                
            </p>
            </h:form>
        </body>
    </html>
</f:view>
