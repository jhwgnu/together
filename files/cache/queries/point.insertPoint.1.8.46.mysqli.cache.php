<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertPoint");
$query->setAction("insert");
$query->setPriority("");

${'member_srl40_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl40_argument'}->checkFilter('number');
${'member_srl40_argument'}->checkNotNull();
if(!${'member_srl40_argument'}->isValid()) return ${'member_srl40_argument'}->getErrorMessage();
if(${'member_srl40_argument'} !== null) ${'member_srl40_argument'}->setColumnType('number');

${'point41_argument'} = new Argument('point', $args->{'point'});
${'point41_argument'}->checkFilter('number');
${'point41_argument'}->ensureDefaultValue('0');
${'point41_argument'}->checkNotNull();
if(!${'point41_argument'}->isValid()) return ${'point41_argument'}->getErrorMessage();
if(${'point41_argument'} !== null) ${'point41_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`member_srl`', ${'member_srl40_argument'})
,new InsertExpression('`point`', ${'point41_argument'})
));
$query->setTables(array(
new Table('`xe_point`', '`point`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>