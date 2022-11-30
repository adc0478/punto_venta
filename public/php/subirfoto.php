<?php
if (isset($_FILES['foto'])){
    $destino = '../img/' . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],$destino);
    echo "se cargo la siguiente imagen " . $destino;
    }else{
        echo "error carga";
    }
?>




