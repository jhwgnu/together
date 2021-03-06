<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getInstalledPackage");
$query->setAction("select");
$query->setPriority("");

${'package_srl2_argument'} = new ConditionArgument('package_srl', $args->package_srl, 'equal');
${'package_srl2_argument'}->checkFilter('number');
${'package_srl2_argument'}->checkNotNull();
${'package_srl2_argument'}->createConditionValue();
if(!${'package_srl2_argument'}->isValid()) return ${'package_srl2_argument'}->getErrorMessage();
if(${'package_srl2_argument'} !== null) ${'package_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_ai_installed_packages`', '`ai_installed_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package_srl`',$package_srl2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>