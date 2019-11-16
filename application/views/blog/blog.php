  <!-- Page Content -->
  <div class="container mt-2">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- if category selected-->
        <!-- <h1 class="my-4">Category Name
          <small>Secondary Text</small>
        </h1> -->

        <?php 
        foreach ($blog as $b) : 
            $tgl = DateTime::createFromFormat('Y-m-d', $b['tanggal'])->format('d F Y');
            ?>
         <!-- Blog Post -->
        <div class="card mb-4 shadow rounded">
          <img class="card-img-left img-caption" src="<?=base_url()?>assets/img/paramore.jpg" alt="Card image cap">
          <div class="card-body">
            <a href="<?php echo base_url() ?>blog/detail/<?php echo $b['path'] ?>"><h2 class="card-title text-judul"><?php echo $b['judul']?></h2></a>
            <p class="card-text text-default"><small class="text-muted mb-3">Posted by <i>Rizki</i> on <i><?php echo $tgl?></i> |</small> <a href=""><small class="card-text" >Category</small></a></p>
            
            <p class="card-text text-content"><?= word_limiter($b['deskripsi'], 30); ?></p>
            <!-- <a href="<?php echo base_url() ?>blog/detail/<?php echo $b['path'] ?>" class="btn btn-primary">Read More &rarr;</a> -->
          </div>
        </div>   
        <?php
        endforeach;
         ?>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

    <?php include_once 'side_bar_left.php'; ?>      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container