<?php if(!defined("__XE__"))exit;?>	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--#Meta:layouts/J_Flex/assets/css/main.css--><?php $__tmp=array('layouts/J_Flex/assets/css/main.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
		<!--#Meta:layouts/J_Flex/assets/css/font-awesome.min.css--><?php $__tmp=array('layouts/J_Flex/assets/css/font-awesome.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	</head>
	<style>
		.slide_ul>li{
			padding: <?php echo $__Context->layout_info->main_top ?>em 0 0 <?php echo $__Context->layout_info->main_left ?>em;
		}
		#flexbox{
			margin-top: <?php echo $__Context->layout_info->flex_top ?>%;
		}
		#flexbox div:first-child{
			background:#<?php echo $__Context->layout_info->flex_bg_01 ?>;
		}
		#flexbox div:nth-child(2){
			background:#<?php echo $__Context->layout_info->flex_bg_02 ?>;
		}
		#flexbox div:nth-child(3){
			background:#<?php echo $__Context->layout_info->flex_bg_03 ?>;
		}
		#flexbox div:nth-child(4){
			background:#<?php echo $__Context->layout_info->flex_bg_04 ?>;
		}
		#flexbox div:nth-child(5){
			background:#<?php echo $__Context->layout_info->flex_bg_05 ?>;
		}
		#flexbox div:nth-child(6){
			background:#<?php echo $__Context->layout_info->flex_bg_06 ?>;
		}
		#flexbox div:nth-child(7){
			background:#<?php echo $__Context->layout_info->flex_bg_07 ?>;
		}
		#flexbox div:nth-child(8){
			background:#<?php echo $__Context->layout_info->flex_bg_08 ?>;
		}
		#flexbox div:nth-child(9){
			background:#<?php echo $__Context->layout_info->flex_bg_09 ?>;
		}
		#flexbox div:nth-child(10){
			background:#<?php echo $__Context->layout_info->flex_bg_10 ?>;
		}
		#flexbox div:nth-child(11){
			background:#<?php echo $__Context->layout_info->flex_bg_11 ?>;
		}
		#flexbox div:nth-child(12){
			background:#<?php echo $__Context->layout_info->flex_bg_12 ?>;
		}
		#flexbox div:nth-child(13){
			background:#<?php echo $__Context->layout_info->flex_bg_13 ?>;
		}
		#flexbox div:nth-child(14){
			background:#<?php echo $__Context->layout_info->flex_bg_14 ?>;
		}
		#flexbox div:nth-child(15){
			background:#<?php echo $__Context->layout_info->flex_bg_15 ?>;
		}
		#flexbox div:nth-child(16){
			background:#<?php echo $__Context->layout_info->flex_bg_16 ?>;
		}
		#flexbox div:nth-child(17){
			background:#<?php echo $__Context->layout_info->flex_bg_17 ?>;
		}
		#flexbox div:nth-child(18){
			background:#<?php echo $__Context->layout_info->flex_bg_18 ?>;
		}
		#flexbox div:nth-child(19){
			background:#<?php echo $__Context->layout_info->flex_bg_19 ?>;
		}
		#flexbox div:nth-child(20){
			background:#<?php echo $__Context->layout_info->flex_bg_20 ?>;
		}
		#flexbox div:nth-child(21){
			background:#<?php echo $__Context->layout_info->flex_bg_21 ?>;
		}		
	</style>
	<?php if($__Context->layout_info->layout_type == main){ ?>
	<body class="landing">
		<div id="page-wrapper">
				<header id="header" class="alt">
					<h1>
						<?php if($__Context->layout_info->logo_text){ ?><a href="<?php echo $__Context->layout_info->logo_url ?>"><?php echo $__Context->layout_info->logo_text ?></a><?php } ?>
						<?php if($__Context->layout_info->logo_image){ ?><a href="<?php echo $__Context->layout_info->logo_image ?>"><img src="<?php echo $__Context->layout_info->logo_image ?>" alt="" /></a><?php } ?>
					</h1>
					<?php if($__Context->GNB->list){ ?><nav id="nav">
		                <ul>
		                    <?php if($__Context->GNB->list&&count($__Context->GNB->list))foreach($__Context->GNB->list as $__Context->key1=>$__Context->val1){ ?><li>
		                        <a href="<?php echo $__Context->val1['href'] ?>" style="font-size: <?php echo $__Context->layout_info->menu_size ?>em; color : <?php echo $__Context->layout_info->menu_color ?>;" target="_self" |cond="$__Context->val1['open_window'] == 'Y'"><?php echo $__Context->val1['link'] ?></a>
		                        <?php if($__Context->val1['selected']){;
$__Context->_selected_menu = $__Context->val1;
} ?>
		                        <?php if($__Context->val1['list']){ ?><ul>
		                            <?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){ ?><li |cond="$__Context->val2['list']">
		                                <a href="<?php echo $__Context->val2['href'] ?>" style="font-size: <?php echo $__Context->layout_info->menu_size ?>em;" target="_self" |cond="$__Context->val2['open_window'] == 'Y'"><?php echo $__Context->val2['link'] ?></a>
		                            </li><?php } ?>
		                        </ul><?php } ?>
		                    </li><?php } ?>
		                </ul>
		            </nav><?php } ?>
				</header>
				<style>
					.slide_ul>li>h2{
						color: <?php echo $__Context->layout_info->main_txt_color ?>;
					}
					.slide_ul>li>p{
						color: <?php echo $__Context->layout_info->sub_txt_color ?>;
					}
				</style>
				<div class="slide">
					<ul class="slide_ul">
						<li style="background: url(<?php echo $__Context->layout_info->main_img_01 ?>) no-repeat center top;">
							<h2><?php echo $__Context->layout_info->main_txt_01 ?></h2>
							<p><?php echo $__Context->layout_info->sub_txt_01 ?></p>
						</li>
						<li style="background: url(<?php echo $__Context->layout_info->main_img_02 ?>) no-repeat center top">
							<h2><?php echo $__Context->layout_info->main_txt_02 ?></h2>
							<p><?php echo $__Context->layout_info->sub_txt_02 ?></p>
						</li>
						<li style="background: url(<?php echo $__Context->layout_info->main_img_03 ?>) no-repeat center top">
							<h2><?php echo $__Context->layout_info->main_txt_03 ?></h2>
							<p><?php echo $__Context->layout_info->sub_txt_03 ?></p>
						</li>
						<li style="background: url(<?php echo $__Context->layout_info->main_img_04 ?>) no-repeat center top">
							<h2><?php echo $__Context->layout_info->main_txt_04 ?></h2>
							<p><?php echo $__Context->layout_info->sub_txt_04 ?></p>
						</li>
						<li style="background: url(<?php echo $__Context->layout_info->main_img_05 ?>) no-repeat center top">
							<h2><?php echo $__Context->layout_info->main_txt_05 ?></h2>
							<p><?php echo $__Context->layout_info->sub_txt_05 ?></p>
						</li>
					</ul>
				</div>
				<div id="flexbox">
					<div>
						<?php if($__Context->layout_info->flex_pwr_01 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_01 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_01 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_01 ?>"><?php echo $__Context->layout_info->flex_text_01 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_02 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_02 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_02 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_02 ?>"><?php echo $__Context->layout_info->flex_text_02 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_03 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_03 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_03 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_03 ?>"><?php echo $__Context->layout_info->flex_text_03 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_04 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_04 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_04 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_04 ?>"><?php echo $__Context->layout_info->flex_text_04 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_05 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_05 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_05 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_05 ?>"><?php echo $__Context->layout_info->flex_text_05 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_06 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_06 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_06 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_06 ?>"><?php echo $__Context->layout_info->flex_text_06 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_07 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_07 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_07 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_07 ?>"><?php echo $__Context->layout_info->flex_text_07 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_08 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_08 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_08 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_08 ?>"><?php echo $__Context->layout_info->flex_text_08 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_09 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_09 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_09 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_09 ?>"><?php echo $__Context->layout_info->flex_text_09 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_10 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_10 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_10 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_10 ?>"><?php echo $__Context->layout_info->flex_text_10 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_11 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_11 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_11 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_11 ?>"><?php echo $__Context->layout_info->flex_text_11 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_12 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_12 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_12 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_12 ?>"><?php echo $__Context->layout_info->flex_text_12 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_13 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_13 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_13 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_13 ?>"><?php echo $__Context->layout_info->flex_text_13 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_14 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_14 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_14 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_14 ?>"><?php echo $__Context->layout_info->flex_text_14 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_15 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_15 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_15 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_15 ?>"><?php echo $__Context->layout_info->flex_text_15 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_16 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_16 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_16 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_16 ?>"><?php echo $__Context->layout_info->flex_text_16 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_17 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_17 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_17 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_17 ?>"><?php echo $__Context->layout_info->flex_text_17 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_18 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_18 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_18 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_18 ?>"><?php echo $__Context->layout_info->flex_text_18 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_19 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_19 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_19 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_19 ?>"><?php echo $__Context->layout_info->flex_text_19 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_20 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_20 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_20 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_20 ?>"><?php echo $__Context->layout_info->flex_text_20 ?></a></p>
						<?php } ?>
					</div>
					<div>
						<?php if($__Context->layout_info->flex_pwr_21 === Y){ ?>
						<a href="<?php echo $__Context->layout_info->flex_url_21 ?>" class="icon <?php echo $__Context->layout_info->flex_icon_21 ?>"><span class="label"></span></a>
						<p><a href="<?php echo $__Context->layout_info->flex_url_21 ?>"><?php echo $__Context->layout_info->flex_text_21 ?></a></p>
						<?php } ?>
					</div>
				</div>
			<?php }else{ ?>
			<body>
				<div id="page-wrapper">
					<!-- Header -->
					<header id="header" style="background: #444; top: 0;">
						<h1>
							<?php if($__Context->layout_info->logo_text){ ?><a href="<?php echo $__Context->layout_info->logo_url ?>"><?php echo $__Context->layout_info->logo_text ?></a><?php } ?>
							<?php if($__Context->layout_info->logo_image){ ?><a href="<?php echo $__Context->layout_info->logo_image ?>"><img src="<?php echo $__Context->layout_info->logo_image ?>" alt="" /></a><?php } ?>
						</h1>
						<?php if($__Context->GNB->list){ ?><nav id="nav">
			                <ul>
			                    <?php if($__Context->GNB->list&&count($__Context->GNB->list))foreach($__Context->GNB->list as $__Context->key1=>$__Context->val1){ ?><li>
			                        <a href="<?php echo $__Context->val1['href'] ?>" style="font-size: <?php echo $__Context->layout_info->menu_size ?>em; color : <?php echo $__Context->layout_info->menu_color ?>;" target="_self" |cond="$__Context->val1['open_window'] == 'Y'"><?php echo $__Context->val1['link'] ?></a>
			                        <?php if($__Context->val1['selected']){;
$__Context->_selected_menu = $__Context->val1;
} ?>
			                        <?php if($__Context->val1['list']){ ?><ul>
			                            <?php if($__Context->val1['list']&&count($__Context->val1['list']))foreach($__Context->val1['list'] as $__Context->key2=>$__Context->val2){ ?><li |cond="$__Context->val2['list']">
			                                <a href="<?php echo $__Context->val2['href'] ?>" style="font-size: <?php echo $__Context->layout_info->menu_size ?>em;" target="_self" |cond="$__Context->val2['open_window'] == 'Y'"><?php echo $__Context->val2['link'] ?></a>
			                            </li><?php } ?>
			                        </ul><?php } ?>
			                    </li><?php } ?>
			                </ul>
			            </nav><?php } ?>
					</header>
					<section id="main" class="container">
						<header>
							<h2><?php echo $__Context->layout_info->sub_title ?></h2>
							<p><?php echo $__Context->layout_info->sub_text ?></p>
						</header>
						<div class="box">
							<?php echo $__Context->content ?>
						</div>
					</section>
				<?php } ?>
				<!-- Footer -->
				<footer id="footer">
					<?php echo $__Context->content ?>
					<ul class="icons">
						<li><?php if($__Context->layout_info->facebook){ ?><a href="<?php echo $__Context->layout_info->facebook ?>" class="icon fa-twitter"><span class="label"></span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->twitter){ ?><a href="<?php echo $__Context->layout_info->twitter ?>" class="icon fa-facebook"><span class="label"></span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->instargram){ ?><a href="<?php echo $__Context->layout_info->instargram ?>" class="icon fa-instagram"><span class="label"></span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->youtube){ ?><a href="<?php echo $__Context->layout_info->youtube ?>" class="icon fa-youtube"><span class="label"></span></a><?php } ?></li>
						<li><?php if($__Context->layout_info->google_plus){ ?><a href="<?php echo $__Context->layout_info->google_plus ?>" class="icon fa-google-plus"><span class="label"></span></a><?php } ?></li>
					</ul>
					<ul class="copyright">
						<li><?php echo $__Context->layout_info->address ?></li><li>&copy; <?php echo $__Context->layout_info->copyright ?></li>
					</ul>
				</footer>
		</div>
		<!-- Scripts -->
		<script src="/layouts/J_Flex/assets/js/mainfade.js"></script>
		<script src="/layouts/J_Flex/assets/js/jquery.dropotron.min.js"></script>
		<script src="/layouts/J_Flex/assets/js/jquery.scrollgress.min.js"></script>
		<script src="/layouts/J_Flex/assets/js/skel.min.js"></script>
		<script src="/layouts/J_Flex/assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="/layouts/J_Flex/assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="/layouts/J_Flex/assets/js/main.js"></script>
		<style>
			@media screen and (max-width: 980px) {
				#flexbox{
				margin-top:30%;
				margin-left: 0;
				}
			}
			@media screen and (max-width: 840px) {
				#flexbox{
				margin-top:40%;
				margin-left: 0;
				}
			}
			@media screen and (max-width: 736px) {
				.slide_ul>li{
					padding: 7em 0 0 3em;
				}
				#flexbox{
					margin-top:0;
					padding: 0;
				}
			}
			@media screen and (max-width: 480px) {
				.slide_ul>li{
					padding: 6em 0 0 2em;
				}
				#flexbox{
					margin-top:0;
					padding: 0;
				}
			}	
			</style>
	</body>