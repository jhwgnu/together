<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertLoginCountByIp");
$query->setAction("insert");
$query->setPriority("");

${'ipaddress8_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress8_argument'}->checkNotNull();
if(!${'ipaddress8_argument'}->isValid()) return ${'ipaddress8_argument'}->getErrorMessage();
if(${'ipaddress8_argument'} !== null) ${'ipaddress8_argument'}->setColumnType('varchar');

${'count9_argument'} = new Argument('count', $args->{'count'});
${'count9_argument'}->checkNotNull();
if(!${'count9_argument'}->isValid()) return ${'count9_argument'}->getErrorMessage();
if(${'count9_argument'} !== null) ${'count9_argument'}->setColumnType('number');

${'regdate10_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate10_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate10_argument'}->isValid()) return ${'regdate10_argument'}->getErrorMessage();
if(${'regdate10_argument'} !== null) ${'regdate10_argument'}->setColumnType('date');

${'last_update11_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update11_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update11_argument'}->isValid()) return ${'last_update11_argument'}->getErrorMessage();
if(${'last_update11_argument'} !== null) ${'last_update11_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`ipaddress`', ${'ipaddress8_argument'})
,new InsertExpression('`count`', ${'count9_argument'})
,new InsertExpression('`regdate`', ${'regdate10_argument'})
,new InsertExpression('`last_update`', ${'last_update11_argument'})
));
$query->setTables(array(
new Table('`xe_member_login_count`', '`member_login_count`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>