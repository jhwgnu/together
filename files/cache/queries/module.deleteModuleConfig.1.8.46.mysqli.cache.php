<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleConfig");
$query->setAction("delete");
$query->setPriority("");

${'module6_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module6_argument'}->checkNotNull();
${'module6_argument'}->createConditionValue();
if(!${'module6_argument'}->isValid()) return ${'module6_argument'}->getErrorMessage();
if(${'module6_argument'} !== null) ${'module6_argument'}->setColumnType('varchar');

${'site_srl7_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl7_argument'}->checkNotNull();
${'site_srl7_argument'}->createConditionValue();
if(!${'site_srl7_argument'}->isValid()) return ${'site_srl7_argument'}->getErrorMessage();
if(${'site_srl7_argument'} !== null) ${'site_srl7_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_module_config`', '`module_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module6_argument,"equal")
,new ConditionWithArgument('`site_srl`',$site_srl7_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>