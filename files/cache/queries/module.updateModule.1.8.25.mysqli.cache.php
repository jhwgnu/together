<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateModule");
$query->setAction("update");
$query->setPriority("");

${'module252_argument'} = new Argument('module', $args->{'module'});
${'module252_argument'}->checkNotNull();
if(!${'module252_argument'}->isValid()) return ${'module252_argument'}->getErrorMessage();
if(${'module252_argument'} !== null) ${'module252_argument'}->setColumnType('varchar');
if(isset($args->module_category_srl)) {
${'module_category_srl253_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
if(!${'module_category_srl253_argument'}->isValid()) return ${'module_category_srl253_argument'}->getErrorMessage();
} else
${'module_category_srl253_argument'} = NULL;if(${'module_category_srl253_argument'} !== null) ${'module_category_srl253_argument'}->setColumnType('number');
if(isset($args->layout_srl)) {
${'layout_srl254_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl254_argument'}->isValid()) return ${'layout_srl254_argument'}->getErrorMessage();
} else
${'layout_srl254_argument'} = NULL;if(${'layout_srl254_argument'} !== null) ${'layout_srl254_argument'}->setColumnType('number');
if(isset($args->skin)) {
${'skin255_argument'} = new Argument('skin', $args->{'skin'});
if(!${'skin255_argument'}->isValid()) return ${'skin255_argument'}->getErrorMessage();
} else
${'skin255_argument'} = NULL;if(${'skin255_argument'} !== null) ${'skin255_argument'}->setColumnType('varchar');

${'is_skin_fix256_argument'} = new Argument('is_skin_fix', $args->{'is_skin_fix'});
${'is_skin_fix256_argument'}->ensureDefaultValue('N');
if(!${'is_skin_fix256_argument'}->isValid()) return ${'is_skin_fix256_argument'}->getErrorMessage();
if(${'is_skin_fix256_argument'} !== null) ${'is_skin_fix256_argument'}->setColumnType('char');
if(isset($args->mskin)) {
${'mskin257_argument'} = new Argument('mskin', $args->{'mskin'});
if(!${'mskin257_argument'}->isValid()) return ${'mskin257_argument'}->getErrorMessage();
} else
${'mskin257_argument'} = NULL;if(${'mskin257_argument'} !== null) ${'mskin257_argument'}->setColumnType('varchar');

${'is_mskin_fix258_argument'} = new Argument('is_mskin_fix', $args->{'is_mskin_fix'});
${'is_mskin_fix258_argument'}->ensureDefaultValue('N');
if(!${'is_mskin_fix258_argument'}->isValid()) return ${'is_mskin_fix258_argument'}->getErrorMessage();
if(${'is_mskin_fix258_argument'} !== null) ${'is_mskin_fix258_argument'}->setColumnType('char');
if(isset($args->menu_srl)) {
${'menu_srl259_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl259_argument'}->checkFilter('number');
if(!${'menu_srl259_argument'}->isValid()) return ${'menu_srl259_argument'}->getErrorMessage();
} else
${'menu_srl259_argument'} = NULL;if(${'menu_srl259_argument'} !== null) ${'menu_srl259_argument'}->setColumnType('number');

${'mid260_argument'} = new Argument('mid', $args->{'mid'});
${'mid260_argument'}->checkNotNull();
if(!${'mid260_argument'}->isValid()) return ${'mid260_argument'}->getErrorMessage();
if(${'mid260_argument'} !== null) ${'mid260_argument'}->setColumnType('varchar');

${'browser_title261_argument'} = new Argument('browser_title', $args->{'browser_title'});
${'browser_title261_argument'}->checkNotNull();
if(!${'browser_title261_argument'}->isValid()) return ${'browser_title261_argument'}->getErrorMessage();
if(${'browser_title261_argument'} !== null) ${'browser_title261_argument'}->setColumnType('varchar');

${'description262_argument'} = new Argument('description', $args->{'description'});
${'description262_argument'}->ensureDefaultValue('');
if(!${'description262_argument'}->isValid()) return ${'description262_argument'}->getErrorMessage();
if(${'description262_argument'} !== null) ${'description262_argument'}->setColumnType('text');

${'is_default263_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default263_argument'}->ensureDefaultValue('N');
${'is_default263_argument'}->checkNotNull();
if(!${'is_default263_argument'}->isValid()) return ${'is_default263_argument'}->getErrorMessage();
if(${'is_default263_argument'} !== null) ${'is_default263_argument'}->setColumnType('char');
if(isset($args->content)) {
${'content264_argument'} = new Argument('content', $args->{'content'});
if(!${'content264_argument'}->isValid()) return ${'content264_argument'}->getErrorMessage();
} else
${'content264_argument'} = NULL;if(${'content264_argument'} !== null) ${'content264_argument'}->setColumnType('bigtext');
if(isset($args->mcontent)) {
${'mcontent265_argument'} = new Argument('mcontent', $args->{'mcontent'});
if(!${'mcontent265_argument'}->isValid()) return ${'mcontent265_argument'}->getErrorMessage();
} else
${'mcontent265_argument'} = NULL;if(${'mcontent265_argument'} !== null) ${'mcontent265_argument'}->setColumnType('bigtext');

${'open_rss266_argument'} = new Argument('open_rss', $args->{'open_rss'});
${'open_rss266_argument'}->ensureDefaultValue('Y');
${'open_rss266_argument'}->checkNotNull();
if(!${'open_rss266_argument'}->isValid()) return ${'open_rss266_argument'}->getErrorMessage();
if(${'open_rss266_argument'} !== null) ${'open_rss266_argument'}->setColumnType('char');

${'header_text267_argument'} = new Argument('header_text', $args->{'header_text'});
${'header_text267_argument'}->ensureDefaultValue('');
if(!${'header_text267_argument'}->isValid()) return ${'header_text267_argument'}->getErrorMessage();
if(${'header_text267_argument'} !== null) ${'header_text267_argument'}->setColumnType('text');

${'footer_text268_argument'} = new Argument('footer_text', $args->{'footer_text'});
${'footer_text268_argument'}->ensureDefaultValue('');
if(!${'footer_text268_argument'}->isValid()) return ${'footer_text268_argument'}->getErrorMessage();
if(${'footer_text268_argument'} !== null) ${'footer_text268_argument'}->setColumnType('text');
if(isset($args->mlayout_srl)) {
${'mlayout_srl269_argument'} = new Argument('mlayout_srl', $args->{'mlayout_srl'});
if(!${'mlayout_srl269_argument'}->isValid()) return ${'mlayout_srl269_argument'}->getErrorMessage();
} else
${'mlayout_srl269_argument'} = NULL;if(${'mlayout_srl269_argument'} !== null) ${'mlayout_srl269_argument'}->setColumnType('number');

${'use_mobile270_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
${'use_mobile270_argument'}->ensureDefaultValue('N');
if(!${'use_mobile270_argument'}->isValid()) return ${'use_mobile270_argument'}->getErrorMessage();
if(${'use_mobile270_argument'} !== null) ${'use_mobile270_argument'}->setColumnType('char');

${'site_srl271_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl271_argument'}->checkFilter('number');
${'site_srl271_argument'}->ensureDefaultValue('0');
${'site_srl271_argument'}->checkNotNull();
${'site_srl271_argument'}->createConditionValue();
if(!${'site_srl271_argument'}->isValid()) return ${'site_srl271_argument'}->getErrorMessage();
if(${'site_srl271_argument'} !== null) ${'site_srl271_argument'}->setColumnType('number');

${'module_srl272_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl272_argument'}->checkFilter('number');
${'module_srl272_argument'}->checkNotNull();
${'module_srl272_argument'}->createConditionValue();
if(!${'module_srl272_argument'}->isValid()) return ${'module_srl272_argument'}->getErrorMessage();
if(${'module_srl272_argument'} !== null) ${'module_srl272_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`module`', ${'module252_argument'})
,new UpdateExpression('`module_category_srl`', ${'module_category_srl253_argument'})
,new UpdateExpression('`layout_srl`', ${'layout_srl254_argument'})
,new UpdateExpression('`skin`', ${'skin255_argument'})
,new UpdateExpression('`is_skin_fix`', ${'is_skin_fix256_argument'})
,new UpdateExpression('`mskin`', ${'mskin257_argument'})
,new UpdateExpression('`is_mskin_fix`', ${'is_mskin_fix258_argument'})
,new UpdateExpression('`menu_srl`', ${'menu_srl259_argument'})
,new UpdateExpression('`mid`', ${'mid260_argument'})
,new UpdateExpression('`browser_title`', ${'browser_title261_argument'})
,new UpdateExpression('`description`', ${'description262_argument'})
,new UpdateExpression('`is_default`', ${'is_default263_argument'})
,new UpdateExpression('`content`', ${'content264_argument'})
,new UpdateExpression('`mcontent`', ${'mcontent265_argument'})
,new UpdateExpression('`open_rss`', ${'open_rss266_argument'})
,new UpdateExpression('`header_text`', ${'header_text267_argument'})
,new UpdateExpression('`footer_text`', ${'footer_text268_argument'})
,new UpdateExpression('`mlayout_srl`', ${'mlayout_srl269_argument'})
,new UpdateExpression('`use_mobile`', ${'use_mobile270_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl271_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl272_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>