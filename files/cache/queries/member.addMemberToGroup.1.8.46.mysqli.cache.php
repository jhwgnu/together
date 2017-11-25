<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("addMemberToGroup");
$query->setAction("insert");
$query->setPriority("");

${'group_srl26_argument'} = new Argument('group_srl', $args->{'group_srl'});
${'group_srl26_argument'}->checkNotNull();
if(!${'group_srl26_argument'}->isValid()) return ${'group_srl26_argument'}->getErrorMessage();
if(${'group_srl26_argument'} !== null) ${'group_srl26_argument'}->setColumnType('number');

${'member_srl27_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl27_argument'}->checkNotNull();
if(!${'member_srl27_argument'}->isValid()) return ${'member_srl27_argument'}->getErrorMessage();
if(${'member_srl27_argument'} !== null) ${'member_srl27_argument'}->setColumnType('number');

${'site_srl28_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl28_argument'}->ensureDefaultValue('0');
if(!${'site_srl28_argument'}->isValid()) return ${'site_srl28_argument'}->getErrorMessage();
if(${'site_srl28_argument'} !== null) ${'site_srl28_argument'}->setColumnType('number');

${'regdate29_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate29_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate29_argument'}->isValid()) return ${'regdate29_argument'}->getErrorMessage();
if(${'regdate29_argument'} !== null) ${'regdate29_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`group_srl`', ${'group_srl26_argument'})
,new InsertExpression('`member_srl`', ${'member_srl27_argument'})
,new InsertExpression('`site_srl`', ${'site_srl28_argument'})
,new InsertExpression('`regdate`', ${'regdate29_argument'})
));
$query->setTables(array(
new Table('`xe_member_group_member`', '`member_group_member`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>