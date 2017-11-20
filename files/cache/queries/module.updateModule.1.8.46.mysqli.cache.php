<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateModule");
$query->setAction("update");
$query->setPriority("");

${'module1_argument'} = new Argument('module', $args->{'module'});
${'module1_argument'}->checkNotNull();
if(!${'module1_argument'}->isValid()) return ${'module1_argument'}->getErrorMessage();
if(${'module1_argument'} !== null) ${'module1_argument'}->setColumnType('varchar');
if(isset($args->module_category_srl)) {
${'module_category_srl2_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
if(!${'module_category_srl2_argument'}->isValid()) return ${'module_category_srl2_argument'}->getErrorMessage();
} else
${'module_category_srl2_argument'} = NULL;if(${'module_category_srl2_argument'} !== null) ${'module_category_srl2_argument'}->setColumnType('number');
if(isset($args->layout_srl)) {
${'layout_srl3_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl3_argument'}->isValid()) return ${'layout_srl3_argument'}->getErrorMessage();
} else
${'layout_srl3_argument'} = NULL;if(${'layout_srl3_argument'} !== null) ${'layout_srl3_argument'}->setColumnType('number');
if(isset($args->skin)) {
${'skin4_argument'} = new Argument('skin', $args->{'skin'});
if(!${'skin4_argument'}->isValid()) return ${'skin4_argument'}->getErrorMessage();
} else
${'skin4_argument'} = NULL;if(${'skin4_argument'} !== null) ${'skin4_argument'}->setColumnType('varchar');

${'is_skin_fix5_argument'} = new Argument('is_skin_fix', $args->{'is_skin_fix'});
${'is_skin_fix5_argument'}->ensureDefaultValue('N');
if(!${'is_skin_fix5_argument'}->isValid()) return ${'is_skin_fix5_argument'}->getErrorMessage();
if(${'is_skin_fix5_argument'} !== null) ${'is_skin_fix5_argument'}->setColumnType('char');
if(isset($args->mskin)) {
${'mskin6_argument'} = new Argument('mskin', $args->{'mskin'});
if(!${'mskin6_argument'}->isValid()) return ${'mskin6_argument'}->getErrorMessage();
} else
${'mskin6_argument'} = NULL;if(${'mskin6_argument'} !== null) ${'mskin6_argument'}->setColumnType('varchar');

${'is_mskin_fix7_argument'} = new Argument('is_mskin_fix', $args->{'is_mskin_fix'});
${'is_mskin_fix7_argument'}->ensureDefaultValue('N');
if(!${'is_mskin_fix7_argument'}->isValid()) return ${'is_mskin_fix7_argument'}->getErrorMessage();
if(${'is_mskin_fix7_argument'} !== null) ${'is_mskin_fix7_argument'}->setColumnType('char');
if(isset($args->menu_srl)) {
${'menu_srl8_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl8_argument'}->checkFilter('number');
if(!${'menu_srl8_argument'}->isValid()) return ${'menu_srl8_argument'}->getErrorMessage();
} else
${'menu_srl8_argument'} = NULL;if(${'menu_srl8_argument'} !== null) ${'menu_srl8_argument'}->setColumnType('number');

${'mid9_argument'} = new Argument('mid', $args->{'mid'});
${'mid9_argument'}->checkNotNull();
if(!${'mid9_argument'}->isValid()) return ${'mid9_argument'}->getErrorMessage();
if(${'mid9_argument'} !== null) ${'mid9_argument'}->setColumnType('varchar');

${'browser_title10_argument'} = new Argument('browser_title', $args->{'browser_title'});
${'browser_title10_argument'}->checkNotNull();
if(!${'browser_title10_argument'}->isValid()) return ${'browser_title10_argument'}->getErrorMessage();
if(${'browser_title10_argument'} !== null) ${'browser_title10_argument'}->setColumnType('varchar');

${'description11_argument'} = new Argument('description', $args->{'description'});
${'description11_argument'}->ensureDefaultValue('');
if(!${'description11_argument'}->isValid()) return ${'description11_argument'}->getErrorMessage();
if(${'description11_argument'} !== null) ${'description11_argument'}->setColumnType('text');

${'is_default12_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default12_argument'}->ensureDefaultValue('N');
${'is_default12_argument'}->checkNotNull();
if(!${'is_default12_argument'}->isValid()) return ${'is_default12_argument'}->getErrorMessage();
if(${'is_default12_argument'} !== null) ${'is_default12_argument'}->setColumnType('char');
if(isset($args->content)) {
${'content13_argument'} = new Argument('content', $args->{'content'});
if(!${'content13_argument'}->isValid()) return ${'content13_argument'}->getErrorMessage();
} else
${'content13_argument'} = NULL;if(${'content13_argument'} !== null) ${'content13_argument'}->setColumnType('bigtext');
if(isset($args->mcontent)) {
${'mcontent14_argument'} = new Argument('mcontent', $args->{'mcontent'});
if(!${'mcontent14_argument'}->isValid()) return ${'mcontent14_argument'}->getErrorMessage();
} else
${'mcontent14_argument'} = NULL;if(${'mcontent14_argument'} !== null) ${'mcontent14_argument'}->setColumnType('bigtext');

${'open_rss15_argument'} = new Argument('open_rss', $args->{'open_rss'});
${'open_rss15_argument'}->ensureDefaultValue('Y');
${'open_rss15_argument'}->checkNotNull();
if(!${'open_rss15_argument'}->isValid()) return ${'open_rss15_argument'}->getErrorMessage();
if(${'open_rss15_argument'} !== null) ${'open_rss15_argument'}->setColumnType('char');

${'header_text16_argument'} = new Argument('header_text', $args->{'header_text'});
${'header_text16_argument'}->ensureDefaultValue('');
if(!${'header_text16_argument'}->isValid()) return ${'header_text16_argument'}->getErrorMessage();
if(${'header_text16_argument'} !== null) ${'header_text16_argument'}->setColumnType('text');

${'footer_text17_argument'} = new Argument('footer_text', $args->{'footer_text'});
${'footer_text17_argument'}->ensureDefaultValue('');
if(!${'footer_text17_argument'}->isValid()) return ${'footer_text17_argument'}->getErrorMessage();
if(${'footer_text17_argument'} !== null) ${'footer_text17_argument'}->setColumnType('text');
if(isset($args->mlayout_srl)) {
${'mlayout_srl18_argument'} = new Argument('mlayout_srl', $args->{'mlayout_srl'});
if(!${'mlayout_srl18_argument'}->isValid()) return ${'mlayout_srl18_argument'}->getErrorMessage();
} else
${'mlayout_srl18_argument'} = NULL;if(${'mlayout_srl18_argument'} !== null) ${'mlayout_srl18_argument'}->setColumnType('number');

${'use_mobile19_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
${'use_mobile19_argument'}->ensureDefaultValue('N');
if(!${'use_mobile19_argument'}->isValid()) return ${'use_mobile19_argument'}->getErrorMessage();
if(${'use_mobile19_argument'} !== null) ${'use_mobile19_argument'}->setColumnType('char');

${'site_srl20_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl20_argument'}->checkFilter('number');
${'site_srl20_argument'}->ensureDefaultValue('0');
${'site_srl20_argument'}->checkNotNull();
${'site_srl20_argument'}->createConditionValue();
if(!${'site_srl20_argument'}->isValid()) return ${'site_srl20_argument'}->getErrorMessage();
if(${'site_srl20_argument'} !== null) ${'site_srl20_argument'}->setColumnType('number');

${'module_srl21_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl21_argument'}->checkFilter('number');
${'module_srl21_argument'}->checkNotNull();
${'module_srl21_argument'}->createConditionValue();
if(!${'module_srl21_argument'}->isValid()) return ${'module_srl21_argument'}->getErrorMessage();
if(${'module_srl21_argument'} !== null) ${'module_srl21_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`module`', ${'module1_argument'})
,new UpdateExpression('`module_category_srl`', ${'module_category_srl2_argument'})
,new UpdateExpression('`layout_srl`', ${'layout_srl3_argument'})
,new UpdateExpression('`skin`', ${'skin4_argument'})
,new UpdateExpression('`is_skin_fix`', ${'is_skin_fix5_argument'})
,new UpdateExpression('`mskin`', ${'mskin6_argument'})
,new UpdateExpression('`is_mskin_fix`', ${'is_mskin_fix7_argument'})
,new UpdateExpression('`menu_srl`', ${'menu_srl8_argument'})
,new UpdateExpression('`mid`', ${'mid9_argument'})
,new UpdateExpression('`browser_title`', ${'browser_title10_argument'})
,new UpdateExpression('`description`', ${'description11_argument'})
,new UpdateExpression('`is_default`', ${'is_default12_argument'})
,new UpdateExpression('`content`', ${'content13_argument'})
,new UpdateExpression('`mcontent`', ${'mcontent14_argument'})
,new UpdateExpression('`open_rss`', ${'open_rss15_argument'})
,new UpdateExpression('`header_text`', ${'header_text16_argument'})
,new UpdateExpression('`footer_text`', ${'footer_text17_argument'})
,new UpdateExpression('`mlayout_srl`', ${'mlayout_srl18_argument'})
,new UpdateExpression('`use_mobile`', ${'use_mobile19_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl20_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl21_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>