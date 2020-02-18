<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset();} ?>
      <div class="card card-body">
        <form action="save_article.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control"
            placeholder="Nombre del articulo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="autor" class="form-control"
            placeholder="Nombre del autor">
          </div>
          <label for="sel2">Categoria(s):</label>
            <p class="font-weight-light">Presione shift para seleccionar más de uno</p>
            <select multiple class="form-control" id="sel2" name="categoria[]">
              <?php 
              $query = "SELECT * FROM categoria";
              $result = mysqli_query($conn, $query);

              while($row = mysqli_fetch_array($result)) { ?>
                <option value=<?php echo $row['id']?>><?php echo $row['nombre'] ?></option>
              <?php } ?>
            </select>
            <br>
          <input type="submit" class="btn btn-success btn-block" name="save_article" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Autor(es)</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $query = "SELECT * FROM articulo";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['autor'] ?></td>
                <td align="center">
                  <a style="color:#80bdff;" href="view_article.php?id=<?php echo $row['id']?>">Ver</a> <br/>
                  <a style="color:#80bdff;" href="add_comment.php?id=<?php echo $row['id']?>">Comentar</a> <br/>
                  <a style="color:#80bdff;" href="delete_article.php?id=<?php echo $row['id']?>">Eliminar</a>
                </td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>  