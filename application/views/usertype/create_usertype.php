<div id="container">

	<div class="row">
		<h1>Add User Type</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("viewall_usertype")): ?>
			<a href="<?php echo base_url('usertype') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-reply"></i>&nbsp; Back
			</a>
		<?php endif ?>
	</div>

</div>


<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		
		<?php echo form_open(); ?>

		<div class="form-group">
			<label for="userTypeDesc">User type Description <span class="text-red">*</span></label>
			<?php echo form_input('userTypeDesc', set_value('userTypeDesc') , array('class' => 'form-control', 'placeholder' => 'Usertype', 'id' => 'userTypeDesc')); ?>
			<div class="text-error"><?php echo form_error('userTypeDesc'); ?></div>
		</div>

		<div class="form-group">
			<?php echo form_submit('submit', 'Save' , array('class' => 'btn btn-primary pull-right')); ?>
		</div>

		<?php echo form_close(); ?>

	</div>
	<div class="col-md-3"></div>
</div>