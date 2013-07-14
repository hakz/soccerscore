<?php
//echo '<pre>';
//echo print_r($teams);
//echo '</pre>';
?>
<div class="tabbable">
    <div class="container">
        <ul class="nav nav-tabs">
        	<?php foreach ($listnegara as $negara) { ?>
                
            <li class="">
                
                <a href="<?php echo base_url() . 'index.php/administrator/rekap/'.$negara['id_negara'] ?>" data-toggle="tab"><?php echo $negara['negara']?></a>
            </li>
            <?php } ?>
 
        </ul>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Team</th>
                
            </tr>
        </thead>
        <tbody>
            <!-- start -->
            <?php foreach ($teams as $key => $team) { ?>
                <tr>
                <td rowspan="2"><?php echo ++$key?></td>
                <td rowspan="2"><?php echo $team['team']?></td>
                <?php foreach ($team['rekap'] as $key => $rekap) { ?>
                	<td><?php echo $rekap['date'] ?></td>
                <?php } ?>
            </tr>
            <tr>
                <?php foreach ($team['rekap'] as $key => $rekap) { ?>
                	<td><?php echo (($rekap['score1']+$rekap['score2'])%2==0) ? 'O' : 'E' ; ?></td>
                <?php } ?>
            </tr>
            <?php }?>
            
        </tbody>
    </table>
</div>