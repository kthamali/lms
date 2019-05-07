<div id="container">

	<div class="row">
		<h1>Borrow History</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("create_borrow")): ?>
			<a href="<?php echo base_url('borrowhistory/create') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-plus"></i>&nbsp; Add
			</a>
		<?php endif ?>
	</div>

</div>

<br/>


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

	<div>
		<h4 class="bg bg-info sub-heading">My Borrow History</h4><br/>

		<table id="myborrow_table" class="table table-striped table-bordered table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Book Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>

				<?php  foreach ($my_borrowhistory_list as $key => $value) {?>

					<tr>
						<td><?php echo $value->id ?></td>
						<td><?php echo $value->username ?></td>
						<td><?php echo $value->fName ?></td>
						<td><?php echo $value->bookDesc ?></td>
						<td>
							<?php if ($this->permission->has_permission("delete_book")): ?>
								<a class='btn btn-sm btn-danger' title="Delete Book" href='<?php echo base_url("book/delete/".$value->id); ?>' onclick="return confirm('Are you sure to remove Selected Book?')"><i class="fas fa-trash"></i></a> 
							<?php endif ?>
						</td>

					</tr>

					<?php

				}

				?>

			</tbody>
		</table>

	</div>












	<div>
		<h4 class="bg bg-info sub-heading">All Borrow History</h4><br/>

		<table id="allborrow_table" class="table table-striped table-bordered table-hover" style="width:100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Book Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>

				<?php  foreach ($borrowhistory_list as $key => $value) {?>

					<tr>
						<td><?php echo $value->id ?></td>
						<td><?php echo $value->username ?></td>
						<td><?php echo $value->fName ?></td>
						<td><?php echo $value->bookDesc ?></td>
						<td>
							<?php if ($this->permission->has_permission("delete_book")): ?>
								<a class='btn btn-sm btn-danger' title="Delete Book" href='<?php echo base_url("book/delete/".$value->id); ?>' onclick="return confirm('Are you sure to remove Selected Book?')"><i class="fas fa-trash"></i></a> 
							<?php endif ?>
						</td>

					</tr>

					<?php

				}

				?>

			</tbody>
		</table>

	</div>

</div>



<script type="text/javascript">
	$(document).ready(function () {
		$("#allborrow_table").DataTable();
		$("#myborrow_table").DataTable();
	});
</script>