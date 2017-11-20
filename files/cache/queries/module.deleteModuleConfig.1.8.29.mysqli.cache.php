<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleConfig");
$query->setAction("delete");
$query->setPriority("");

${'module5_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module5_argument'}->checkNotNull();
${'module5_argument'}->createConditionValue();
if(!${'module5_argument'}->isValid()) return ${'module5_argument'}->getErrorMessage();
if(${'module5_argument'} !== null) ${'module5_argument'}->setColumnType('varchar');

${'site_srl6_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl6_argument'}->checkNotNull();
${'site_srl6_argument'}->createConditionValue();
if(!${'site_srl6_argument'}->isValid()) return ${'site_srl6_argument'}->getErrorMessage();
if(${'site_srl6_argument'} !== null) ${'site_srl6_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_module_config`', '`module_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module5_argument,"equal")
,new ConditionWithArgument('`site_srl`',$site_srl6_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>