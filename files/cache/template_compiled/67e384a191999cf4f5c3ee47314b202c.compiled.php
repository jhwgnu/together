<?php if(!defined("__XE__"))exit;?>/* Colorset */
::-webkit-scrollbar-thumb:hover,
#navbar .navbar-nav > .open > a, #navbar .navbar-nav > .open > a:hover, #navbar .navbar-nav > .open > a:focus,
#navbar .navbar-nav > .active > a, #navbar .navbar-nav > .active > a:hover, #navbar .navbar-nav > .active > a:focus, 
.dropdown-menu .badge,
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus, .dropdown-submenu:hover>a, .dropdown-submenu:focus>a,
.dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus,
.dropdown-submenu>.active>a, .dropdown-submenu>.active>a:hover, .dropdown-submenu>.active>a:focus,
#popup_menu_area a:hover, #popup_menu_area a:active, #popup_menu_area a:focus,
.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus,
.sidebar .list-group-item.active, .sidebar .list-group-item.active:hover, .sidebar .list-group-item.active:focus,
.sidebar .list-group-item:hover, .sidebar .list-group-item:focus,
#jumbotron .btn-lg.btn-default:hover, #jumbotron .btn-lg.btn-default:focus,
#sidebar .list-group-item:hover,
#sidebar .list-group-item:focus{background-color:<?php echo $__Context->colorset_cc ?>;color:#fff}
.sidebar .list-group-item.active, .sidebar .list-group-item.active:hover, .sidebar .list-group-item.active:focus,
.sidebar .list-group-item:hover, .sidebar .list-group-item:focus{background-color:<?php echo $__Context->colorset_cc ?> !important}
.sidebar .list-group-item.active a, .sidebar .list-group-item.active:hover a, .sidebar .list-group-item.active:focus a,
.sidebar .list-group-item:hover a, .sidebar .list-group-item:focus a{color:#fff}
.sidebar .list-group-item:hover a>span[style], .sidebar .list-group-item:focus a>span[style]{color:#fff !important}
#navbar,
.sidebar .list-group-item.active, .sidebar .list-group-item.active:hover, .sidebar .list-group-item.active:focus,
.sidebar .list-group-item:hover, .sidebar .list-group-item:focus,
#sidebar .list-group-item:hover,
#sidebar .list-group-item:focus{border-color:<?php echo $__Context->colorset_cc ?>}
.nav-pills>li>a,
a..list-group-item.active>.badge,
.dropdown-menu>li:hover>a>.badge{color:<?php echo $__Context->colorset_cc ?>}
.nav-pills>li>a>.badge{background-color:<?php echo $__Context->colorset_cc ?>;color:#fff}
.nav-pills>.active>a>.badge{background-color:#fff;color:<?php echo $__Context->colorset_cc ?>}
.form-control:focus{border-color:<?php echo $__Context->colorset_cc ?>;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);box-shadow:inset 0 1px 1px rgba(0,0,0,0.075)}
*:focus{outline-color:<?php echo $__Context->colorset_cc ?>!important}
<?php if($__Context->li->jumbotron == 'N' && $__Context->li->slide_use == 'N' && $__Context->li->navbar_fixed != 'N'){ ?>
body{padding-top:62px}
<?php } ?>
<?php if($__Context->li->navbar_fixed == 'N'){ ?>
body{padding-top:0}
#navbar{margin-bottom:0}
#navbar+#jumbotron, #navbar+#main-carousel{margin-top:0}
<?php } ?>
<?php if($__Context->li->navbar_border_bottom == 'N'){ ?>
#navbar{border-bottom-width: 0}
<?php } ?>
<?php if($__Context->li->navbar_sm_dropdown=='Y'){ ?>
@media(max-width:768px){
	#navbar .navbar-nav>li>.dropdown-menu{display:block;position:static;float:none;width:auto;margin-top:0;background-color:transparent;border:0;box-shadow:none;}
	#navbar .navbar-nav .dropdown-menu>.active>a{color:#fff !important}
	#navbar .navbar-nav .dropdown-menu>li>a{line-height:20px}
	#navbar .navbar-nav .dropdown-menu>li>a,
	#navbar .navbar-nav .dropdown-menu .dropdown-header{padding:5px 15px 5px 25px}
}
<?php } ?>
<?php if($__Context->li->slide_use != 'N' && $__Context->li->slide_img_height){ ?>
#main-carousel .carousel-inner>.item{height:<?php echo $__Context->li->slide_img_height ?>px}
<?php } ?>