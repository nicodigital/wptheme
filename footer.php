<footer class="container py-4 bg-neutral-800">
	<div class="row">
		<div class="col-[1/7] md:col-[1/6]">
			© <?=date('Y')?>
		</div>
		<div class="col-[7/13]">
			Lorem ipsum dolor sit amet.
		</div>
	</div>
</footer>

<?php
include 'layout/components/go-top.php' ;
// include 'layout/components/whatsapp.php' ;
?>

<?php if( !$detect->isMobile() ){ ?>
  <script src="js/module/instant.page.js" type="module" ></script>
<?php } ?>

</body>
</html>

<?php
// if( $cache_html == 'active' ){
// if( $cache_html == 'active' && $_SERVER['SERVER_NAME'] != "clientes.com" ){
// 	include 'close.php' ;
// }
