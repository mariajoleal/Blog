<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-body">
        <form action="save_comment.php?id=<?php echo  $_GET['id'];?>" method="POST">
          <div class="form-group">
            <input type="text" name="texto" class="form-control"
            placeholder="Comentario" autofocus>
          </div>
          <button class="btn btn-success" name="add"> Comentar </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>