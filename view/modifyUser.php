<?php
    if(!$sessionStatus) header('location: /prjm08uf23/?page=inicio');
    $title = 'Modificar usuario';
    $html = '
        <main>
            <h1>Modificar usuario</h1>
            <hr>
            <p><a href="/prjm08uf23/?page=dashboard">Volver</a></p>
            <hr>
            <form action="./controller/addData.php" method="POST">
                <label>
                    <p>UID</p>
                    <input type="text" name="uid" required/>
                </label>
                <label>
                    <p>Unidad organizativa</p>
                    <input type="text" name="unorg" required/>
                </label>
                <label>
                    <p>Número ID</p>
                    <input type="number" min="0" name="num-id" required/>
                </label>
                <label>
                    <p>Grupo</p>
                    <input type="number" min="0" name="grup" required/>
                </label>
                <label>
                    <p>Directorio personal</p>
                    <input type="text" name="dir-pers" required/>
                </label>
                <label>
                    <p>Shell</p>
                    <input type="text" name="sh" value="/bin/bash" required/>
                </label>
                <label>
                    <p>CN</p>
                    <input type="text" name="cn" required/>
                </label>
                <label>
                    <p>SN</p>
                    <input type="text" name="sn" required/>
                </label>
                <label>
                    <p>Nombre</p>
                    <input type="text" name="nombre" required/>
                </label>
                <label>
                    <p>Móvil</p>
                    <input type="tel" name="movil" required/>
                </label>
                <label>
                    <p>Dirección</p>
                    <input type="text" name="direccion" required/>
                </label>
                <label>
                    <p>Teléfono</p>
                    <input type="tel" name="telefono" required/>
                </label>
                <label>
                    <p>Título</p>
                    <input type="text" name="titulo" required/>
                </label>
                <label>
                    <p>Descripción</p>
                    <textarea cols="32" rows="24" name="descripcion">Descripción</textarea>
                </label>
                <input type="submit" value="Crear"/>
                <input type="reset" value="Restablecer"/>
            </form>
            <style>
                label{
                    display: block;
                    margin-bottom: 16px;
                    border-bottom: 1px solid lightgrey;
                }
            </style>
        </main>
    ';
?>