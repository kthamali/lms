<div id="container">

	<div class="row">
		<h1>User Types</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("create_usertype")): ?>
			<a href="<?php echo base_url('usertype/create') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-plus"></i>&nbsp; Add User Type
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

	<table id="usertype_table" class="table table-striped table-bordered table-hover" style="width:100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>User Type Description</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php  foreach ($usertype_list as $key => $value) {?>

				<tr>
					<td><?php echo $value->id ?></td>
					<td><?php echo $value->userTypeDesc ?></td>
					<td>
						<?php if ($this->permission->has_permission("delete_usertype")): ?>
							<a class='btn btn-sm btn-danger' title="Delete Usertype" href='<?php echo base_url("usertype/delete/".$value->id); ?>' onclick="return confirm('Are you sure to remove Selected User type?')"><i class="fas fa-trash"></i></a> 
						<?php endif ?>

						<?php if ($this->permission->has_permission("permission_set")): ?>
							<a class='btn btn-sm btn-info' title="Set Permission" href='<?php echo base_url("usertype/set_permission/".$value->id); ?>'><i class="fas fa-pen"></i></a> 
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
		$("#usertype_table").DataTable();
	});
</script>


