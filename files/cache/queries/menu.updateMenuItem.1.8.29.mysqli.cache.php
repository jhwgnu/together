<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMenuItem");
$query->setAction("update");
$query->setPriority("");
if(isset($args->menu_srl)) {
${'menu_srl1_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
if(!${'menu_srl1_argument'}->isValid()) return ${'menu_srl1_argument'}->getErrorMessage();
} else
${'menu_srl1_argument'} = NULL;if(${'menu_srl1_argument'} !== null) ${'menu_srl1_argument'}->setColumnType('number');
if(isset($args->parent_srl)) {
${'parent_srl2_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
if(!${'parent_srl2_argument'}->isValid()) return ${'parent_srl2_argument'}->getErrorMessage();
} else
${'parent_srl2_argument'} = NULL;if(${'parent_srl2_argument'} !== null) ${'parent_srl2_argument'}->setColumnType('number');
if(isset($args->name)) {
${'name3_argument'} = new Argument('name', $args->{'name'});
if(!${'name3_argument'}->isValid()) return ${'name3_argument'}->getErrorMessage();
} else
${'name3_argument'} = NULL;if(${'name3_argument'} !== null) ${'name3_argument'}->setColumnType('text');
if(isset($args->desc)) {
${'desc4_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc4_argument'}->isValid()) return ${'desc4_argument'}->getErrorMessage();
} else
${'desc4_argument'} = NULL;if(${'desc4_argument'} !== null) ${'desc4_argument'}->setColumnType('varchar');
if(isset($args->url)) {
${'url5_argument'} = new Argument('url', $args->{'url'});
if(!${'url5_argument'}->isValid()) return ${'url5_argument'}->getErrorMessage();
} else
${'url5_argument'} = NULL;if(${'url5_argument'} !== null) ${'url5_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut6_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
if(!${'is_shortcut6_argument'}->isValid()) return ${'is_shortcut6_argument'}->getErrorMessage();
} else
${'is_shortcut6_argument'} = NULL;if(${'is_shortcut6_argument'} !== null) ${'is_shortcut6_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window7_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window7_argument'}->isValid()) return ${'open_window7_argument'}->getErrorMessage();
} else
${'open_window7_argument'} = NULL;if(${'open_window7_argument'} !== null) ${'open_window7_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand8_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand8_argument'}->isValid()) return ${'expand8_argument'}->getErrorMessage();
} else
${'expand8_argument'} = NULL;if(${'expand8_argument'} !== null) ${'expand8_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn9_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn9_argument'}->isValid()) return ${'normal_btn9_argument'}->getErrorMessage();
} else
${'normal_btn9_argument'} = NULL;if(${'normal_btn9_argument'} !== null) ${'normal_btn9_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn10_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn10_argument'}->isValid()) return ${'hover_btn10_argument'}->getErrorMessage();
} else
${'hover_btn10_argument'} = NULL;if(${'hover_btn10_argument'} !== null) ${'hover_btn10_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn11_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn11_argument'}->isValid()) return ${'active_btn11_argument'}->getErrorMessage();
} else
${'active_btn11_argument'} = NULL;if(${'active_btn11_argument'} !== null) ${'active_btn11_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls12_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls12_argument'}->isValid()) return ${'group_srls12_argument'}->getErrorMessage();
} else
${'group_srls12_argument'} = NULL;if(${'group_srls12_argument'} !== null) ${'group_srls12_argument'}->setColumnType('text');

${'menu_item_srl13_argument'} = new ConditionArgument('menu_item_srl', $args->menu_item_srl, 'equal');
${'menu_item_srl13_argument'}->checkFilter('number');
${'menu_item_srl13_argument'}->checkNotNull();
${'menu_item_srl13_argument'}->createConditionValue();
if(!${'menu_item_srl13_argument'}->isValid()) return ${'menu_item_srl13_argument'}->getErrorMessage();
if(${'menu_item_srl13_argument'} !== null) ${'menu_item_srl13_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`menu_srl`', ${'menu_srl1_argument'})
,new UpdateExpression('`parent_srl`', ${'parent_srl2_argument'})
,new UpdateExpression('`name`', ${'name3_argument'})
,new UpdateExpression('`desc`', ${'desc4_argument'})
,new UpdateExpression('`url`', ${'url5_argument'})
,new UpdateExpression('`is_shortcut`', ${'is_shortcut6_argument'})
,new UpdateExpression('`open_window`', ${'open_window7_argument'})
,new UpdateExpression('`expand`', ${'expand8_argument'})
,new UpdateExpression('`normal_btn`', ${'normal_btn9_argument'})
,new UpdateExpression('`hover_btn`', ${'hover_btn10_argument'})
,new UpdateExpression('`active_btn`', ${'active_btn11_argument'})
,new UpdateExpression('`group_srls`', ${'group_srls12_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_item_srl`',$menu_item_srl13_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>