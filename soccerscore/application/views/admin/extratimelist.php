<!--<pre>
    <?php print_r($extratime); ?>
</pre>-->
<legend>
		EXTRA TIME LIST
</legend>
	
<ul class="nav nav-tabs">
  <li class="active">
   <a href="<?php echo base_url('index.php/administrator/extratimelist')?>">EXTRATIME</a>
  </li>
  <li><a href="<?php echo base_url('index.php/administrator/extratimeedited')?>">EDITED</a></li>
</ul>
<div class="tabbable">

    <div class="tab-content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="" class="span1">No</th>
                    <th style="" class="span2">Tanggal</th>
                    <th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/extratimelist?order=negara'); ?>">Negara</a></th>
                    <th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/extratimelist?order=team'); ?>">Team</a></th>
                    <th style="" class="span1">REKAP O/E</th>
                    <th style="" class="span1">REKAP O/U</th>
                    <th style="" class="span1">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extratime as $key => $extra) { ?>
                    <tr>
                        <td style="text-align: center"><?php echo++$key ?></td>
                        <td><?php echo $extra['date'] ?></td>
                        <td><?php echo $extra['negara'] ?></td>
                        <td><?php echo $extra['team'] ?></td>
                        <?php echo form_open('administrator/edit_dom', ''); ?>
                        <!--<td><input class="span8" type="text" name="result1" value="<?php echo $extra['result'] ?>"/></td>
                        <td><input class="span8" type="text" name="result2" value="<?php echo $extra['result2'] ?>"/></td>-->
						<td>
							<select name="result1" class="span12">
								<option <?php echo ($extra['result']=='O') ? 'selected' :'' ; ?> value="O">O</option>
								<option <?php echo ($extra['result']=='E') ? 'selected' :'' ; ?> value="E">E</option>
							</select>
						</td>
						<td>
							<select name="result2" class="span12">
								<option <?php echo ($extra['result2']=='O') ? 'selected' :'' ; ?> value="O">O</option>
								<option <?php echo ($extra['result2']=='U') ? 'selected' :'' ; ?> value="U">U</option>
							</select>
						</td>
						<input type="hidden" name="id_dom" value="<?php echo $extra['id_dom'] ?>" id="id_dom"/>
                   		<td><button class="btn" type="submit" ><i class="icon-pencil"></i></button>	</td>
                    	<?php echo form_close(); ?>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
</div>