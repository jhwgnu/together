<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertTrigger");
$query->setAction("insert");
$query->setPriority("");

${'trigger_name24_argument'} = new Argument('trigger_name', $args->{'trigger_name'});
${'trigger_name24_argument'}->checkNotNull();
if(!${'trigger_name24_argument'}->isValid()) return ${'trigger_name24_argument'}->getErrorMessage();
if(${'trigger_name24_argument'} !== null) ${'trigger_name24_argument'}->setColumnType('varchar');

${'module25_argument'} = new Argument('module', $args->{'module'});
${'module25_argument'}->checkNotNull();
if(!${'module25_argument'}->isValid()) return ${'module25_argument'}->getErrorMessage();
if(${'module25_argument'} !== null) ${'module25_argument'}->setColumnType('varchar');

${'type26_argument'} = new Argument('type', $args->{'type'});
${'type26_argument'}->checkNotNull();
if(!${'type26_argument'}->isValid()) return ${'type26_argument'}->getErrorMessage();
if(${'type26_argument'} !== null) ${'type26_argument'}->setColumnType('varchar');

${'called_method27_argument'} = new Argument('called_method', $args->{'called_method'});
${'called_method27_argument'}->checkNotNull();
if(!${'called_method27_argument'}->isValid()) return ${'called_method27_argument'}->getErrorMessage();
if(${'called_method27_argument'} !== null) ${'called_method27_argument'}->setColumnType('varchar');

${'called_position28_argument'} = new Argument('called_position', $args->{'called_position'});
${'called_position28_argument'}->checkNotNull();
if(!${'called_position28_argument'}->isValid()) return ${'called_position28_argument'}->getErrorMessage();
if(${'called_position28_argument'} !== null) ${'called_position28_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`trigger_name`', ${'trigger_name24_argument'})
,new InsertExpression('`module`', ${'module25_argument'})
,new InsertExpression('`type`', ${'type26_argument'})
,new InsertExpression('`called_method`', ${'called_method27_argument'})
,new InsertExpression('`called_position`', ${'called_position28_argument'})
));
$query->setTables(array(
new Table('`xe_module_trigger`', '`module_trigger`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>