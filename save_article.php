<?php
include("db.php");

if(isset($_POST['save_article'])){
  $name = $_POST['nombre'];
  $author = $_POST['autor'];
  if(isset($_POST['categoria'])) {
    $categories = $_POST['categoria'];
    if(empty($name) || empty($author)) {
      
      $_SESSION['message'] = 'Todos los campos deben estar llenos';
      $_SESSION['message_type'] = 'danger';

    } else {

      $query = "INSERT INTO articulo(nombre, autor) VALUES ('$name', '$author')";
      $result = mysqli_query($conn, $query);
      $id_art = mysqli_insert_id($conn);

      for($i = 0; $i < count($categories); $i++) {
        $query = "INSERT INTO articulo_categoria(id_art, id_cat) VALUES ('$id_art', '$categories[$i]')";
        $result = mysqli_query($conn, $query);
      }

      $_SESSION['message'] = 'Articulo guardado';
      $_SESSION['message_type'] = 'success';
      
    }
  } else {
    $_SESSION['message'] = 'Debe seleccionar al menos una categoria';
    $_SESSION['message_type'] = 'danger';

  }

  header("Location: index.php");

}

?>