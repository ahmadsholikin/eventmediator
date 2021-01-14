<div class="card">
	<div class="card-header">
		<a class="" href="<?= backend_url();?>/kategori-konten/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Kategori</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1;foreach ($data as $row): ?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=$row['kategori_nama'];?></td>
						<td>
							<div class="btn-group" role="group" aria-label="Aksi group">
								<?=btn_edit('./kategori-konten/edit?id='.$row['kategori_id']);?>
								<?=btn_delete('./kategori-konten/delete?id='.$row['kategori_id']);?>
							</div>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
