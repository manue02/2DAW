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
            <h1><h:outputText value="Bienvenido al cuestionario sobre vidiojuegos"/></h1>
            
             <h2><h:outputText value="Datos del cuestionario"/></h2>
            <p>Introduce tu nombre: 
                <h:inputText value="#{datos.nombre}"/>
            <p>Introduce tu direccion de email: 
                <h:inputText value="#{datos.correo}"/>
            </p><p>Te cosideras gamer?:<br>
                <h:selectOneRadio value="#{datos.motivo}" layout="pageDirection">
                    <f:selectItem itemValue="trabajo" itemLabel="Si" />
                    <f:selectItem itemValue="friqui" itemLabel="No" />
                   
                </h:selectOneRadio>
            </p><p>Cual es tu plataforma favorita<br>
            <p>
                <h:selectManyListbox value="#{datos.lenguajes}">
                    <f:selectItems value="#{datos.listaLenguajes}"/>
                </h:selectManyListbox>
                
            </p>
            
             <p>Selecciona su genero o generos favoritos:<br>
                    <h:selectManyCheckbox value="#{datos.idiomas}">
                    <f:selectItem itemValue="Aventura" itemLabel="Aventura" />
                    <f:selectItem itemValue="Plataformas" itemLabel="Plataformas" />
                    <f:selectItem itemValue="Accion" itemLabel="Accion" />
                    <f:selectItem itemValue="FPS" itemLabel="FPS(Firts Person Shooter)" />
                    <f:selectItem itemValue="Simulacion" itemLabel="Simulacion" />
                    <f:selectItem itemValue="Estrategia" itemLabel="Estrategia" />
                </h:selectManyCheckbox>
            </p>
            <h:commandButton value="Enviar" action="verDatos" />
             </h:form>
        </body>
    </html>
</f:view>
