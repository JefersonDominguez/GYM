<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>

<%-- Definir una función JSP para obtener la ruta de la imagen del producto --%>

<%
    String obtenerRutaImagenProducto(String imagen) {
        // Si la imagen comienza con "img/", asumimos que es una imagen definida manualmente
        if (imagen.startsWith("img/")) {
            return imagen;
        } else {
            // De lo contrario, asumimos que es una imagen de la base de datos y construimos la ruta completa
            return "img/producto/" + imagen;
        }
    }
%>
