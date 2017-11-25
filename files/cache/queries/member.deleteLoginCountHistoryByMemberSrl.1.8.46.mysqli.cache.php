<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteLoginCountHistoryByMemberSrl");
$query->setAction("delete");
$query->setPriority("");

${'member_srl13_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl13_argument'}->checkNotNull();
${'member_srl13_argument'}->createConditionValue();
if(!${'member_srl13_argument'}->isValid()) return ${'member_srl13_argument'}->getErrorMessage();
if(${'member_srl13_argument'} !== null) ${'member_srl13_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_member_count_history`', '`member_count_history`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl13_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>