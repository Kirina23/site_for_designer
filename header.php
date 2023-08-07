<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Designerti</title>
    <link href="./assets/img/favicon.png" type="image/png">
  <?php wp_head() ?>
</head>
  <body class="container">
    <header>
      <nav class="border-bottom border-dark navbar navbar-expand-lg bg-white py-3 fixed-top container">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg">
          </a>
         
		  
          <section class="header">
		  
		
 		<div class="row_menu v-center">
 			
 			<!-- menu start here -->
 			<div class="header-item item-center">
 				<div class="menu-overlay">
 				</div>
				
 				<nav class="menu">
				
 					<div class="mobile-menu-head">
 						<div class="go-back"><i class="fa fa-angle-left"></i></div>
 						<div class="current-menu-title"></div>
 						<div class="mobile-menu-close">&times;</div>
 					</div>
					
 					 <?php 
		wp_nav_menu(
		array(
			'theme__location'	=> 'Header Navigation',
			'container_class'	=> 'menu',
			'container_id'		=> '',
			'container' 		=> 'nav div',
			'menu_class'     	=> 'menu-main current-menu-title',
			'menu_id'         	=> '',
			'depth' 			=> '2'
			
				
		)
	); ?>
					
					
 				</nav>
 			</div>
			
 			<!-- menu end here -->
 			<div class="header-item item-right">
 				
 				<!-- mobile menu trigger -->
 				<div class="mobile-menu-trigger">
 					<span></span>
 				</div>
 			</div>
					
			
 		</div>
		</section>
 	
		 <a class="nav-link btn-d-danger px-lg-5 py-lg-2 ms-lg-2 d-lg-block" href="https://telegram.me/vetolsa">Заказать</a>
		
		  </div>
      </nav>
	
   <section class="section-home px-2 py-5">
      <div class="row">
        <div class="col order-2 order-lg-1 text-center text-lg-start">
          <div class="wow fadeInLeft">
            <div class="h1 text-danger font-weight-bold">Привет,</div>
            <div class="pt-4 pb-5 ms-2">
              меня зовут Елизавета. Я графический дизайнер, мне 23 года. К
              своему делу отношусь с трепетом, ответственно, с высоким уровнем
              профессионализма.
            </div>
            <a class="btn-d-danger px-4 py-2 ms-2" href="https://telegram.me/vetolsa">
              Написать мне
            </a>
          </div>
        </div>
        <div class="col d-flex order-1 order-lg-2 justify-content-center align-items-center ava py-5 py-lg-0 wow fadeInRight">
            <div class="d-block before"></div>
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/ava.png">
        </div>
      </div>
	  </section>
    </header>