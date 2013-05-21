<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>
		<?php 
		$_title = isset($data['title']) ? $data['title'] : Kohana::config('simpleauth.default_title');
		echo $_title;
		?>
	</title>
	<meta name="description" content="<?=Kohana::config('simpleauth.meta.description')?>" />
	<meta name="keywords" content="<?=Kohana::config('simpleauth.meta.keywords')?>" />
	<meta name="author" content="<?=Kohana::config('simpleauth.meta.author')?>" />
	<link rel="shortcut icon" href="<?=Kohana::config('simpleauth.favicon')?>">
	<?=HTML::style('simpleauth/assets/css/style.css')?> 
	<?=HTML::script('simpleauth/assets/js/modernizr.custom.63321.js')?> 
	<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
	<style>
	@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
	</style>
</head>
<body>
	<div class="container">
		<?=HTML::image(Kohana::config('simpleauth.logo'), array('id' => 'logo'))?>	
		<section class="main">
			<?=Form::open(NULL, array('class' => 'form-3'))?>
			<p class="clearfix">
				<label for="login"><?=__('Email')?></label>
				<?php $email = ( isset($data['email']) ) ? $data['email'] : ''; ?>
				<input type="text" name="email" id="email" placeholder="<?=__('Email')?>" value="<?=$email?>">
			</p>
			<p class="clearfix">
				<label for="password"><?=__('Password')?></label>
				<input type="password" name="password" id="password" placeholder="Password"> 
			</p>
			<p class="clearfix">
				&nbsp;
		    	<?php /*
		        <input type="checkbox" name="remember" id="remember">
		        <label for="remember">Remember me</label>
		        */ ?>
			</p>
			<p class="clearfix">
				<input type="submit" name="submit" value="Sign in">
			</p>       
			<?=Form::close()?>
			</section>

	</div>
</body>
</html>