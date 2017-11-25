<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteMenu");
$query->setAction("delete");
$query->setPriority("");

${'menu_srl2_argument'} = new ConditionArgument('menu_srl', $args->menu_srl, 'equal');
${'menu_srl2_argument'}->checkFilter('number');
${'menu_srl2_argument'}->checkNotNull();
${'menu_srl2_argument'}->createConditionValue();
if(!${'menu_srl2_argument'}->isValid()) return ${'menu_srl2_argument'}->getErrorMessage();
if(${'menu_srl2_argument'} !== null) ${'menu_srl2_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_srl`',$menu_srl2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>