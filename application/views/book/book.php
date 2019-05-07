<div id="container">

	<div class="row">
		<h1>Search Books</h1>
	</div>

	<div class="row">
		<?php if ($this->permission->has_permission("create_book")): ?>
			<a href="<?php echo base_url('book/create') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-plus"></i>&nbsp; Add Book
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

	<table id="book_table" class="table table-striped table-bordered table-hover" style="width:100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Book Description</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php  foreach ($book_list as $key => $value) {?>

				<tr>
					<td><?php echo $value->id ?></td>
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

<script type="text/javascript">
	$(document).ready(function () {
		$("#book_table").DataTable();
	});
</script>