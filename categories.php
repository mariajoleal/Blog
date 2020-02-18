<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Articulos</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $query = "SELECT * FROM categoria";
            $result = mysqli_query($conn, $query);

            while($category = mysqli_fetch_array($result)) { 
              $id = $category['id'];
              ?>
              <tr>
                <td><?php echo $category['nombre'] ?></td>
                <?php
                   $query = "SELECT a.nombre
                    FROM articulo a
                    JOIN articulo_categoria ac ON a.id = ac.id_art
                    JOIN categoria c ON c.id = ac.id_cat
                    WHERE c.id = $id";
                    $result2 = mysqli_query($conn, $query);
                ?>
                <td>
                  <ul>
                    <?php  
                      while($article = mysqli_fetch_array($result2)) {?>
                        <li><?php echo $article['nombre']?></li>
                      <?php } ?>
                  </ul>
                </td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
