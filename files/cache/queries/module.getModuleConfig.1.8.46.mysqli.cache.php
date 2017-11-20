<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModuleConfig");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module)) {
${'module47_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module47_argument'}->createConditionValue();
if(!${'module47_argument'}->isValid()) return ${'module47_argument'}->getErrorMessage();
} else
${'module47_argument'} = NULL;if(${'module47_argument'} !== null) ${'module47_argument'}->setColumnType('varchar');
if(isset($args->site_srl)) {
${'site_srl48_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl48_argument'}->createConditionValue();
if(!${'site_srl48_argument'}->isValid()) return ${'site_srl48_argument'}->getErrorMessage();
} else
${'site_srl48_argument'} = NULL;if(${'site_srl48_argument'} !== null) ${'site_srl48_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`config`')
));
$query->setTables(array(
new Table('`xe_module_config`', '`module_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module47_argument,"equal")
,new ConditionWithArgument('`site_srl`',$site_srl48_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>