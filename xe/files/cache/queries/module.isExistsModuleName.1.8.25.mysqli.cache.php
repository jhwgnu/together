<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("isExistsModuleName");
$query->setAction("select");
$query->setPriority("");

${'site_srl124_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl124_argument'}->ensureDefaultValue('0');
${'site_srl124_argument'}->checkNotNull();
${'site_srl124_argument'}->createConditionValue();
if(!${'site_srl124_argument'}->isValid()) return ${'site_srl124_argument'}->getErrorMessage();
if(${'site_srl124_argument'} !== null) ${'site_srl124_argument'}->setColumnType('number');

${'mid125_argument'} = new ConditionArgument('mid', $args->mid, 'equal');
${'mid125_argument'}->checkNotNull();
${'mid125_argument'}->createConditionValue();
if(!${'mid125_argument'}->isValid()) return ${'mid125_argument'}->getErrorMessage();
if(${'mid125_argument'} !== null) ${'mid125_argument'}->setColumnType('varchar');

${'module_srl126_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'notequal');
${'module_srl126_argument'}->ensureDefaultValue('0');
${'module_srl126_argument'}->checkNotNull();
${'module_srl126_argument'}->createConditionValue();
if(!${'module_srl126_argument'}->isValid()) return ${'module_srl126_argument'}->getErrorMessage();
if(${'module_srl126_argument'} !== null) ${'module_srl126_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl124_argument,"equal")
,new ConditionWithArgument('`mid`',$mid125_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl126_argument,"notequal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>