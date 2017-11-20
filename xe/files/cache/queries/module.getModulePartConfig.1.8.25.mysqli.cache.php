<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModulePartConfig");
$query->setAction("select");
$query->setPriority("");

${'module204_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module204_argument'}->checkNotNull();
${'module204_argument'}->createConditionValue();
if(!${'module204_argument'}->isValid()) return ${'module204_argument'}->getErrorMessage();
if(${'module204_argument'} !== null) ${'module204_argument'}->setColumnType('varchar');

${'module_srl205_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl205_argument'}->checkNotNull();
${'module_srl205_argument'}->createConditionValue();
if(!${'module_srl205_argument'}->isValid()) return ${'module_srl205_argument'}->getErrorMessage();
if(${'module_srl205_argument'} !== null) ${'module_srl205_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`config`')
));
$query->setTables(array(
new Table('`xe_module_part_config`', '`module_part_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module204_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl205_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>