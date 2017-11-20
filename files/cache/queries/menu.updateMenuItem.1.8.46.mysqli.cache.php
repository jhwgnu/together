<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMenuItem");
$query->setAction("update");
$query->setPriority("");
if(isset($args->menu_srl)) {
${'menu_srl22_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
if(!${'menu_srl22_argument'}->isValid()) return ${'menu_srl22_argument'}->getErrorMessage();
} else
${'menu_srl22_argument'} = NULL;if(${'menu_srl22_argument'} !== null) ${'menu_srl22_argument'}->setColumnType('number');
if(isset($args->parent_srl)) {
${'parent_srl23_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
if(!${'parent_srl23_argument'}->isValid()) return ${'parent_srl23_argument'}->getErrorMessage();
} else
${'parent_srl23_argument'} = NULL;if(${'parent_srl23_argument'} !== null) ${'parent_srl23_argument'}->setColumnType('number');
if(isset($args->name)) {
${'name24_argument'} = new Argument('name', $args->{'name'});
if(!${'name24_argument'}->isValid()) return ${'name24_argument'}->getErrorMessage();
} else
${'name24_argument'} = NULL;if(${'name24_argument'} !== null) ${'name24_argument'}->setColumnType('text');
if(isset($args->desc)) {
${'desc25_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc25_argument'}->isValid()) return ${'desc25_argument'}->getErrorMessage();
} else
${'desc25_argument'} = NULL;if(${'desc25_argument'} !== null) ${'desc25_argument'}->setColumnType('varchar');
if(isset($args->url)) {
${'url26_argument'} = new Argument('url', $args->{'url'});
if(!${'url26_argument'}->isValid()) return ${'url26_argument'}->getErrorMessage();
} else
${'url26_argument'} = NULL;if(${'url26_argument'} !== null) ${'url26_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut27_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
if(!${'is_shortcut27_argument'}->isValid()) return ${'is_shortcut27_argument'}->getErrorMessage();
} else
${'is_shortcut27_argument'} = NULL;if(${'is_shortcut27_argument'} !== null) ${'is_shortcut27_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window28_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window28_argument'}->isValid()) return ${'open_window28_argument'}->getErrorMessage();
} else
${'open_window28_argument'} = NULL;if(${'open_window28_argument'} !== null) ${'open_window28_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand29_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand29_argument'}->isValid()) return ${'expand29_argument'}->getErrorMessage();
} else
${'expand29_argument'} = NULL;if(${'expand29_argument'} !== null) ${'expand29_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn30_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn30_argument'}->isValid()) return ${'normal_btn30_argument'}->getErrorMessage();
} else
${'normal_btn30_argument'} = NULL;if(${'normal_btn30_argument'} !== null) ${'normal_btn30_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn31_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn31_argument'}->isValid()) return ${'hover_btn31_argument'}->getErrorMessage();
} else
${'hover_btn31_argument'} = NULL;if(${'hover_btn31_argument'} !== null) ${'hover_btn31_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn32_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn32_argument'}->isValid()) return ${'active_btn32_argument'}->getErrorMessage();
} else
${'active_btn32_argument'} = NULL;if(${'active_btn32_argument'} !== null) ${'active_btn32_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls33_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls33_argument'}->isValid()) return ${'group_srls33_argument'}->getErrorMessage();
} else
${'group_srls33_argument'} = NULL;if(${'group_srls33_argument'} !== null) ${'group_srls33_argument'}->setColumnType('text');

${'menu_item_srl34_argument'} = new ConditionArgument('menu_item_srl', $args->menu_item_srl, 'equal');
${'menu_item_srl34_argument'}->checkFilter('number');
${'menu_item_srl34_argument'}->checkNotNull();
${'menu_item_srl34_argument'}->createConditionValue();
if(!${'menu_item_srl34_argument'}->isValid()) return ${'menu_item_srl34_argument'}->getErrorMessage();
if(${'menu_item_srl34_argument'} !== null) ${'menu_item_srl34_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`menu_srl`', ${'menu_srl22_argument'})
,new UpdateExpression('`parent_srl`', ${'parent_srl23_argument'})
,new UpdateExpression('`name`', ${'name24_argument'})
,new UpdateExpression('`desc`', ${'desc25_argument'})
,new UpdateExpression('`url`', ${'url26_argument'})
,new UpdateExpression('`is_shortcut`', ${'is_shortcut27_argument'})
,new UpdateExpression('`open_window`', ${'open_window28_argument'})
,new UpdateExpression('`expand`', ${'expand29_argument'})
,new UpdateExpression('`normal_btn`', ${'normal_btn30_argument'})
,new UpdateExpression('`hover_btn`', ${'hover_btn31_argument'})
,new UpdateExpression('`active_btn`', ${'active_btn32_argument'})
,new UpdateExpression('`group_srls`', ${'group_srls33_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_item_srl`',$menu_item_srl34_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>