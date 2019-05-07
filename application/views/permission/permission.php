<div id="container">

	<div class="row">
		<h1>Permissions</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("create_permission")): ?>
			<a href="<?php echo base_url('permissions/create') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-plus"></i>&nbsp; Add Permission
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

	<table id="permission_table" class="table table-striped table-bordered table-hover" style="width:100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Permission Name</th>
				<th>Permission Code</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php  foreach ($permission_list as $key => $value) {?>

				<tr>
					<td><?php echo $value->id ?></td>
					<td><?php echo $value->permissionName ?></td>
					<td><?php echo $value->permissionCode ?></td>
					<td>
						<?php if ($this->permission->has_permission("delete_permission")): ?>
							<a class='btn btn-sm btn-danger' title="Delete Permission" href='<?php echo base_url("permissions/delete/".$value->id); ?>' onclick="return confirm('Are you sure to remove Selected Permission?')"><i class="fas fa-trash"></i></a> 
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
		$("#permission_table").DataTable();
	});
</script>


