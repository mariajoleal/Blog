<?php 
  include("db.php");

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT comentario.texto, articulo.nombre, articulo.autor
              FROM comentario
              INNER JOIN articulo
              ON comentario.id_art = articulo.id
              WHERE articulo.id = $id";
    $result = mysqli_query($conn, $query);
    $comentarios = array();
  
    while($row = mysqli_fetch_array($result)) {
      $name = $row['nombre'];
      $author = $row['autor'];
      $comentario = $row['texto'];
      array_push($comentarios, $comentario); 
    }    

    if(count($comentarios) == 0) {
      $query = "SELECT * FROM articulo WHERE id = $id";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['nombre'];
        $author = $row['autor'];
      }
    }
  }


?>

<?php include("includes/header.php") ?>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $name?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $author?></h6>
          <?php
            if(count($comentarios) > 0){ ?>
              <p class="card-text">Comentarios:</p>
              <?php 
                for($i = 0; $i < count($comentarios); $i++) { ?>
                  <div class="card-text"><?php echo $comentarios[$i]?></div>
                <?php } 
            } else { ?>
              <div class="card-text">Este articulo no tiene comentarios</div>
            <?php } ?>
          <a href="index.php" class="card-link" style="color:#80bdff;">Volver</a>
        </div>
      </div>
      </div>
    </div>
  </div>

<?php include("includes/footer.php") ?>
