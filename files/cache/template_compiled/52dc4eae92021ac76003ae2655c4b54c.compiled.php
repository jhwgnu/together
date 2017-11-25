<?php if(!defined("__XE__"))exit;?>﻿
	<head>
		<title>J Smart Layout</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="/layouts/J_Smart/assets/js/ie/html5shiv.js"></script><![endif]-->
        <!--#Meta:layouts/J_Smart/assets/css/main.css--><?php $__tmp=array('layouts/J_Smart/assets/css/main.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
        <!--#Meta:layouts/J_Smart/assets/css/font-awesome.min.css--><?php $__tmp=array('layouts/J_Smart/assets/css/font-awesome.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
        <style>
        	#intro {
			background: url(<?php echo $__Context->layout_info->main_01_img ?>);
			}
			#one {
			background: url(<?php echo $__Context->layout_info->main_02_img ?>);
			}
			#two {
			background: url(<?php echo $__Context->layout_info->main_03_img ?>);
			}
        </style>
	</head>
	
    <body style="line-height:0;">
		<!-- Header -->
			<header id="header">
                <h1><a href="<?php echo $__Context->layout_info->logo_url ?>"><?php echo $__Context->layout_info->logo_text ?></a></h1>
                    <nav>
                        <ul>
                            <?php if($__Context->GNB->list&&count($__Context->GNB->list))foreach($__Context->GNB->list as $__Context->key1=>$__Context->val1){ ?><li |cond="$__Context->val1['selected']">
                                <a href="<?php echo $__Context->val1['href'] ?>"><?php echo $__Context->val1['link'] ?></a>
                            </li><?php } ?>
                        </ul>
                    </nav>
            </header>
        <?php if($__Context->layout_info->layout_type == main){ ?>
		<style>
			input[type="button"],
			input[type="submit"],
			input[type="reset"],
			.button,
			button {
				-moz-appearance: none;
				-webkit-appearance: none;
				-ms-appearance: none;
				appearance: none;
				-moz-transition: background-color 0.2s ease-in-out;
				-webkit-transition: background-color 0.2s ease-in-out;
				-ms-transition: background-color 0.2s ease-in-out;
				transition: background-color 0.2s ease-in-out;
				background-color: #98c593;
				border: 0;
				border-radius: 3.5em;
				color: #ffffff;
				cursor: pointer;
				display: inline-block;
				height: 3.5em;
				line-height: 3.5em;
				outline: 0;
				padding: 0 2em 0 2em;
				position: relative;
				text-align: center;
				text-decoration: none;
			}
		</style>
		<!-- Intro -->
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content">
					<header>
						<h2><?php echo $__Context->layout_info->main_01_title ?></h2>
					</header>
					<p><?php echo $__Context->layout_info->main_01_text ?></p>
					<footer>
						<a href="#one" class="button style2 down">More</a>
					</footer>
					<?php echo $__Context->content ?>
				</div>
			</section>
		<!-- One -->
			<section id="one" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2><?php echo $__Context->layout_info->main_02_title ?></h2>
					</header>
					<p><?php echo $__Context->layout_info->main_02_text ?></p>
				</div>
				<a href="#two" class="button style2 down anchored">Next</a>
			</section>
		<!-- Two -->
			<section id="two" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2><?php echo $__Context->layout_info->main_03_title ?></h2>
					</header>
					<p><?php echo $__Context->layout_info->main_03_text ?></p>
				</div>
				<a href="#work" class="button style2 down anchored">Next</a>
			</section>
		<!-- Work -->
			<section id="work" class="main style3 primary">
				<div class="content">
					<header>
						<h2><?php echo $__Context->layout_info->latest_img_title ?></h2>
						<p><?php echo $__Context->layout_info->latest_img_text ?></p>
					</header>
					<!-- Gallery  -->
						<div class="gallery1">
							<img class="zbxe_widget_output" widget="content" skin="J_Smart" colorset="white" content_type="document" module_srls="846" list_type="gallery" tab_type="none" markup_type="list" list_count="6" cols_list_count="2" page_count="1" option_view="thumbnail" show_browser_title="N" show_comment_count="N" show_trackback_count="N" show_category="N" show_icon="N" order_target="regdate" order_type="desc" thumbnail_type="crop" thumbnail_width="500" thumbnail_height="500" />
						</div>
				</div>
			</section>
		<?php }else{ ?>
		<section id="contact" class="main style3 secondary" style="padding-top: 3em;">
			<div class="content">
				<header>
					<h2><?php echo $__Context->layout_info->sub_title ?></h2>
					<p><?php echo $__Context->layout_info->sub_text ?></p>
				</header>
				<div class="box" style="margin:1em 0 3em 0;">
					<?php echo $__Context->content ?>
				</div>
			</div>
		</section>
		<?php } ?>
		<!-- Footer -->
			<footer id="footer">
				<!-- Icons -->
					<ul class="actions">
						<li><?php if($__Context->layout_info->facebook){ ?><a href="<?php echo $__Context->layout_info->facebook ?>" class="icon fa-facebook"><span class="label">Facebook</span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->twitter){ ?><a href="<?php echo $__Context->layout_info->twitter ?>" class="icon fa-twitter"><span class="label">Twitter</span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->instagram){ ?><a href="<?php echo $__Context->layout_info->instagram ?>" class="icon fa-instagram"><span class="label">Instagram</span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->youtube){ ?><a href="<?php echo $__Context->layout_info->youtube ?>" class="icon fa-youtube"><span class="label">Youtube</span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->google_plus){ ?><a href="<?php echo $__Context->layout_info->google_plus ?>" class="icon fa-google-plus"><span class="label">Google_Plus</span></a><?php } ?></li>
					</ul>
				<!-- Menu -->
					<ul class="menu">
						<li><?php echo $__Context->layout_info->address ?></li><li>&copy; <?php echo $__Context->layout_info->copyright ?></li>
					</ul>
			</footer>
		<!-- Scripts -->
            <script src="/layouts/J_Smart/assets/js/jquery.dropotron.min.js"></script>
			<script src="/layouts/J_Smart/assets/js/jquery.poptrox.min.js"></script>
			<script src="/layouts/J_Smart/assets/js/jquery.scrolly.min.js"></script>
			<script src="/layouts/J_Smart/assets/js/jquery.scrollex.min.js"></script>
			<script src="/layouts/J_Smart/assets/js/skel.min.js"></script>
			<script src="/layouts/J_Smart/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="/layouts/J_Smart/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="/layouts/J_Smart/assets/js/main.js"></script>
	</body>