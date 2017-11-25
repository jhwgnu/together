<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteLayout");
$query->setAction("delete");
$query->setPriority("");

${'layout_srl1_argument'} = new ConditionArgument('layout_srl', $args->layout_srl, 'equal');
${'layout_srl1_argument'}->checkFilter('number');
${'layout_srl1_argument'}->checkNotNull();
${'layout_srl1_argument'}->createConditionValue();
if(!${'layout_srl1_argument'}->isValid()) return ${'layout_srl1_argument'}->getErrorMessage();
if(${'layout_srl1_argument'} !== null) ${'layout_srl1_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`layout_srl`',$layout_srl1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>