<div id="container">

	<div class="row">
		<h1>Add Permission</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("viewall_permission")): ?>
			<a href="<?php echo base_url('permissions') ?>" class="btn btn-primary btn-sm">
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
			<label for="permissionName">Permission Name <span class="text-red">*</span></label>
			<?php echo form_input('permissionName', set_value('permissionname') , array('class' => 'form-control', 'placeholder' => 'Permission Name', 'id' => 'permissionname')); ?>
			<div class="text-error"><?php echo form_error('permissionName'); ?></div>
		</div>

		<div class="form-group">
			<label for="permissionDesc">Permission Description <span class="text-red">*</span></label>
			<?php echo form_input('permissionDesc', set_value('permissiondesc') , array('class' => 'form-control', 'placeholder' => 'Permission Description', 'id' => 'permissiondesc')); ?>
			<div class="text-error"><?php echo form_error('permissionDesc'); ?></div>
		</div>

		<div class="form-group">
			<label for="permissionCode">Permission Code <span class="text-red">*</span></label>
			<?php echo form_input('permissionCode', set_value('permissionCode') , array('class' => 'form-control', 'placeholder' => 'Permission Code', 'id' => 'permissionCode')); ?>
			<div class="text-error"><?php echo form_error('permissionCode'); ?></div>
		</div>

		<div class="form-group">
			<?php echo form_submit('submit', 'Save' , array('class' => 'btn btn-primary pull-right')); ?>
		</div>

		<?php echo form_close(); ?>

	</div>
	<div class="col-md-3"></div>
</div>