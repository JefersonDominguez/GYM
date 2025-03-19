



<%@ page language="java" contentType="application/json; charset=UTF-8" pageEncoding="UTF-8"%>

<%
    // Limpiar el carrito
    session.setAttribute("carrito", new ArrayList<>());

    // Eliminar todas las variables de sesión
    session.invalidate();

    // Devolver una respuesta JSON indicando el éxito
    response.setContentType("application/json");
    response.setCharacterEncoding("UTF-8");
    out.print("{\"success\": true}");
    out.flush();
%>