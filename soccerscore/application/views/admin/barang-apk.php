<div class="tabbable">
	<ul class="nav nav-tabs">
		<li>
			<a href="<?php echo base_url().'administrator/barang/movie'?>" data-toggle="tab">Movie</a>
		</li>
		<li>
			<a href="<?php echo base_url().'administrator/barang/game'?>" data-toggle="tab">Game</a>
		</li>
		<li>
			<a href="<?php echo base_url().'administrator/barang/software'?>" data-toggle="tab">Softwere</a>
		</li>
		<li class="active">
			<a href="<?php echo base_url().'administrator/barang/apk'?>" data-toggle="tab">APK</a>
		</li>
	</ul>
	<div class="title"><strong>MOVIE</strong><?php echo anchor('news/local/123', '<i class="icon-plus" style="float: right;"></i>', 'title="Tambah Item"')?></div>
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
				<?php for($i=0;$i<10;$i++){ ?>
				<tr>
					<td style="text-align: center">1</td>
					<td>Mark</td>
					<td>Otto</td>
					<td style="text-align: center">Thue, 2 Mar 2013</td>
					<td style="text-align: center"><?php echo anchor('news/local/123', '<i class="icon-pencil"></i>', 'title="Edit Item"'); ?>  <?php echo anchor('news/local/123', '<i class="icon-remove"></i>', 'title="Hapus Item"'); ?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="pagination pagination-centered">
		<ul>
			<li class="disabled">
				<a href="#">«</a>
			</li>
			<li class="active">
				<a href="#">1</a>
			</li>
			<li>
				<a href="#">2</a>
			</li>
			<li>
				<a href="#">3</a>
			</li>
			<li>
				<a href="#">4</a>
			</li>
			<li>
				<a href="#">5</a>
			</li>
			<li>
				<a href="#">»</a>
			</li>
		</ul>
	</div>
</div>