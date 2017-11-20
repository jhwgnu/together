<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getActionForward");
$query->setAction("select");
$query->setPriority("");
if(isset($args->act)) {
${'act70_argument'} = new ConditionArgument('act', $args->act, 'equal');
${'act70_argument'}->createConditionValue();
if(!${'act70_argument'}->isValid()) return ${'act70_argument'}->getErrorMessage();
} else
${'act70_argument'} = NULL;if(${'act70_argument'} !== null) ${'act70_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_action_forward`', '`action_forward`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`act`',$act70_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>