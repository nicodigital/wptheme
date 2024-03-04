<?php include 'header.php' ?>

<main>

	<?php include 'codex/grid.php' ?>

	<?php include 'codex/slider.php' ?>

	<section class="container py-6">
		<div class="row">
			<div class="col-[1/13] mb-10">
				<h2 class="h1 font-bold">Accordions</h2>
			</div>
			<div class="col-[1/13] md:col-[1/6]" >
				<?php include 'codex/accordion.php' ?>
			</div>
			<div class="col-[1/13] md:col-[8/13]" >
				<?php include 'codex/accordion.php' ?>
			</div>		
		</div>
	</section>
	
	<?php //include 'codex/filters.php' ?>

	<?php include 'layout/section/contacto.php' ?>

</main>

<?php include 'footer.php';
