<?php 
//echo '<pre>';
//print_r($summary);
//echo '</pre>';
?>
<legend>
	SUMMARY O/E
</legend>
<select id="mySelect">
	<option value="2" <?php echo ($f==2) ? 'selected' : '' ;?>>2</option>
	<option value="3" <?php echo ($f==3) ? 'selected' : '' ;?>>3</option>
	<option value="4" <?php echo ($f==4) ? 'selected' : '' ;?>>4</option>
</select></br>
<script>
	$('#mySelect').change(function(){ 
    
    window.location = "<?php echo base_url().'index.php/administrator/summary/'.$this->uri->segment(3).'?f=' ?>"+$(this).val();
});
</script>
<a href="<?php echo base_url('index.php/administrator/summary/'.($this->uri->segment(3)-1));?>">Prev</a> / <a href="<?php echo base_url('index.php/administrator/summary/'.($this->uri->segment(3)+1));?>">Next</a>
(<?php echo $tanggal[0].' - '.$tanggal[6] ?>)</br></br>

<div class="row-fluid">
	 
	<?php foreach ($summary as $key => $s) { ?>
		
            <div class="accordion-heading"><a class="accordion-toggle" href="#collapse<?php echo $key+1?>" data-toggle="collapse" data-parent="#accordion<?php echo $key+1?>"><?php echo $s['negara']?></a></div>
            <div class="accordion-body collapse" id="collapse<?php echo $key+1?>">
         
                    <table class="table table-bordered">
                       <thead>
			             <tr >
			                 
			                 <?php foreach ($tanggal as $key => $t) { ?>
			                    <td><center><b><?php 
			                    	if(($key == 3) && $this->uri->segment(3)==0)
			                    		echo 'today';
			                    	else
			                    		echo date('d/m',  strtotime($t)) 
			                    
			                    ?></b></center></td>
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
                            	
                                
                                
                                <?php for ($j=0; $j < 7; $j++) { ?>
                                	<td class=""><center><?php echo (!empty($s['row'][$j][$i]['team'])) ? $s['row'][$j][$i]['team'].'('.$s['row'][$j][$i]['sum'].')'  : '' ; ?></center></td>    
                                <?php } ?>
                                
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
             
 
        </div>
	<?php }?>
   
    
</div>