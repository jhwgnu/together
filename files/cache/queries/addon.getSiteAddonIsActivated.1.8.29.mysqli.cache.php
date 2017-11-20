<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSiteAddonIsActivated");
$query->setAction("select");
$query->setPriority("");

${'site_srl55_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl55_argument'}->checkNotNull();
${'site_srl55_argument'}->createConditionValue();
if(!${'site_srl55_argument'}->isValid()) return ${'site_srl55_argument'}->getErrorMessage();
if(${'site_srl55_argument'} !== null) ${'site_srl55_argument'}->setColumnType('number');

${'addon56_argument'} = new ConditionArgument('addon', $args->addon, 'equal');
${'addon56_argument'}->checkNotNull();
${'addon56_argument'}->createConditionValue();
if(!${'addon56_argument'}->isValid()) return ${'addon56_argument'}->getErrorMessage();
if(${'addon56_argument'} !== null) ${'addon56_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl55_argument,"equal")
,new ConditionWithArgument('`addon`',$addon56_argument,"equal", 'and')
,new ConditionWithoutArgument('`is_used`',"'Y'","equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>