<?php if (validation_errors()) {
?>

<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">
		x
	</button>
	<h4>Terjadi Kesalahan!</h4>
	<?php echo validation_errors(); ?>
</div>
<?php } ?>


<?php 
	echo form_open('administrator/do_input_negara/', 'class="form-horizontal"'); 
	
?>
<div class="control-group">
	<legend>
		INPUT NEGARA
	</legend>
</div>
<div class="control-group">
	<label class="control-label" for="kd_negara">Negara</label>
	<div class="controls">
            <input <?php echo (!empty($status)) ? 'disabled' : '' ;?> type="text" style="width:300px;" name="negara" placeholder="National" value="<?php echo $ctrl['negara']; ?>">
	</div>
</div>


<a class="btn" href="<?php echo site_url('administrator'); ?>"><i class="icon-chevron-left"></i>Back</a>
<button class="btn btn-primary" type="submit" value="submit" name="submit">
	<i class="icon-check"></i> Save
</button>
<?php echo form_close(); ?>
