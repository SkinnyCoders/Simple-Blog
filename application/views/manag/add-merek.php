<section>
	<div class="container">
		<?php
		if ($this->session->flashdata('notif')) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Data <strong><?= $this->session->flashdata('notif')?></strong>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   <span aria-hidden="true">&times;</span>
			 </button>
		</div>
		<?php
		} elseif ($this->session->flashdata('notif_success')) { ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Data <strong><?= $this->session->flashdata('notif_success')?></strong>
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   <span aria-hidden="true">&times;</span>
			 </button>
		</div>
		<?php
		}
		?>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="POST">
				  <div class="form-group">
				    <label for="formGroupExampleInput">Merek Mobil</label>
				    <input type="text" name="merek" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Merek">
				    <small class="text-danger"><?=form_error('merek')?></small>
				  </div>
				  <button type="submit">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>