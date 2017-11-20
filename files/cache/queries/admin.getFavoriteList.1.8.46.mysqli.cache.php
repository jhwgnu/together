<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getFavoriteList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl28_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl28_argument'}->createConditionValue();
if(!${'site_srl28_argument'}->isValid()) return ${'site_srl28_argument'}->getErrorMessage();
} else
${'site_srl28_argument'} = NULL;if(${'site_srl28_argument'} !== null) ${'site_srl28_argument'}->setColumnType('number');
if(isset($args->module)) {
${'module29_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module29_argument'}->createConditionValue();
if(!${'module29_argument'}->isValid()) return ${'module29_argument'}->getErrorMessage();
} else
${'module29_argument'} = NULL;if(${'module29_argument'} !== null) ${'module29_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_admin_favorite`', '`admin_favorite`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl28_argument,"equal")
,new ConditionWithArgument('`module`',$module29_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>