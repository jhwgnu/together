<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deletePackage");
$query->setAction("delete");
$query->setPriority("");

${'path9_argument'} = new ConditionArgument('path', $args->path, 'equal');
${'path9_argument'}->checkNotNull();
${'path9_argument'}->createConditionValue();
if(!${'path9_argument'}->isValid()) return ${'path9_argument'}->getErrorMessage();
if(${'path9_argument'} !== null) ${'path9_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`path`',$path9_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>