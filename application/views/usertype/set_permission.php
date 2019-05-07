<div id="container">

	<div class="row">
		<h1>Set Permission</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("viewall_usertype")): ?>
			<a href="<?php echo base_url('usertype') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-reply"></i>&nbsp; Back
			</a>
		<?php endif ?>
	</div>

</div>

<div>	
	<?php echo form_open(); ?>
	<table id="setpermission_table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th></th>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($permission_list as $key => $permission){ ?>
				<tr>
					<td>
						<?php 
						echo form_checkbox("permissions[]", $permission->id, in_array($permission->id, $permission_id_array));
						?>
					</td>
					<td><?php echo $permission->id; ?></td>
					<td><?php echo $permission->permissionName; ?></td>
					<td><?php echo $permission->permissionDesc; ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	<div class="text-right">
		<?php 
		echo form_submit('save', "Set Permissions", array('class' => 'btn btn-success' ));
		?>
	</div>
	<?php echo form_close(); ?>
</div>