<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertKinPoint");
$query->setAction("insert");
$query->setPriority("");

${'document_srl38_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl38_argument'}->checkFilter('number');
${'document_srl38_argument'}->checkNotNull();
if(!${'document_srl38_argument'}->isValid()) return ${'document_srl38_argument'}->getErrorMessage();
if(${'document_srl38_argument'} !== null) ${'document_srl38_argument'}->setColumnType('number');

${'point39_argument'} = new Argument('point', $args->{'point'});
${'point39_argument'}->checkFilter('number');
${'point39_argument'}->checkNotNull();
if(!${'point39_argument'}->isValid()) return ${'point39_argument'}->getErrorMessage();
if(${'point39_argument'} !== null) ${'point39_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`document_srl`', ${'document_srl38_argument'})
,new InsertExpression('`point`', ${'point39_argument'})
));
$query->setTables(array(
new Table('`xe_kin_point`', '`kin_point`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>