<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModule");
$query->setAction("insert");
$query->setPriority("");

${'site_srl159_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl159_argument'}->ensureDefaultValue('0');
${'site_srl159_argument'}->checkNotNull();
if(!${'site_srl159_argument'}->isValid()) return ${'site_srl159_argument'}->getErrorMessage();
if(${'site_srl159_argument'} !== null) ${'site_srl159_argument'}->setColumnType('number');

${'module_srl160_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl160_argument'}->checkNotNull();
if(!${'module_srl160_argument'}->isValid()) return ${'module_srl160_argument'}->getErrorMessage();
if(${'module_srl160_argument'} !== null) ${'module_srl160_argument'}->setColumnType('number');

${'module_category_srl161_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
${'module_category_srl161_argument'}->ensureDefaultValue('0');
if(!${'module_category_srl161_argument'}->isValid()) return ${'module_category_srl161_argument'}->getErrorMessage();
if(${'module_category_srl161_argument'} !== null) ${'module_category_srl161_argument'}->setColumnType('number');

${'mid162_argument'} = new Argument('mid', $args->{'mid'});
${'mid162_argument'}->checkNotNull();
if(!${'mid162_argument'}->isValid()) return ${'mid162_argument'}->getErrorMessage();
if(${'mid162_argument'} !== null) ${'mid162_argument'}->setColumnType('varchar');
if(isset($args->skin)) {
${'skin163_argument'} = new Argument('skin', $args->{'skin'});
if(!${'skin163_argument'}->isValid()) return ${'skin163_argument'}->getErrorMessage();
} else
${'skin163_argument'} = NULL;if(${'skin163_argument'} !== null) ${'skin163_argument'}->setColumnType('varchar');

${'is_skin_fix164_argument'} = new Argument('is_skin_fix', $args->{'is_skin_fix'});
${'is_skin_fix164_argument'}->ensureDefaultValue('N');
if(!${'is_skin_fix164_argument'}->isValid()) return ${'is_skin_fix164_argument'}->getErrorMessage();
if(${'is_skin_fix164_argument'} !== null) ${'is_skin_fix164_argument'}->setColumnType('char');

${'is_mskin_fix165_argument'} = new Argument('is_mskin_fix', $args->{'is_mskin_fix'});
${'is_mskin_fix165_argument'}->ensureDefaultValue('N');
if(!${'is_mskin_fix165_argument'}->isValid()) return ${'is_mskin_fix165_argument'}->getErrorMessage();
if(${'is_mskin_fix165_argument'} !== null) ${'is_mskin_fix165_argument'}->setColumnType('char');
if(isset($args->mskin)) {
${'mskin166_argument'} = new Argument('mskin', $args->{'mskin'});
if(!${'mskin166_argument'}->isValid()) return ${'mskin166_argument'}->getErrorMessage();
} else
${'mskin166_argument'} = NULL;if(${'mskin166_argument'} !== null) ${'mskin166_argument'}->setColumnType('varchar');

${'browser_title167_argument'} = new Argument('browser_title', $args->{'browser_title'});
${'browser_title167_argument'}->checkNotNull();
if(!${'browser_title167_argument'}->isValid()) return ${'browser_title167_argument'}->getErrorMessage();
if(${'browser_title167_argument'} !== null) ${'browser_title167_argument'}->setColumnType('varchar');
if(isset($args->layout_srl)) {
${'layout_srl168_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl168_argument'}->isValid()) return ${'layout_srl168_argument'}->getErrorMessage();
} else
${'layout_srl168_argument'} = NULL;if(${'layout_srl168_argument'} !== null) ${'layout_srl168_argument'}->setColumnType('number');
if(isset($args->description)) {
${'description169_argument'} = new Argument('description', $args->{'description'});
if(!${'description169_argument'}->isValid()) return ${'description169_argument'}->getErrorMessage();
} else
${'description169_argument'} = NULL;if(${'description169_argument'} !== null) ${'description169_argument'}->setColumnType('text');
if(isset($args->content)) {
${'content170_argument'} = new Argument('content', $args->{'content'});
if(!${'content170_argument'}->isValid()) return ${'content170_argument'}->getErrorMessage();
} else
${'content170_argument'} = NULL;if(${'content170_argument'} !== null) ${'content170_argument'}->setColumnType('bigtext');
if(isset($args->mcontent)) {
${'mcontent171_argument'} = new Argument('mcontent', $args->{'mcontent'});
if(!${'mcontent171_argument'}->isValid()) return ${'mcontent171_argument'}->getErrorMessage();
} else
${'mcontent171_argument'} = NULL;if(${'mcontent171_argument'} !== null) ${'mcontent171_argument'}->setColumnType('bigtext');

${'module172_argument'} = new Argument('module', $args->{'module'});
${'module172_argument'}->checkNotNull();
if(!${'module172_argument'}->isValid()) return ${'module172_argument'}->getErrorMessage();
if(${'module172_argument'} !== null) ${'module172_argument'}->setColumnType('varchar');

${'is_default173_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default173_argument'}->ensureDefaultValue('N');
${'is_default173_argument'}->checkNotNull();
if(!${'is_default173_argument'}->isValid()) return ${'is_default173_argument'}->getErrorMessage();
if(${'is_default173_argument'} !== null) ${'is_default173_argument'}->setColumnType('char');
if(isset($args->menu_srl)) {
${'menu_srl174_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl174_argument'}->checkFilter('number');
if(!${'menu_srl174_argument'}->isValid()) return ${'menu_srl174_argument'}->getErrorMessage();
} else
${'menu_srl174_argument'} = NULL;if(${'menu_srl174_argument'} !== null) ${'menu_srl174_argument'}->setColumnType('number');

${'open_rss175_argument'} = new Argument('open_rss', $args->{'open_rss'});
${'open_rss175_argument'}->ensureDefaultValue('Y');
${'open_rss175_argument'}->checkNotNull();
if(!${'open_rss175_argument'}->isValid()) return ${'open_rss175_argument'}->getErrorMessage();
if(${'open_rss175_argument'} !== null) ${'open_rss175_argument'}->setColumnType('char');
if(isset($args->header_text)) {
${'header_text176_argument'} = new Argument('header_text', $args->{'header_text'});
if(!${'header_text176_argument'}->isValid()) return ${'header_text176_argument'}->getErrorMessage();
} else
${'header_text176_argument'} = NULL;if(${'header_text176_argument'} !== null) ${'header_text176_argument'}->setColumnType('text');
if(isset($args->footer_text)) {
${'footer_text177_argument'} = new Argument('footer_text', $args->{'footer_text'});
if(!${'footer_text177_argument'}->isValid()) return ${'footer_text177_argument'}->getErrorMessage();
} else
${'footer_text177_argument'} = NULL;if(${'footer_text177_argument'} !== null) ${'footer_text177_argument'}->setColumnType('text');

${'regdate178_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate178_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate178_argument'}->isValid()) return ${'regdate178_argument'}->getErrorMessage();
if(${'regdate178_argument'} !== null) ${'regdate178_argument'}->setColumnType('date');
if(isset($args->mlayout_srl)) {
${'mlayout_srl179_argument'} = new Argument('mlayout_srl', $args->{'mlayout_srl'});
if(!${'mlayout_srl179_argument'}->isValid()) return ${'mlayout_srl179_argument'}->getErrorMessage();
} else
${'mlayout_srl179_argument'} = NULL;if(${'mlayout_srl179_argument'} !== null) ${'mlayout_srl179_argument'}->setColumnType('number');

${'use_mobile180_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
${'use_mobile180_argument'}->ensureDefaultValue('N');
if(!${'use_mobile180_argument'}->isValid()) return ${'use_mobile180_argument'}->getErrorMessage();
if(${'use_mobile180_argument'} !== null) ${'use_mobile180_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl159_argument'})
,new InsertExpression('`module_srl`', ${'module_srl160_argument'})
,new InsertExpression('`module_category_srl`', ${'module_category_srl161_argument'})
,new InsertExpression('`mid`', ${'mid162_argument'})
,new InsertExpression('`skin`', ${'skin163_argument'})
,new InsertExpression('`is_skin_fix`', ${'is_skin_fix164_argument'})
,new InsertExpression('`is_mskin_fix`', ${'is_mskin_fix165_argument'})
,new InsertExpression('`mskin`', ${'mskin166_argument'})
,new InsertExpression('`browser_title`', ${'browser_title167_argument'})
,new InsertExpression('`layout_srl`', ${'layout_srl168_argument'})
,new InsertExpression('`description`', ${'description169_argument'})
,new InsertExpression('`content`', ${'content170_argument'})
,new InsertExpression('`mcontent`', ${'mcontent171_argument'})
,new InsertExpression('`module`', ${'module172_argument'})
,new InsertExpression('`is_default`', ${'is_default173_argument'})
,new InsertExpression('`menu_srl`', ${'menu_srl174_argument'})
,new InsertExpression('`open_rss`', ${'open_rss175_argument'})
,new InsertExpression('`header_text`', ${'header_text176_argument'})
,new InsertExpression('`footer_text`', ${'footer_text177_argument'})
,new InsertExpression('`regdate`', ${'regdate178_argument'})
,new InsertExpression('`mlayout_srl`', ${'mlayout_srl179_argument'})
,new InsertExpression('`use_mobile`', ${'use_mobile180_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>