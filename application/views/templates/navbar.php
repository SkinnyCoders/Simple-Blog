<nav class="navbar fixed-top navbar-expand-lg navbar-dark nav-custom">
  <div class="container">
    <a class="navbar-brand judul-blog" href="<?php echo base_url() ?>">Tanto Blogs</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link text-default active" href="<?= base_url(); ?>">Home</a>
        <a class="nav-item nav-link text-default" href="<?= base_url(); ?>data">View data</a>
        <a class="nav-item nav-link text-default" href="<?= base_url(); ?>manag">Management Data</a>
         
      </div>
    </div>
    <form class="form-inline navbar-right">
          <input class="form-control mr-sm-1 text-default" type="search" placeholder="Something else!" aria-label="Search">
        </form>
  </div>
</nav>