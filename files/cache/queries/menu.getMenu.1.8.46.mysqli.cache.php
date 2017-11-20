<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenu");
$query->setAction("select");
$query->setPriority("");

${'menu_srl5_argument'} = new ConditionArgument('menu_srl', $args->menu_srl, 'equal');
${'menu_srl5_argument'}->checkFilter('number');
${'menu_srl5_argument'}->checkNotNull();
${'menu_srl5_argument'}->createConditionValue();
if(!${'menu_srl5_argument'}->isValid()) return ${'menu_srl5_argument'}->getErrorMessage();
if(${'menu_srl5_argument'} !== null) ${'menu_srl5_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_srl`',$menu_srl5_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>