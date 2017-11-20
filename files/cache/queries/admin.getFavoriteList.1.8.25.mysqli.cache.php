<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getFavoriteList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl21_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl21_argument'}->createConditionValue();
if(!${'site_srl21_argument'}->isValid()) return ${'site_srl21_argument'}->getErrorMessage();
} else
${'site_srl21_argument'} = NULL;if(${'site_srl21_argument'} !== null) ${'site_srl21_argument'}->setColumnType('number');
if(isset($args->module)) {
${'module22_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module22_argument'}->createConditionValue();
if(!${'module22_argument'}->isValid()) return ${'module22_argument'}->getErrorMessage();
} else
${'module22_argument'} = NULL;if(${'module22_argument'} !== null) ${'module22_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_admin_favorite`', '`admin_favorite`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl21_argument,"equal")
,new ConditionWithArgument('`module`',$module22_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>