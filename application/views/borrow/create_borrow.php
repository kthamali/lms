<div id="container">

	<div class="row">
		<h1>Add Borrow</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("viewall_borrow")): ?>
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
			<label for="userId">User  <span class="text-red">*</span></label>
			<?php echo form_dropdown('userId', $user_dropdown, set_value('userId', ''), array('class'=> 'form-control')); ?>
			<div class="text-error"><?php echo form_error('userId'); ?></div>
		</div>

		<div class="form-group">
			<label for="bookId">Book  <span class="text-red">*</span></label>
			<?php echo form_dropdown('bookId', $book_dropdown, set_value('bookId', ''), array('class'=> 'form-control')); ?>
			<div class="text-error"><?php echo form_error('bookId'); ?></div>
		</div>

		
		<div class="form-group">
			<?php echo form_submit('submit', 'Save' , array('class' => 'btn btn-primary pull-right')); ?>
		</div>

		<?php echo form_close(); ?>

	</div>
	<div class="col-md-3"></div>
</div>

