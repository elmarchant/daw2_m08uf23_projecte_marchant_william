<?php
    $path = './view/inicio.php';
    $location = 'location: /';

    if(isset($_GET['page']) && $_GET['page'] != null){
        if(file_exists('./view/'.$_GET['page'].'.php')){
            if($_GET['page'] !== 'inicio'){
                $path = './view/'.$_GET['page'].'.php';
            }else{
                header($location);
            }
        }
    }
?>