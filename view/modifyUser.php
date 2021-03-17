<?php
    if(!$sessionStatus) header('location: /prjm08uf23/?page=inicio');
    if(!isset($_GET['usr']) || !isset($_GET['ou'])) header('location: /prjm08uf23/?page=dahsboard');
    
    require 'controller/getData.php';
    
    $html = '';
    
    if(sizeof($usuari) <= 0){
        $html = '
            <main>
                <h1>El usuario no existe</h1>
                <hr>
                <p><a href="/prjm08uf23/?page=dashboard">Volver</a></p>
            </main>
         ';
    }else{
        $form = '';
        $title = 'Modificar usuario';
        $formData = [
            'num-id' => ' 
                <label>
                    <p>Número ID</p>
                    <input type="number" min="0" name="num-id" required/>
                </label>        
            ',
            'grup' => '
                <label>
                    <p>Grupo</p>
                    <input type="number" min="0" name="grup" required/>
                </label>
            ',
            'dir-pers' => '
                <label>
                    <p>Directorio personal</p>
                    <input type="text" name="dir-pers" required/>
                </label>
            ',
            'sh' => '
                <label>
                    <p>Shell</p>
                    <input type="text" name="sh" value="/bin/bash" required/>
                </label>
            ',
            'cn' => '
                <label>
                    <p>CN</p>
                    <input type="text" name="cn" required/>
                </label>
            ',
            'sn' => '
                <label>
                    <p>SN</p>
                    <input type="text" name="sn" required/>
                </label>
            ',
            'nombre' => '
                <label>
                    <p>Nombre</p>
                    <input type="text" name="nombre" required/>
                </label>
            ',
            'movil' => '
                <label>
                    <p>Móvil</p>
                    <input type="tel" name="movil" required/>
                </label>
            ',
            'direccion' => '
                <label>
                    <p>Dirección</p>
                    <input type="text" name="direccion" required/>
                </label>
            ',
            'telefono' => '
                <label>
                    <p>Teléfono</p>
                    <input type="tel" name="telefono" required/>
                </label>
            ',
            'titulo' => '
                <label>
                    <p>Título</p>
                    <input type="text" name="titulo" required/>
                </label>
            ',
            'descripcion' => '
                <label>
                    <p>Descripción</p>
                    <textarea cols="32" rows="24" name="descripcion">Descripción</textarea>
                </label>
            '
        ];
        
        $form .= '
            <p>¿Qué atributo deseas modificar?</p>
            <form action="/prjm08uf23/" method="GET">
                <input type="hidden" name="page" value="'.$_GET['page'].'"/>
                <input type="hidden" name="usr" value="'.$_GET['usr'].'"/>
                <input type="hidden" name="ou" value="'.$_GET['ou'].'"/>
                <label>
                   <input type="radio" name="opt" value="num-id"/> UID Number
                </label>
                <label>
                   <input type="radio" name="opt" value="grup"/> GID Number
                </label>
                <label>
                   <input type="radio" name="opt" value="dir-pers"/> Directorio personal
                </label>
                <label>
                   <input type="radio" name="opt" value="sh"/> Shell
                </label>
                <label>
                   <input type="radio" name="opt" value="cn"/> CN
                </label>
                <label>
                   <input type="radio" name="opt" value="sn"/> SN
                </label>
                <label>
                   <input type="radio" name="opt" value="nombre"/> Nombre
                </label>
                <label>
                   <input type="radio" name="opt" value="movil"/> Móvil
                </label>
                <label>
                   <input type="radio" name="opt" value="direccion"/> Dirección
                </label>
                <label>
                   <input type="radio" name="opt" value="telefono"/> Teléfono
                </label>
                <label>
                   <input type="radio" name="opt" value="titulo"/> Título
                </label>
                <label>
                   <input type="radio" name="opt" value="descripcion"/> Descripción
                </label>
                <input type="submit" value="Modificar"/>
                <input type="reset" value="Restablecer"/>
            </form>
        ';
        
        if(isset($_GET['opt'])){
            $form .= '
                <hr>
                <form action="./controller/modifyData.php" method="POST">
                    <input type="hidden" name="uid" value="'.$_GET['usr'].'"/>
                    <input type="hidden" name="unorg" value="'.$_GET['ou'].'"/>
                    '.$formData[$_GET['opt']].'
                    <input type="submit" value="Guardar"/>
                    <input type="reset" value="Restablecer"/>
                </form>
            ';
        }
        
        $html = '
            <main>
                <h1>Modificar usuario</h1>
                <hr>
                <p><a href="/prjm08uf23/?page=dashboard">Volver</a></p>
                <hr>
                '.$form.'
                <style>
                    label{
                        display: block;
                        padding: 8px 0px 8px 0px;
                        border-bottom: 1px solid lightgrey;
                    }
                </style>
            </main>
        ';
    }
?>