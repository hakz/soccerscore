<!--<pre>
    <?php print_r($extratime); ?>
</pre>-->
<div class="tabbable">

    <div class="tab-content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="" class="span1">No</th>
                    <th style="" class="span2">Tanggal</th>
                    <th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/extratimelist?order=negara'); ?>">Negara</a></th>
                    <th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/extratimelist?order=team'); ?>">Team</a></th>
                    <th style="" class="span1">score 1</th>
                    <th style="" class="span1">score 2</th>
                    <th style="" class="span1">Result 1</th>
                    <th style="" class="span1">Result 2</th>
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
                        <td><?php echo $extra['score1'] ?></td>
                        <td><?php echo $extra['score2'] ?></td>
                        <?php echo form_open('administrator/edit_dom', ''); ?>
                        <td><input class="span8" type="text" name="result1" value="<?php echo $extra['result'] ?>"/></td>
                        <td><input class="span8" type="text" name="result2" value="<?php echo $extra['result2'] ?>"/></td>
						<input type="hidden" name="id_dom" value="<?php echo $extra['id_dom'] ?>" id="id_dom"/>
                   		<td><button class="btn" type="submit" ><i class="icon-pencil"></i></button>	</td>
                    	<?php echo form_close(); ?>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
</div>