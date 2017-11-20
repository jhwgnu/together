<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertTrigger");
$query->setAction("insert");
$query->setPriority("");

${'trigger_name1_argument'} = new Argument('trigger_name', $args->{'trigger_name'});
${'trigger_name1_argument'}->checkNotNull();
if(!${'trigger_name1_argument'}->isValid()) return ${'trigger_name1_argument'}->getErrorMessage();
if(${'trigger_name1_argument'} !== null) ${'trigger_name1_argument'}->setColumnType('varchar');

${'module2_argument'} = new Argument('module', $args->{'module'});
${'module2_argument'}->checkNotNull();
if(!${'module2_argument'}->isValid()) return ${'module2_argument'}->getErrorMessage();
if(${'module2_argument'} !== null) ${'module2_argument'}->setColumnType('varchar');

${'type3_argument'} = new Argument('type', $args->{'type'});
${'type3_argument'}->checkNotNull();
if(!${'type3_argument'}->isValid()) return ${'type3_argument'}->getErrorMessage();
if(${'type3_argument'} !== null) ${'type3_argument'}->setColumnType('varchar');

${'called_method4_argument'} = new Argument('called_method', $args->{'called_method'});
${'called_method4_argument'}->checkNotNull();
if(!${'called_method4_argument'}->isValid()) return ${'called_method4_argument'}->getErrorMessage();
if(${'called_method4_argument'} !== null) ${'called_method4_argument'}->setColumnType('varchar');

${'called_position5_argument'} = new Argument('called_position', $args->{'called_position'});
${'called_position5_argument'}->checkNotNull();
if(!${'called_position5_argument'}->isValid()) return ${'called_position5_argument'}->getErrorMessage();
if(${'called_position5_argument'} !== null) ${'called_position5_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`trigger_name`', ${'trigger_name1_argument'})
,new InsertExpression('`module`', ${'module2_argument'})
,new InsertExpression('`type`', ${'type3_argument'})
,new InsertExpression('`called_method`', ${'called_method4_argument'})
,new InsertExpression('`called_position`', ${'called_position5_argument'})
));
$query->setTables(array(
new Table('`xe_module_trigger`', '`module_trigger`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>