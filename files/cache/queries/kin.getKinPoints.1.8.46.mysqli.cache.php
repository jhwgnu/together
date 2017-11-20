<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getKinPoints");
$query->setAction("select");
$query->setPriority("");

${'document_srls1_argument'} = new ConditionArgument('document_srls', $args->document_srls, 'in');
${'document_srls1_argument'}->checkNotNull();
${'document_srls1_argument'}->createConditionValue();
if(!${'document_srls1_argument'}->isValid()) return ${'document_srls1_argument'}->getErrorMessage();
if(${'document_srls1_argument'} !== null) ${'document_srls1_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`document_srl`')
,new SelectExpression('`point`')
));
$query->setTables(array(
new Table('`xe_kin_point`', '`kin_point`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srls1_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>