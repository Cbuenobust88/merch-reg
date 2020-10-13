<?php

    include("conn_db.php");

    if ($conex) {
        echo "conexi correcta";
    }

    if (isset($_POST['compra'])) {
        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['tipo']) >= 1 && strlen($_POST['cantidad']) >= 1 && strlen($_POST['producto']) >= 1)  {
            $producto = trim($_POST['producto']);
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $cantidad = trim($_POST['cantidad']);
            $tipo= mysqli_real_escape_string($conex, $_POST['tipo']);
            $fechareg = date("d/m/y");
            $consulta = "INSERT INTO datos(producto, nombre, email, cantidad, tipo, fecha_reg) VALUES ('$producto','$nombre','$email','$cantidad','$tipo','$fechareg')";
            $resultado = mysqli_query($conex,$consulta);
            if ($resultado) {
                ?>
                <h3 class="ok"> tu solicitud para comprar fue enviada</h3>
                <?php
            } else {
                ?>
                <h3 class="bad"> inténtalo de nuevo </3>
                <?php
            } 
        }  else{
            ?>
            <h3 class="bad"> completa todos los datos </3>
            <?php
        }

    }

?>