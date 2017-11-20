<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModulePartConfig");
$query->setAction("select");
$query->setPriority("");

${'module16_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module16_argument'}->checkNotNull();
${'module16_argument'}->createConditionValue();
if(!${'module16_argument'}->isValid()) return ${'module16_argument'}->getErrorMessage();
if(${'module16_argument'} !== null) ${'module16_argument'}->setColumnType('varchar');

${'module_srl17_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl17_argument'}->checkNotNull();
${'module_srl17_argument'}->createConditionValue();
if(!${'module_srl17_argument'}->isValid()) return ${'module_srl17_argument'}->getErrorMessage();
if(${'module_srl17_argument'} !== null) ${'module_srl17_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`config`')
));
$query->setTables(array(
new Table('`xe_module_part_config`', '`module_part_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module16_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl17_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>