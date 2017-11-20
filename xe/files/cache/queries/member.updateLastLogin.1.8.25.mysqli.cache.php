<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLastLogin");
$query->setAction("update");
$query->setPriority("");

${'member_srl101_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl101_argument'}->checkFilter('number');
${'member_srl101_argument'}->checkNotNull();
if(!${'member_srl101_argument'}->isValid()) return ${'member_srl101_argument'}->getErrorMessage();
if(${'member_srl101_argument'} !== null) ${'member_srl101_argument'}->setColumnType('number');

${'last_login102_argument'} = new Argument('last_login', $args->{'last_login'});
${'last_login102_argument'}->ensureDefaultValue(date("YmdHis"));
${'last_login102_argument'}->checkNotNull();
if(!${'last_login102_argument'}->isValid()) return ${'last_login102_argument'}->getErrorMessage();
if(${'last_login102_argument'} !== null) ${'last_login102_argument'}->setColumnType('date');

${'member_srl103_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl103_argument'}->checkFilter('number');
${'member_srl103_argument'}->checkNotNull();
${'member_srl103_argument'}->createConditionValue();
if(!${'member_srl103_argument'}->isValid()) return ${'member_srl103_argument'}->getErrorMessage();
if(${'member_srl103_argument'} !== null) ${'member_srl103_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`member_srl`', ${'member_srl101_argument'})
,new UpdateExpression('`last_login`', ${'last_login102_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl103_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>