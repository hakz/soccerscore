<?php 
//echo '<pre>';
//print_r($summary);
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
                                <td><b>Date 1(today)</b></td>
                                <td><b>Date 2(tomorrow)</b></td>
                                <td><b>Date 3(lusa)</b></td>
                                <td><b>Date 4</b></td>
                                <td><b>Date 5</b></td>
                                 <td><b>Date 6</b></td>
                                  <td><b>Date 7</b></td>
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

                                <td><?php echo (!empty($s['row'][0][$i]['team'])) ? $s['row'][0][$i]['team'].'</br>'.$s['row'][0][$i]['time'] : '' ; ?></td>
                                <td><?php echo (!empty($s['row'][1][$i]['team'])) ? $s['row'][1][$i]['team'].'</br>'.$s['row'][1][$i]['time'] : '' ; ?></td>
                                <td><?php echo (!empty($s['row'][2][$i]['team'])) ? $s['row'][2][$i]['team'].'</br>'.$s['row'][2][$i]['time'] : '' ; ?></td>
                                <td><?php echo (!empty($s['row'][3][$i]['team'])) ? $s['row'][3][$i]['team'].'</br>'.$s['row'][3][$i]['time'] : '' ; ?></td>
                                <td><?php echo (!empty($s['row'][4][$i]['team'])) ? $s['row'][4][$i]['team'].'</br>'.$s['row'][4][$i]['time'] : '' ; ?></td>
                                <td><?php echo (!empty($s['row'][5][$i]['team'])) ? $s['row'][5][$i]['team'].'</br>'.$s['row'][5][$i]['time'] : '' ; ?></td>
                                <td><?php echo (!empty($s['row'][6][$i]['team'])) ? $s['row'][6][$i]['team'].'</br>'.$s['row'][6][$i]['time'] : '' ; ?></td>
                                
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