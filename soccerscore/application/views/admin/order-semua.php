<div class="tabbable">
	<div class="title"><strong>LIST SEMUA ORDER</strong><?php echo anchor('news/local/123', '<i class="icon-plus" style="float: right;"></i>', 'title="Tambah Item"')?></div>
	</br>
	
	<ul class="nav nav-tabs">
		<li>
			<a href="<?php echo base_url().'administrator/order/waiting'?>" data-toggle="tab">Waiting</a>
		</li>
		<li>
			<a href="<?php echo base_url().'administrator/order/sending'?>" data-toggle="tab">Sending</a>
		</li>
		<li>
			<a href="<?php echo base_url().'administrator/order/success'?>" data-toggle="tab">Success</a>
		</li>
		<li class="active">
			<a href="<?php echo base_url().'administrator/order/semua'?>" data-toggle="tab">Semua</a>
		</li>
	</ul>
	
	<div class="tab-content">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width:30px; text-align: center;">No</th>
					<th style="width:450px; text-align: center;">Nama</th>
					<th>No Hp</th>
					<th style="width:150px; text-align: center;">Date Order</th>
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
					<td style="text-align: center"><button class="btn btn-danger" type="button">Waiting</button></td>
				</tr>
				<?php } ?>
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