<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getFavoriteList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl33_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl33_argument'}->createConditionValue();
if(!${'site_srl33_argument'}->isValid()) return ${'site_srl33_argument'}->getErrorMessage();
} else
${'site_srl33_argument'} = NULL;if(${'site_srl33_argument'} !== null) ${'site_srl33_argument'}->setColumnType('number');
if(isset($args->module)) {
${'module34_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module34_argument'}->createConditionValue();
if(!${'module34_argument'}->isValid()) return ${'module34_argument'}->getErrorMessage();
} else
${'module34_argument'} = NULL;if(${'module34_argument'} !== null) ${'module34_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_admin_favorite`', '`admin_favorite`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl33_argument,"equal")
,new ConditionWithArgument('`module`',$module34_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>