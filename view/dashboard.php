<?php
if(!$sessionStatus) header('location: /prjm08uf23/?page=inicio');
require 'controller/getData.php';
$title = 'Visualizar datos';
$html = '
    <main>
        <h1>Inicio</h1>
        <hr>
        <ul>
            <li><a href="./model/closeSession.php">Cerrar sesión</a></li>
            <li><a href="/prjm08uf23/?page=createUser">Crear usuario</a></li>
        </ul>
        <hr>
        <form action="/prjm08uf23" method="GET">
            <input type="hidden" name="page" value="dashboard">
            Unidad organizativa: <input type="text" name="ou"><br>
            Usuario: <input type="text" name="usr"><br>
            <input type="submit"/>
            <input type="reset"/>
        </form>
        <hr>
        <div>
            '.$data.'
        </dvi>
    </main>
';
?>