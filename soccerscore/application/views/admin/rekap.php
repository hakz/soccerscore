<?php
//echo '<pre>';
//echo print_r($teams);
//echo '</pre>';
?>
<div class="tabbable">
   
    <form method="POST" action="<?php echo base_url('index.php/administrator/pilihrekap'); ?>">
		<select name="negara" id="select_id">
		
		<?php foreach ($list_negara as $key => $neg) { ?>
			<option class="sel" <?php echo ($neg['id_negara']==$this->uri->segment(3)) ? 'selected' : '' ; ?>  value="<?php echo $neg['id_negara'] ?>"><?php echo $neg['negara'] ?></option>
		<?php } ?>
		</select>

	<button class="btn btn-primary" type="submit">Tampilkan</button>
		
	</form>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th><a href="<?php echo base_url('index.php/administrator/rekap/'.$this->uri->segment(3).'?order=team');?>">Team</a></th>
            </tr>
        </thead>
        <tbody>
            <!-- start -->
            <?php foreach ($teams as $key => $team) { ?>
                <tr>
                <td rowspan="2"><?php echo ++$key?></td>
                <td rowspan="2"><?php echo $team['team']?></td>
                <?php foreach ($team['rekap'] as $key => $rekap) { ?>
                	<td><?php 
                	$source = $rekap['date'];
					$date = new DateTime($source);
                	echo $date->format('d/m'); 
                	?></td>
                <?php } ?>
            </tr>
            <tr>
                <?php foreach ($team['rekap'] as $key => $rekap) { ?>
                	<td><?php
                	if ($rekap['extratime']==0) {
                		echo $rekap['result'] ; 	
					} else {
						echo '<a href="'.base_url('index.php/administrator/extratimelist').'">';
						echo $rekap['result'] ; 
						echo '</a>';
					}
					
                	
                	?></td>
                <?php } ?>
            </tr>
            <?php }?>
            
        </tbody>
    </table>
</div>
<?php echo $halaman; ?>