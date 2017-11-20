<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMenuItem");
$query->setAction("update");
$query->setPriority("");
if(isset($args->menu_srl)) {
${'menu_srl276_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
if(!${'menu_srl276_argument'}->isValid()) return ${'menu_srl276_argument'}->getErrorMessage();
} else
${'menu_srl276_argument'} = NULL;if(${'menu_srl276_argument'} !== null) ${'menu_srl276_argument'}->setColumnType('number');
if(isset($args->parent_srl)) {
${'parent_srl277_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
if(!${'parent_srl277_argument'}->isValid()) return ${'parent_srl277_argument'}->getErrorMessage();
} else
${'parent_srl277_argument'} = NULL;if(${'parent_srl277_argument'} !== null) ${'parent_srl277_argument'}->setColumnType('number');
if(isset($args->name)) {
${'name278_argument'} = new Argument('name', $args->{'name'});
if(!${'name278_argument'}->isValid()) return ${'name278_argument'}->getErrorMessage();
} else
${'name278_argument'} = NULL;if(${'name278_argument'} !== null) ${'name278_argument'}->setColumnType('text');
if(isset($args->desc)) {
${'desc279_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc279_argument'}->isValid()) return ${'desc279_argument'}->getErrorMessage();
} else
${'desc279_argument'} = NULL;if(${'desc279_argument'} !== null) ${'desc279_argument'}->setColumnType('varchar');
if(isset($args->url)) {
${'url280_argument'} = new Argument('url', $args->{'url'});
if(!${'url280_argument'}->isValid()) return ${'url280_argument'}->getErrorMessage();
} else
${'url280_argument'} = NULL;if(${'url280_argument'} !== null) ${'url280_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut281_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
if(!${'is_shortcut281_argument'}->isValid()) return ${'is_shortcut281_argument'}->getErrorMessage();
} else
${'is_shortcut281_argument'} = NULL;if(${'is_shortcut281_argument'} !== null) ${'is_shortcut281_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window282_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window282_argument'}->isValid()) return ${'open_window282_argument'}->getErrorMessage();
} else
${'open_window282_argument'} = NULL;if(${'open_window282_argument'} !== null) ${'open_window282_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand283_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand283_argument'}->isValid()) return ${'expand283_argument'}->getErrorMessage();
} else
${'expand283_argument'} = NULL;if(${'expand283_argument'} !== null) ${'expand283_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn284_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn284_argument'}->isValid()) return ${'normal_btn284_argument'}->getErrorMessage();
} else
${'normal_btn284_argument'} = NULL;if(${'normal_btn284_argument'} !== null) ${'normal_btn284_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn285_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn285_argument'}->isValid()) return ${'hover_btn285_argument'}->getErrorMessage();
} else
${'hover_btn285_argument'} = NULL;if(${'hover_btn285_argument'} !== null) ${'hover_btn285_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn286_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn286_argument'}->isValid()) return ${'active_btn286_argument'}->getErrorMessage();
} else
${'active_btn286_argument'} = NULL;if(${'active_btn286_argument'} !== null) ${'active_btn286_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls287_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls287_argument'}->isValid()) return ${'group_srls287_argument'}->getErrorMessage();
} else
${'group_srls287_argument'} = NULL;if(${'group_srls287_argument'} !== null) ${'group_srls287_argument'}->setColumnType('text');

${'menu_item_srl288_argument'} = new ConditionArgument('menu_item_srl', $args->menu_item_srl, 'equal');
${'menu_item_srl288_argument'}->checkFilter('number');
${'menu_item_srl288_argument'}->checkNotNull();
${'menu_item_srl288_argument'}->createConditionValue();
if(!${'menu_item_srl288_argument'}->isValid()) return ${'menu_item_srl288_argument'}->getErrorMessage();
if(${'menu_item_srl288_argument'} !== null) ${'menu_item_srl288_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`menu_srl`', ${'menu_srl276_argument'})
,new UpdateExpression('`parent_srl`', ${'parent_srl277_argument'})
,new UpdateExpression('`name`', ${'name278_argument'})
,new UpdateExpression('`desc`', ${'desc279_argument'})
,new UpdateExpression('`url`', ${'url280_argument'})
,new UpdateExpression('`is_shortcut`', ${'is_shortcut281_argument'})
,new UpdateExpression('`open_window`', ${'open_window282_argument'})
,new UpdateExpression('`expand`', ${'expand283_argument'})
,new UpdateExpression('`normal_btn`', ${'normal_btn284_argument'})
,new UpdateExpression('`hover_btn`', ${'hover_btn285_argument'})
,new UpdateExpression('`active_btn`', ${'active_btn286_argument'})
,new UpdateExpression('`group_srls`', ${'group_srls287_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_item_srl`',$menu_item_srl288_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>