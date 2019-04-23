<?php if(count($errors>0)): ?>

	<div class="errors">
		<?php foreach($errors as $error) : ?>
			<p style="color: #de5f0b;"><?php echo $error ?>!</p>
		<?php endforeach  ?>
	</div>

<?php endif ?>