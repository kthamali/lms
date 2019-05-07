<div id="container">
	<h1>Dashboard</h1>
</div>




<?php  foreach ($book as $key => $value) {?>

	<div class="fakeimg" style="height:20px;">
		<?php echo $value->bookDesc ?>
	</div><br>
	<?php

}

?>

