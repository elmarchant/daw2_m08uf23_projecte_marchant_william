<?php

if($sessionStatus) header('location: /prjm08uf23?page=dashboard');

$title = 'Iniciar sesión';
$html ='
    <form action="./model/authentication.php" method="POST">
    	Usuario con permisos de administración<input type="text" name="adm"><br>
    	Contraseña del usuario: <input type="password" name="cts"><br>
    	<input type="submit" value="Envia" />
    	<input type="reset" value="Neteja" />
    </form>
';
?>