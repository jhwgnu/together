<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getActionForward");
$query->setAction("select");
$query->setPriority("");
if(isset($args->act)) {
${'act1_argument'} = new ConditionArgument('act', $args->act, 'equal');
${'act1_argument'}->createConditionValue();
if(!${'act1_argument'}->isValid()) return ${'act1_argument'}->getErrorMessage();
} else
${'act1_argument'} = NULL;if(${'act1_argument'} !== null) ${'act1_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_action_forward`', '`action_forward`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`act`',$act1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>