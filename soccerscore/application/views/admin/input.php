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
<?php echo form_open('administrator/do_input', 'class="form-horizontal"'); ?>
<div class="control-group">
	<legend>
		Input Data Soccerway
	</legend>
</div>
<div class="control-group">
	<label class="control-label" for="kd_soal">Negara</label>
	<div class="controls">
		<input type="text" style="width:300px;" name="negara" placeholder="National">
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="nm_soal">Team</label>
	<div class="controls">
		<input type="text" style="width:300px;" name="team" placeholder="Team FC"/>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="versi">Link</label>
	<div class="controls">
		<input type="text" style="width:300px;" name="link" placeholder="link matches from soccerway.com"/>
	</div>
</div>
<a class="btn" href="<?php echo site_url('administrator'); ?>"><i class="icon-chevron-left"></i>Back</a>
<button class="btn btn-primary" type="submit" value="submit" name="submit">
	<i class="icon-check"></i> Save
</button>
<?php echo form_close(); ?>
