<div id="container">

	<div class="row">
		<h1>User Management</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("create_user")): ?>
			<a href="<?php echo base_url('user/create') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-plus"></i>&nbsp; Add User
			</a>
		<?php endif ?>
	</div>

</div>


<div>
	
	<?php 
	if($this->session->flashdata('success')){
		?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php
	}
	?>

	<?php 
	if($this->session->flashdata('error')){
		?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('error'); ?>
		</div>
		<?php
	}
	?>

	<table id="user_table" class="table table-striped table-bordered table-hover" style="width:100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php  foreach ($user_list as $key => $value) {?>

				<tr>
					<td><?php echo $value->id ?></td>
					<td><?php echo $value->username ?></td>
					<td><?php echo $value->fName ?></td>
					<td><?php echo $value->lName ?></td>
					<td>
						<?php if ($this->permission->has_permission("delete_user")): ?>
							<a class='btn btn-sm btn-danger' title="Delete User" href='<?php echo base_url("user/delete/".$value->id); ?>' onclick="return confirm('Are you sure to remove Selected User?')"><i class="fas fa-trash"></i></a> 
						<?php endif ?>

						<?php if ($this->permission->has_permission("usertype_set")): ?>
							<a class='btn btn-sm btn-info' title="Set Usertype" href='<?php echo base_url("user/set_usertype/".$value->id); ?>'><i class="fas fa-pen"></i></a> 
						<?php endif ?>
					</td>

				</tr>

				<?php

			}

			?>

		</tbody>
	</table>

</div>

<script type="text/javascript">
	$(document).ready(function () {
		$("#user_table").DataTable();
	});
</script>


