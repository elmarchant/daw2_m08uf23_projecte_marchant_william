<?php
    require '../vendor/autoload.php';
    include './ldapConnection.php';
    use Laminas\Ldap\Ldap;
    
    ini_set('display_errors', 0);
    if ($_POST['cts'] && $_POST['adm']){
        $ldap = new Ldap($opcions);
        $dn='cn='.$_POST['adm'].',dc=fjeclot,dc=net';
        $ctsnya=$_POST['cts'];
        try{
            $ldap->bind($dn,$ctsnya);
            session_start();
            $_SESSION['adm'] = $dn;
            $_SESSION['cts'] = $ctsnya;
            header("location: ..");
        } catch (Exception $e){
            echo "<b>Contraseña incorrecta</b><br><br>";
            echo "<a href=\"..\">Inicio</a>";
        }
    }
?>