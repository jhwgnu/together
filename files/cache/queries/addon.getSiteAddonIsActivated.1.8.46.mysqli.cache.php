<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSiteAddonIsActivated");
$query->setAction("select");
$query->setPriority("");

${'site_srl10_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl10_argument'}->checkNotNull();
${'site_srl10_argument'}->createConditionValue();
if(!${'site_srl10_argument'}->isValid()) return ${'site_srl10_argument'}->getErrorMessage();
if(${'site_srl10_argument'} !== null) ${'site_srl10_argument'}->setColumnType('number');

${'addon11_argument'} = new ConditionArgument('addon', $args->addon, 'equal');
${'addon11_argument'}->checkNotNull();
${'addon11_argument'}->createConditionValue();
if(!${'addon11_argument'}->isValid()) return ${'addon11_argument'}->getErrorMessage();
if(${'addon11_argument'} !== null) ${'addon11_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl10_argument,"equal")
,new ConditionWithArgument('`addon`',$addon11_argument,"equal", 'and')
,new ConditionWithoutArgument('`is_used`',"'Y'","equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>