<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertActionForward");
$query->setAction("insert");
$query->setPriority("");

${'act121_argument'} = new Argument('act', $args->{'act'});
${'act121_argument'}->checkNotNull();
if(!${'act121_argument'}->isValid()) return ${'act121_argument'}->getErrorMessage();
if(${'act121_argument'} !== null) ${'act121_argument'}->setColumnType('varchar');

${'module122_argument'} = new Argument('module', $args->{'module'});
${'module122_argument'}->checkNotNull();
if(!${'module122_argument'}->isValid()) return ${'module122_argument'}->getErrorMessage();
if(${'module122_argument'} !== null) ${'module122_argument'}->setColumnType('varchar');

${'type123_argument'} = new Argument('type', $args->{'type'});
${'type123_argument'}->checkNotNull();
if(!${'type123_argument'}->isValid()) return ${'type123_argument'}->getErrorMessage();
if(${'type123_argument'} !== null) ${'type123_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`act`', ${'act121_argument'})
,new InsertExpression('`module`', ${'module122_argument'})
,new InsertExpression('`type`', ${'type123_argument'})
));
$query->setTables(array(
new Table('`xe_action_forward`', '`action_forward`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>