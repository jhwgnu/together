<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLoginCountByIp");
$query->setAction("select");
$query->setPriority("");
if(isset($args->ipaddress)) {
${'ipaddress100_argument'} = new ConditionArgument('ipaddress', $args->ipaddress, 'equal');
${'ipaddress100_argument'}->createConditionValue();
if(!${'ipaddress100_argument'}->isValid()) return ${'ipaddress100_argument'}->getErrorMessage();
} else
${'ipaddress100_argument'} = NULL;if(${'ipaddress100_argument'} !== null) ${'ipaddress100_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member_login_count`', '`member_login_count`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`ipaddress`',$ipaddress100_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>