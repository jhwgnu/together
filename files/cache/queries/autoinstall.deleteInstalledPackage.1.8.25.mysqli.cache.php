<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteInstalledPackage");
$query->setAction("delete");
$query->setPriority("");
if(isset($args->package_srl)) {
${'package_srl16_argument'} = new ConditionArgument('package_srl', $args->package_srl, 'equal');
${'package_srl16_argument'}->checkFilter('number');
${'package_srl16_argument'}->createConditionValue();
if(!${'package_srl16_argument'}->isValid()) return ${'package_srl16_argument'}->getErrorMessage();
} else
${'package_srl16_argument'} = NULL;if(${'package_srl16_argument'} !== null) ${'package_srl16_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_ai_installed_packages`', '`ai_installed_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package_srl`',$package_srl16_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>