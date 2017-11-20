<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMidInfo");
$query->setAction("select");
$query->setPriority("");
if(isset($args->mid)) {
${'mid156_argument'} = new ConditionArgument('mid', $args->mid, 'equal');
${'mid156_argument'}->createConditionValue();
if(!${'mid156_argument'}->isValid()) return ${'mid156_argument'}->getErrorMessage();
} else
${'mid156_argument'} = NULL;if(${'mid156_argument'} !== null) ${'mid156_argument'}->setColumnType('varchar');
if(isset($args->module_srl)) {
${'module_srl157_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl157_argument'}->createConditionValue();
if(!${'module_srl157_argument'}->isValid()) return ${'module_srl157_argument'}->getErrorMessage();
} else
${'module_srl157_argument'} = NULL;if(${'module_srl157_argument'} !== null) ${'module_srl157_argument'}->setColumnType('number');
if(isset($args->site_srl)) {
${'site_srl158_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl158_argument'}->createConditionValue();
if(!${'site_srl158_argument'}->isValid()) return ${'site_srl158_argument'}->getErrorMessage();
} else
${'site_srl158_argument'} = NULL;if(${'site_srl158_argument'} !== null) ${'site_srl158_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`mid`',$mid156_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl157_argument,"equal", 'and')
,new ConditionWithArgument('`site_srl`',$site_srl158_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>