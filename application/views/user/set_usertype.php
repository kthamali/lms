<div id="container">

	<div class="row">
		<h1>Set User Types</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("viewall_usermanagement")): ?>
			<a href="<?php echo base_url('user') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-reply"></i>&nbsp; Back
			</a>
		<?php endif ?>
	</div>

</div>


<div>
	
	<?php echo form_open(); ?>
	<table id="setusertype_table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		
		<thead>
			<tr>
				<th></th>
				<th>Id</th>
				<th>User Type</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($usertype_list as $key => $usertype): ?>
				<tr>
					<td>
						<?php 
						echo form_checkbox("usertypes[]", $usertype->id, in_array($usertype->id, $usertype_id_array));
						?>
					</td>
					<td><?php echo $usertype->id; ?></td>
					<td><?php echo $usertype->userTypeDesc; ?></td>
				</tr>
			<?php endforeach ?>
			
		</tbody>

	</table>
	<br>
	<div class="text-right">
		<?php 
		echo form_submit('save', "Set Usertypes", array('class' => 'btn btn-success' ));
		?>

	</div>
	<?php echo form_close(); ?>

</div>

<script type="text/javascript">
	$(document).ready(function () {
		$("#setusertype_table").DataTable();
	});
</script>