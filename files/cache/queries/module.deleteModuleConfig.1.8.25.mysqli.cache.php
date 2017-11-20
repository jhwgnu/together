<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleConfig");
$query->setAction("delete");
$query->setPriority("");

${'module17_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module17_argument'}->checkNotNull();
${'module17_argument'}->createConditionValue();
if(!${'module17_argument'}->isValid()) return ${'module17_argument'}->getErrorMessage();
if(${'module17_argument'} !== null) ${'module17_argument'}->setColumnType('varchar');

${'site_srl18_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl18_argument'}->checkNotNull();
${'site_srl18_argument'}->createConditionValue();
if(!${'site_srl18_argument'}->isValid()) return ${'site_srl18_argument'}->getErrorMessage();
if(${'site_srl18_argument'} !== null) ${'site_srl18_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_module_config`', '`module_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module17_argument,"equal")
,new ConditionWithArgument('`site_srl`',$site_srl18_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>