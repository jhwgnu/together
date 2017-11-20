<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertTrigger");
$query->setAction("insert");
$query->setPriority("");

${'trigger_name2_argument'} = new Argument('trigger_name', $args->{'trigger_name'});
${'trigger_name2_argument'}->checkNotNull();
if(!${'trigger_name2_argument'}->isValid()) return ${'trigger_name2_argument'}->getErrorMessage();
if(${'trigger_name2_argument'} !== null) ${'trigger_name2_argument'}->setColumnType('varchar');

${'module3_argument'} = new Argument('module', $args->{'module'});
${'module3_argument'}->checkNotNull();
if(!${'module3_argument'}->isValid()) return ${'module3_argument'}->getErrorMessage();
if(${'module3_argument'} !== null) ${'module3_argument'}->setColumnType('varchar');

${'type4_argument'} = new Argument('type', $args->{'type'});
${'type4_argument'}->checkNotNull();
if(!${'type4_argument'}->isValid()) return ${'type4_argument'}->getErrorMessage();
if(${'type4_argument'} !== null) ${'type4_argument'}->setColumnType('varchar');

${'called_method5_argument'} = new Argument('called_method', $args->{'called_method'});
${'called_method5_argument'}->checkNotNull();
if(!${'called_method5_argument'}->isValid()) return ${'called_method5_argument'}->getErrorMessage();
if(${'called_method5_argument'} !== null) ${'called_method5_argument'}->setColumnType('varchar');

${'called_position6_argument'} = new Argument('called_position', $args->{'called_position'});
${'called_position6_argument'}->checkNotNull();
if(!${'called_position6_argument'}->isValid()) return ${'called_position6_argument'}->getErrorMessage();
if(${'called_position6_argument'} !== null) ${'called_position6_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`trigger_name`', ${'trigger_name2_argument'})
,new InsertExpression('`module`', ${'module3_argument'})
,new InsertExpression('`type`', ${'type4_argument'})
,new InsertExpression('`called_method`', ${'called_method5_argument'})
,new InsertExpression('`called_position`', ${'called_position6_argument'})
));
$query->setTables(array(
new Table('`xe_module_trigger`', '`module_trigger`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>