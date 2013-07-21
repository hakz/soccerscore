<?php 
//echo '<pre>';
//print_r($tanggal);
//echo '</pre>';

?>

<div class="row-fluid">
	<?php foreach ($summary as $key => $s) { ?>
		 <div class="accordion" id="accordion<?php echo $key+1?>">
        <div class="accordion-group">
            <div class="accordion-heading"><a class="accordion-toggle" href="#collapse<?php echo $key+1?>" data-toggle="collapse" data-parent="#accordion<?php echo $key+1?>"><?php echo $s['negara']?></a></div>
            <div class="accordion-body collapse" id="collapse<?php echo $key+1?>">
                <div class="accordion-inner">
                    <table class="table">
                        <thead>
                            <tr>
                                <td><b>No</b></td>
                                <?php foreach ($tanggal as $key => $t) { ?>
                                <td><b><?php echo date('d/m',  strtotime($t)) ?></b></td>
                                <?php } ?>
                               
                            </tr>
                        </thead>
             
                        <?php 
                        
						$perulangan=0;
						foreach($s['row'] as $d)
						{
							$lg=sizeof($d);
							if($perulangan<$lg)$perulangan=$lg;
						}
						
                        ?>
                        
                        <tbody>
                        	<?php for ($i=0; $i < $perulangan; $i++) { ?>
                            <tr>
                            	
                                <td><?php echo $i+1?></td>
                                
                                <?php for ($j=0; $j < 7; $j++) { ?>
                                	<td><?php echo (!empty($s['row'][$j][$i]['team'])) ? $s['row'][$j][$i]['team'].'</br>'.substr($s['row'][$j][$i]['time'], 0, 5)  : '' ; ?></td>    
                                <?php } ?>
                                
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	<?php }?>
   
    </div>
</div>