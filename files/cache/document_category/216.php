<?php if(!defined("__XE__")) exit(); $lang_type = Context::getLangType(); $is_logged = Context::get('is_logged'); $logged_info = Context::get('logged_info'); if($is_logged) {if($logged_info->is_admin=="Y") $is_admin = true; else $is_admin = false; $group_srls = array_keys($logged_info->group_list); } else { $is_admin = false; $group_srsl = array(); } 
$_titles = array();$_descriptions = array();$_titles[248]["ko"] = "양자물리학"; $_descriptions[248]["ko"] = ""; $_titles[249]["ko"] = "상대성이론"; $_descriptions[249]["ko"] = ""; $menu = new stdClass;$menu->list = array(248=>array("mid" => "board_aaRJ81", "module_srl" => "216","node_srl"=>"248","category_srl"=>"248","parent_srl"=>"0","text"=>$_titles[248][$lang_type],"selected"=>(in_array(Context::get("category"),array("248"))?1:0),"expand"=>"N","color"=>"","description"=>$_descriptions[248][$lang_type],"list"=>array(),"document_count"=>"0","grant"=>true?true:false),249=>array("mid" => "board_aaRJ81", "module_srl" => "216","node_srl"=>"249","category_srl"=>"249","parent_srl"=>"0","text"=>$_titles[249][$lang_type],"selected"=>(in_array(Context::get("category"),array("249"))?1:0),"expand"=>"N","color"=>"","description"=>$_descriptions[249][$lang_type],"list"=>array(),"document_count"=>"0","grant"=>true?true:false),); 