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
					<th style="" class="span1">Syncronize</th>
					<th style="" class="span1">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_team as $key=>$team) { ?>
					
				<tr>
					<td style="text-align: center"><?php echo ++$key ?></td>
					<td><?php echo $team['negara']?></td>
					<td><?php echo $team['team']?></td>
					<td><a href="<?php echo $team['link']?>"><?php echo $team['link']?></a></td>
					<td style="text-align: center"><?php echo anchor('administrator/dograb?link='.$team['link'].'&id_team='.$team['id_team'], '<i class="icon-pencil"></i>', 'title="Edit Item"'); ?></td>
					<td style="text-align: center"><a href="<?php echo site_url('administrator/delete_team/' . $team['id_team']); ?>" onclick="return confirm('Anda yakin ?');"><i class="icon-remove"></i></td>
               </tr>

				<?php } ?>
				<tr>
					<td colspan="4"></td>
					<td><?php echo anchor('administrator/dograb?link='.$team['link'].'&id_team='.$team['id_team'], 'Syncronize All !!', 'title="Syncronize All"'); ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>