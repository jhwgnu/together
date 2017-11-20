<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLoginCountHistoryByMemberSrl");
$query->setAction("update");
$query->setPriority("");

${'content5_argument'} = new Argument('content', $args->{'content'});
${'content5_argument'}->checkNotNull();
if(!${'content5_argument'}->isValid()) return ${'content5_argument'}->getErrorMessage();
if(${'content5_argument'} !== null) ${'content5_argument'}->setColumnType('bigtext');

${'last_update6_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update6_argument'}->ensureDefaultValue(date("YmdHis"));
${'last_update6_argument'}->checkNotNull();
if(!${'last_update6_argument'}->isValid()) return ${'last_update6_argument'}->getErrorMessage();
if(${'last_update6_argument'} !== null) ${'last_update6_argument'}->setColumnType('date');

${'member_srl7_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl7_argument'}->checkNotNull();
${'member_srl7_argument'}->createConditionValue();
if(!${'member_srl7_argument'}->isValid()) return ${'member_srl7_argument'}->getErrorMessage();
if(${'member_srl7_argument'} !== null) ${'member_srl7_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`content`', ${'content5_argument'})
,new UpdateExpression('`last_update`', ${'last_update6_argument'})
));
$query->setTables(array(
new Table('`xe_member_count_history`', '`member_count_history`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl7_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>