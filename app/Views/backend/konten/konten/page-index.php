<div class="card">
	<div class="card-header">
		<a class="" href="<?= backend_url();?>/konten/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Konten</th>
						<th>Kategori</th>
						<th>Sub Konten</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1;foreach ($data as $row): ?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=$row['konten_nama'];?></td>
						<td><?=$row['kategori'];?></td>
						<td><?=$row['konten_sub'];?></td>
						<td>
							<div class="btn-group" role="group" aria-label="Aksi group">
								<?=btn_edit('./konten/edit?id='.$row['konten_id']);?>
								<?=btn_delete('./konten/delete?id='.$row['konten_id']);?>
							</div>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
