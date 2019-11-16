<section>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
				if ($this->session->flashdata('notif')) { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data <strong><?= $this->session->flashdata('notif') ?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php
			} elseif ($this->session->flashdata('notif_success')) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data <strong><?= $this->session->flashdata('notif_success') ?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php
			}
			?>
				<h3>Data Mobil</h3>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Merek</th>
							<th scope="col">Tahun</th>
							<th scope="col">Harga</th>
							<th colspan="2" scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						if ($cek_mobil > 0) : ?>
							<?php
							foreach ($mobil as $m) : ?>
								<tr>
									<th scope="row"><?= $i ?></th>
									<td><?= $m['nama'] ?></td>
									<td><?= $m['merek'] ?></td>
									<td><?= $m['tahun'] ?></td>
									<td>Rp. <?= number_format($m['harga'], 2, ',', '.')  ?></td>
									<td><a class="btn btn-sm btn-danger" href="<?= base_url() ?>manag/delete/<?= $m['id'] ?>" onclick="return confirm('Yakin Pengen Dihapus!')">Delete</a> </td>
									<td><a class="btn btn-sm btn-info" href="<?= base_url() ?>manag/update/<?= $m['id'] ?>">Update</a></td>
								</tr>
								<?php
								$i++;
							endforeach ?>
						<?php
					else : ?>
							<tr>
								<td colspan="6">
									<h2 class="text-center">Belum ada data</h2>
								</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>