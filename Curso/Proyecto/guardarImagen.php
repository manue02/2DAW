<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
    <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    //connect to MySQL 
    require_once("conexion.php");

    //en esta ruta especificamos el directorio para las imágenes
    $dir = "img";
    //asegurarse que la transferencia del archivo cargado se ha efectuado correctamente
    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        die('El archivo cargado no es una imagen válida');
    }
    //comprobar que el archivo cargado no excede el tamaño máximo permitido
    if ($_FILES['uploadfile']['size'] > 1000000) {
        die('El archivo cargado excede el tamaño máximo permitido');
    }
    //comprobar que el archivo cargado es del tipo de imagen admitido
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES['uploadfile']['tmp_name']);
    finfo_close($finfo);
    if ($mimetype != 'image/gif' && $mimetype != 'image/jpeg' && $mimetype != 'image/png') {
        die('El archivo cargado no es una imagen válida');
    }
    //comprobar que el archivo cargado no ha sido modificado durante la transferencia
    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        die('El archivo cargado no es una imagen válida');
    }
    //comprobar que el archivo cargado no ha sido modificado durante la transferencia
    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        die('El archivo cargado no es una imagen válida');
    }
    //comprobar que el archivo cargado no ha sido modificado durante la transferencia
    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        die('El archivo cargado no es una imagen válida');
    }
    //comprobar que el archivo cargado no ha sido modificado durante la transferencia
    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        die('El archivo cargado no es una imagen válida');
    }
    //comprobar que el archivo cargado no ha sido modificado durante la transferencia
    if (!is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        die('El archivo cargado no es una imagen válida');
    }


    //obtener información de la imagen que se acaba de cargar
    $image_caption = $_POST['caption'];
    $image_username = $_POST['username'];
    $image_date = @date('Y-m-d');
    $image_id = $_POST['comboDni'];

    list($width, $height, $type, $attr) =
        getimagesize($_FILES['uploadfile']['tmp_name']);

    // asegurarse de que el archivo cargado es un tipo de imagen admitido
    switch ($type) {
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($_FILES['uploadfile']['tmp_name']);
            break;
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']);
            break;
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($_FILES['uploadfile']['tmp_name']);
            break;
        default:
            die('El archivo cargado no es una imagen válida');
    }
    //insertar información en la tabla  image 
    
    $query = "INSERT INTO image (image_id, image_caption, image_username, image_date, image_height, image_width, image_name) VALUES ('$image_id', '$image_caption', '$image_username', '$image_date', '$height', '$width', '$imagename')";

    //echo  $query;
    
    $result = mysqli_query($db, $query) or die(mysqli_error($db));




    // Guardar la imagen en su destino final
    $dest = $dir . '/' . $imagename;
    imagejpeg($image, $dest, 100) or die('No se puede guardar la imagen');
    imagedestroy($image);
    ?>



    <p>Esta es la foto que has subido al servidor:</p>
    <img src="<?php echo $dir . '/' . $imagename; ?>" style="float:left;">
    <table>
        <tr>
            <td>Imagen Salvada como: </td>
            <td>
                <?php echo $image_id . $ext; ?>
            </td>
        </tr>
        <tr>
            <td>Height: </td>
            <td>
                <?php echo $height; ?>
            </td>
        </tr>
        <tr>
            <td>Width: </td>
            <td>
                <?php echo $width; ?>
            </td>
        </tr>
        <tr>
            <td>Upload Date: </td>
            <td>
                <?php echo $image_date; ?>
            </td>
        </tr>
    </table>

</body>

</html>