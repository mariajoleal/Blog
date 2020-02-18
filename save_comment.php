<?php
include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $text = $_POST['texto'];
  
  $query = "INSERT INTO comentario(texto, id_art) VALUES ('$text', '$id')";
  $result = mysqli_query($conn, $query);

  header("Location: view_article.php?id=$id");
  
}

?>