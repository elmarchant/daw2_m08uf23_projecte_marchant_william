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
        </div>
        <style>
            .link-button{
                display: inline-block;
                padding: 8px;
                text-decoration: none;
                margin: 2px;
            }

            .delete-button{
                background-color: #e84141;
                color: white;
            }

            .modify-button{
                background-color: #3f6ce8;
                color: white;
            }
        </style>
    </main>
';
?>