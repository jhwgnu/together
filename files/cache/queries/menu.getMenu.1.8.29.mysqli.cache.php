<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenu");
$query->setAction("select");
$query->setPriority("");

${'menu_srl1_argument'} = new ConditionArgument('menu_srl', $args->menu_srl, 'equal');
${'menu_srl1_argument'}->checkFilter('number');
${'menu_srl1_argument'}->checkNotNull();
${'menu_srl1_argument'}->createConditionValue();
if(!${'menu_srl1_argument'}->isValid()) return ${'menu_srl1_argument'}->getErrorMessage();
if(${'menu_srl1_argument'} !== null) ${'menu_srl1_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_srl`',$menu_srl1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>