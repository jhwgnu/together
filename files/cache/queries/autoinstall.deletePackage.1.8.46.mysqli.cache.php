<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deletePackage");
$query->setAction("delete");
$query->setPriority("");

${'path8_argument'} = new ConditionArgument('path', $args->path, 'equal');
${'path8_argument'}->checkNotNull();
${'path8_argument'}->createConditionValue();
if(!${'path8_argument'}->isValid()) return ${'path8_argument'}->getErrorMessage();
if(${'path8_argument'} !== null) ${'path8_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`path`',$path8_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>