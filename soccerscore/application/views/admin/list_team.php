<?php
//echo '<pre>';
//print_r($list_team);
//echo '</pre>';
?>
<div class="tabbable">
	
	<div class="tab-content">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="" class="span1">No</th>
					<th style="" class="span2">Negara</th>
					<th style="" class="span2">Team</th>
					<th style="" class="span5">Link</th>
					<th style="" class="span1">Synccronize</th>
					<th style="" class="span1">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_team as $team) { ?>
					
				<tr>
					<td style="text-align: center">1</td>
					<td><?php echo $team['negara']?></td>
					<td><?php echo $team['team']?></td>
					<td><a href="<?php echo $team['link']?>"><?php echo $team['link']?></a></td>
					<td style="text-align: center"><?php echo anchor('news/local/123', '<i class="icon-pencil"></i>', 'title="Edit Item"'); ?></td>
					<td style="text-align: center"><?php echo anchor('administrator/delete_team/'.$team['id_team'], '<i class="icon-remove"></i>', 'title="Hapus Item"'); ?></td>
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