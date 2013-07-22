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
					<th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/list_team?order=negara');?>">Negara</a></th>
					<th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/list_team?order=team');?>">Team</a></th>
					<th style="" class="span5">Link</th>
					<th style="" class="span1">Sync</th>
					<th style="" class="span1">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_team as $key=>$team) { ?>
					
				<tr>
					<td style="text-align: center"><?php echo ++$key ?></td>
					<td><?php echo $team['negara']?></td>
					<td><?php echo $team['team']?></td>
					<td><a href="<?php echo $team['link']?>"><?php echo $team['link']?></a></td>
					<td style="text-align: center"><?php echo anchor('administrator/dograb?link='.$team['link'].'&id_team='.$team['id_team'], '<i class="icon-refresh"></i>', 'title="Refresh"'); ?></td>
					<td style="text-align: center"><a href="<?php echo site_url('administrator/edit_team/' . $team['id_team']); ?>" title="Edit"><i class="icon-edit"></i></a> <a href="<?php echo site_url('administrator/delete_team/' . $team['id_team']); ?>" onclick="return confirm('Anda yakin ?');" title="Delete"><i class="icon-remove"></i></a></td>
               </tr>

				<?php } ?>
				<tr>
					<td colspan="4"></td>
					<td><?php echo anchor('administrator/syncronizrall', 'Syncronize All !!', 'title="Syncronize All" class="btn btn-small btn-success"'); ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>