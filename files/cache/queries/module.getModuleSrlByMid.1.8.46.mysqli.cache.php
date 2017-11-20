<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModuleSrlByMid");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl6_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl6_argument'}->createConditionValue();
if(!${'site_srl6_argument'}->isValid()) return ${'site_srl6_argument'}->getErrorMessage();
} else
${'site_srl6_argument'} = NULL;if(${'site_srl6_argument'} !== null) ${'site_srl6_argument'}->setColumnType('number');

${'mid7_argument'} = new ConditionArgument('mid', $args->mid, 'in');
${'mid7_argument'}->checkNotNull();
${'mid7_argument'}->createConditionValue();
if(!${'mid7_argument'}->isValid()) return ${'mid7_argument'}->getErrorMessage();
if(${'mid7_argument'} !== null) ${'mid7_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`module_srl`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl6_argument,"equal")
,new ConditionWithArgument('`mid`',$mid7_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>