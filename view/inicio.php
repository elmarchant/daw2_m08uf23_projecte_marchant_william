<?php

if($sessionStatus) header('location: /prjm08uf23/?page=dashboard');

$title = 'Inicio';
$html =' 
    <main>
        <h1>Bienvenidos a la página de inicion</h1>
        <ul>
            <li><a href="/prjm08uf23?page=login">Iniciar sesión</a></li>
        </ul>
    </main>
';
?>