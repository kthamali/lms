<div id="container">

	<div class="row">
		<h1>Add Book</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("viewall_book")): ?>
			<a href="<?php echo base_url('book') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-reply"></i>&nbsp; Back
			</a>
		<?php endif ?>
	</div>

</div>



<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		
		<?php echo form_open_multipart(); ?>

		<div class="form-group">
			<label for="bookDesc">Book Description  <span class="text-red">*</span></label>
			<?php echo form_input('bookDesc', set_value('bookDesc') , array('class' => 'form-control', 'placeholder' => 'Book Description', 'id' => 'bookDesc')); ?>
			<div class="text-error"><?php echo form_error('bookDesc'); ?></div>
		</div>

		<div class="form-group">
			<label for="image">Image  </label>

			<?php echo "<input type='file' name='userfile' size='20'/>"; ?>

			<div class="text-error"><?php echo form_error('image'); ?></div>
		</div>

		<div class="form-group">
			<?php echo form_submit('submit', 'Save' , array('class' => 'btn btn-primary pull-right')); ?>
		</div>

		<?php echo form_close(); ?>

	</div>
	<div class="col-md-3"></div>
</div>