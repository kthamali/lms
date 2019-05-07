<!-- Sidebar -->
<ul class="sidebar navbar-nav">

	<?php if ($this->permission->has_permission("viewall_dashboard")): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
				<span>Dashboard</span>
			</a>
		</li>
	<?php endif ?>

	<?php if ($this->permission->has_permission("viewall_permission")): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('permissions'); ?>">
				<span>Permissions</span>
			</a>
		</li>
	<?php endif ?>

	<?php if ($this->permission->has_permission("viewall_usertype")): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('usertype'); ?>">
				<span>User Types</span>
			</a>
		</li>
	<?php endif ?>

	<?php if ($this->permission->has_permission("viewall_usermanagement")): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('user'); ?>">
				<span>User Management</span>
			</a>
		</li>
	<?php endif ?>

	<?php if ($this->permission->has_permission("viewall_book")): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('book'); ?>">
				<span>Books</span>
			</a>
		</li>
	<?php endif ?>

	<?php if ($this->permission->has_permission("viewall_borrow")): ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('borrowhistory'); ?>">
				<span>Borrow History</span>
			</a>
		</li>
	<?php endif ?>

</ul>
