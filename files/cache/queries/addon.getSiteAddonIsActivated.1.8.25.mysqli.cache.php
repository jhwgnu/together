<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSiteAddonIsActivated");
$query->setAction("select");
$query->setPriority("");

${'site_srl67_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl67_argument'}->checkNotNull();
${'site_srl67_argument'}->createConditionValue();
if(!${'site_srl67_argument'}->isValid()) return ${'site_srl67_argument'}->getErrorMessage();
if(${'site_srl67_argument'} !== null) ${'site_srl67_argument'}->setColumnType('number');

${'addon68_argument'} = new ConditionArgument('addon', $args->addon, 'equal');
${'addon68_argument'}->checkNotNull();
${'addon68_argument'}->createConditionValue();
if(!${'addon68_argument'}->isValid()) return ${'addon68_argument'}->getErrorMessage();
if(${'addon68_argument'} !== null) ${'addon68_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl67_argument,"equal")
,new ConditionWithArgument('`addon`',$addon68_argument,"equal", 'and')
,new ConditionWithoutArgument('`is_used`',"'Y'","equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>