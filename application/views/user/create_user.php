<div id="container">

	<div class="row">
		<h1>Add User</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("viewall_usermanagement")): ?>
			<a href="<?php echo base_url('user') ?>" class="btn btn-primary btn-sm">
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
			<label for="username">Username  <span class="text-red">*</span></label>
			<?php echo form_input('username', set_value('username') , array('class' => 'form-control', 'placeholder' => 'Username', 'id' => 'username')); ?>
			<div class="text-error"><?php echo form_error('username'); ?></div>
		</div>

		<div class="form-group">
			<label for="fName">First Name <span class="text-red">*</span></label>
			<?php echo form_input('fName', set_value('fName') , array('class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'fName')); ?>
			<div class="text-error"><?php echo form_error('fName'); ?></div>
		</div>

		<div class="form-group">
			<label for="lName">Last Name </label>
			<?php echo form_input('lName', set_value('lName') , array('class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'lName')); ?>
			<div class="text-error"><?php echo form_error('lName'); ?></div>
		</div>

		<div class="form-group">
			<?php echo form_submit('submit', 'Save' , array('class' => 'btn btn-primary pull-right')); ?>
		</div>

		<?php echo form_close(); ?>

	</div>
	<div class="col-md-3"></div>
</div>