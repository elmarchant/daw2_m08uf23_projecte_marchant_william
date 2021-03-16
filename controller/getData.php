<?php
    require 'vendor/autoload.php';
    require 'model/ldapConnection.php';
    use Laminas\Ldap\Ldap;
    ini_set('display_errors',0);
    $data = '';
    if (isset($_GET['usr']) && isset($_GET['ou'])){
        $domini = 'dc=fjeclot,dc=net';
        $ldap = new Ldap($opcions);
        $ldap->bind($_SESSION['adm'], $_SESSION['cts']);
        $entrada='uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
        $usuari=$ldap->getEntry($entrada);
        $data .= "<b><u>".$usuari["dn"]."</b></u><br>";
        foreach ($usuari as $atribut => $dada) {
            if ($atribut != "dn") $data .= $atribut.": ".$dada[0].'<br>';
        }
        if(sizeof($usuari) > 0){
            $data .= '
                <hr>
                <a class="link-button modify-button" href="./controller/modifyUser.php?usr='.$_GET['usr'].'&ou='.$_GET['ou'].'">Modificar</a>
                <a class="link-button delete-button" href="./controller/removeData.php?uid='.$_GET['usr'].'&unorg='.$_GET['ou'].'">Eliminar</a>
            ';
        }
    }
?>