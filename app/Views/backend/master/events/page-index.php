<div class="card">
	<div class="card-header">
		<a class="" href="<?= backend_url();?>/event/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Kategori</th>
						<th>Kuota</th>
                        <th>Harga</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1;foreach ($data as $row): ?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=$row['event_nama'];?></td>
						<td><?=$row['kategori'];?></td>
						<td><?=$row['event_kuota'];?></td>
                        <td>Rp. <?=rp($row['event_harga']);?>,-</td>
						<td><?=tanggal_dMY($row['event_mulai']);?></td>
                        <td><?=tanggal_dMY($row['event_selesai']);?></td>
						<td>
							<div class="btn-group" role="group" aria-label="Aksi group">
								<?=btn_edit('./event/edit?id='.$row['event_id']);?>
								<?=btn_delete('./event/delete?id='.$row['event_id']);?>
							</div>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
