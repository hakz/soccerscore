<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active">
			<a href="<?php echo base_url().'administrator/barang/movie'?>" data-toggle="tab">Movie</a>
		</li>
		<li>
			<a href="<?php echo base_url().'administrator/barang/game'?>" data-toggle="tab">Game</a>
		</li>
		<li>
			<a href="<?php echo base_url().'administrator/barang/software'?>" data-toggle="tab">Softwere</a>
		</li>
		<li>
			<a href="<?php echo base_url().'administrator/barang/apk'?>" data-toggle="tab">APK</a>
		</li>
	</ul>
	<div class="title"><strong>MOVIE</strong><?php echo anchor(base_url().'administrator/tambah/movie', '<i class="icon-plus" style="float: right;"></i>', 'title="Tambah Item"')?></div>
	</br>
	<div class="tab-content">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width:30px; text-align: center;">No</th>
					<th style="width:450px; text-align: center;">Title</th>
					<th>Content</th>
					<th style="width:150px; text-align: center;">Date Post</th>
					<th style="width:40px; text-align: center;"></th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0 ;foreach($ctrl['list_barang'] as $barang){ ?>
				<tr>
					<td style="text-align: center"><?php echo ++$i;?></td>
					<td><?php echo $barang['nama_barang'] ?></td>
					<td><?php echo $barang['summary'] ?></td>
					<td style="text-align: center"><?php echo $barang['datetime_post'] ?></td>
					<td style="text-align: center">
						<?php echo anchor(base_url().'administrator/edit/'.$barang['id_tipe_barang'].'/'.$barang['id_barang'], '<i class="icon-pencil"></i>', 'title="Edit Item"'); ?>  
						<?php echo anchor(base_url().'administrator/hapus/'.$barang['id_tipe_barang'].'/'.$barang['id_barang'], '<i class="icon-remove"></i>', 'title="Hapus Item"'); ?>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="pagination pagination-centered">
	<div class="halaman"><?php echo $this -> pagination -> create_links();?></div>

</div>