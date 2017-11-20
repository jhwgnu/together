<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("addMemberToGroup");
$query->setAction("insert");
$query->setPriority("");

${'group_srl93_argument'} = new Argument('group_srl', $args->{'group_srl'});
${'group_srl93_argument'}->checkNotNull();
if(!${'group_srl93_argument'}->isValid()) return ${'group_srl93_argument'}->getErrorMessage();
if(${'group_srl93_argument'} !== null) ${'group_srl93_argument'}->setColumnType('number');

${'member_srl94_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl94_argument'}->checkNotNull();
if(!${'member_srl94_argument'}->isValid()) return ${'member_srl94_argument'}->getErrorMessage();
if(${'member_srl94_argument'} !== null) ${'member_srl94_argument'}->setColumnType('number');

${'site_srl95_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl95_argument'}->ensureDefaultValue('0');
if(!${'site_srl95_argument'}->isValid()) return ${'site_srl95_argument'}->getErrorMessage();
if(${'site_srl95_argument'} !== null) ${'site_srl95_argument'}->setColumnType('number');

${'regdate96_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate96_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate96_argument'}->isValid()) return ${'regdate96_argument'}->getErrorMessage();
if(${'regdate96_argument'} !== null) ${'regdate96_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`group_srl`', ${'group_srl93_argument'})
,new InsertExpression('`member_srl`', ${'member_srl94_argument'})
,new InsertExpression('`site_srl`', ${'site_srl95_argument'})
,new InsertExpression('`regdate`', ${'regdate96_argument'})
));
$query->setTables(array(
new Table('`xe_member_group_member`', '`member_group_member`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>