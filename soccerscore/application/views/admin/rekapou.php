<?php
//echo '<pre>';
//echo print_r($teams);
//echo '</pre>';
?>
<legend>
	REKAP O/U
</legend>
<div class="tabbable">
    <form method="POST" action="<?php echo base_url('index.php/administrator/pilihrekapou'); ?>">
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
                <th><a href="<?php echo base_url('index.php/administrator/rekapou/'.$this->uri->segment(3).'?order=team');?>">Team</a></th>
                
            </tr>
        </thead>
        <tbody>
            <!-- start -->
            <?php foreach ($teams as $key => $team) { ?>
                <tr>
                <td rowspan="2"><?php echo ++$key?></td>
                <td rowspan="2"><?php echo $team['team']?></td>
                <?php foreach ($team['rekap'] as $key => $rekap) { ?>
                	<td><center><?php 
                	$source = $rekap['date'];
					$date = new DateTime($source);
                	echo $date->format('d/m'); 
                	?></center></td>
                <?php } ?>
            </tr>
            <tr>
                <?php foreach ($team['rekap'] as $key => $rekap) { ?>
                	<td><center><?php
                	if ($rekap['extratime']==0) {
                		echo (($rekap['score1']+$rekap['score2'])<2.5) ? 'U' : 'O' ; 	
					} else {
						echo '<a href="'.base_url('index.php/administrator/extratimelist').'">';
						echo (($rekap['score1']+$rekap['score2'])<2.5) ? 'U' : 'O' ; 
						echo '</a>';
					}
					
                	
                	?></center></td>
                <?php } ?>
            </tr>
            <?php }?>
            
        </tbody>
    </table>
</div>
<?php echo $halaman; ?>