<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteMenuItems");
$query->setAction("delete");
$query->setPriority("");

${'menu_srl1_argument'} = new ConditionArgument('menu_srl', $args->menu_srl, 'equal');
${'menu_srl1_argument'}->checkFilter('number');
${'menu_srl1_argument'}->checkNotNull();
${'menu_srl1_argument'}->createConditionValue();
if(!${'menu_srl1_argument'}->isValid()) return ${'menu_srl1_argument'}->getErrorMessage();
if(${'menu_srl1_argument'} !== null) ${'menu_srl1_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_srl`',$menu_srl1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>