<?php include 'inc/menu-links.php' ;

	if( $isMobile || $isTablet ){
		$togg = 'togg';
	}

	?>
	<nav id="menu">

		<?php if(!$isDesktop){ ?>
			<a href="<?=$base_url?>">
				<img class="brand xg:hidden" src="<?=$base_url?>/img/logos/logo.svg<?=$cache?>" alt="<?=$site_name?>">
			</a>
		<?php } ?>

		<?php foreach ( $navData as $item ) { ?>
			<a href="<?=$item['link']?>" class="<?php echo status( $slug , $item['link'] ).' '.$item['class'] ?> " >
				<?=$item['title']?>
			</a>
		<?php } ?>

	</nav>
