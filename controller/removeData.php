<?php
    require '../vendor/autoload.php';
    require '../model/ldapConnection.php';
    
    use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
    
    ini_set('display_errors', 0);
    
    $sessionStatus = false;
    session_start();
    if(isset($_SESSION['adm']) && isset($_SESSION['cts'])){
        $ldap = new Ldap($opcions);
        $dn = $_SESSION['adm'];
        $ctsnya = $_SESSION['cts'];
        try{
            $ldap->bind($dn,$ctsnya);
            $sessionStatus = true;
        } catch (Exception $e){
            unset($_SESSION['adm']);
            unset($_SESSION['cts']);
            $sessionStatus = false;
        }
    }
    
    if($sessionStatus){
        if(isset($_GET['uid']) && isset($_GET['unorg'])){
            $dn = 'uid='.$_GET['uid'].',ou='.$_GET['unorg'].',dc=fjeclot,dc=net';
            if ($ldap->delete($dn)){
                echo '
                    <h1>Usuario eliminado</h1>
                    <hr>
                    <a href="/prjm08uf23/?page=dashboard">Volver</a>
                ';
            }else{
                echo '
                    <h1>El usuario no existe.</h1>
                    <hr>
                    <a href="/prjm08uf23/?page=dashboard">Volver</a>
                ';
            }
        }else{
            echo '
                <h1>Datos no válidos</h1>
                <hr>
                <a href="/prjm08uf23/?page=dashboard">Volver</a>
            ';
        }
    }else{
        echo '
            <h1>Prohibido</h1>
            <hr>
            <p>Usted no tiene acceso a la modifiación de datos de esta servidor.</p>
        ';
    }
?>