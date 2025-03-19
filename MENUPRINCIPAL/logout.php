
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="javax.servlet.http.HttpSession" %>

<%
// Obtiene la sesión actual
HttpSession session = request.getSession(false); // false para indicar que no queremos crear una nueva sesión si no existe

// Invalida la sesión si existe
if (session != null) {
    session.invalidate(); // Invalida la sesión actual
}

// Redirige al usuario a la página de inicio de sesión
response.sendRedirect("login.jsp");
%>