<?php
if(!$sessionStatus) header('location: /prjm08uf23?page=inicio');
$title = 'Dashboard';
$html = '
    <main>
        <h1>Bienvenido '.$_SESSION['adm'].'</h1>
        <a href="./model/closeSession.php">Cerrar sesión</a> 
    </main>
';
?>