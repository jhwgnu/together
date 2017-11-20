<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModulePartConfigs");
$query->setAction("select");
$query->setPriority("");

${'module1_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module1_argument'}->checkNotNull();
${'module1_argument'}->createConditionValue();
if(!${'module1_argument'}->isValid()) return ${'module1_argument'}->getErrorMessage();
if(${'module1_argument'} !== null) ${'module1_argument'}->setColumnType('varchar');
if(isset($args->site_srl)) {
${'site_srl2_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl2_argument'}->createConditionValue();
if(!${'site_srl2_argument'}->isValid()) return ${'site_srl2_argument'}->getErrorMessage();
} else
${'site_srl2_argument'} = NULL;if(${'site_srl2_argument'} !== null) ${'site_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`module_part_config`.`module_srl`')
,new SelectExpression('`module_part_config`.`config`', '`config`')
));
$query->setTables(array(
new Table('`xe_module_part_config`', '`module_part_config`')
,new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_part_config`.`module`',$module1_argument,"equal")
,new ConditionWithoutArgument('`modules`.`module_srl`','`module_part_config`.`module_srl`',"equal", 'and')
,new ConditionWithArgument('`modules`.`site_srl`',$site_srl2_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>