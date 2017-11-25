<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentVotedLogs");
$query->setAction("select");
$query->setPriority("");

${'document_srl1_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl1_argument'}->checkFilter('number');
${'document_srl1_argument'}->checkNotNull();
${'document_srl1_argument'}->createConditionValue();
if(!${'document_srl1_argument'}->isValid()) return ${'document_srl1_argument'}->getErrorMessage();
if(${'document_srl1_argument'} !== null) ${'document_srl1_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl2_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl2_argument'}->checkFilter('number');
${'member_srl2_argument'}->createConditionValue();
if(!${'member_srl2_argument'}->isValid()) return ${'member_srl2_argument'}->getErrorMessage();
} else
${'member_srl2_argument'} = NULL;if(${'member_srl2_argument'} !== null) ${'member_srl2_argument'}->setColumnType('number');
if(isset($args->ipaddress)) {
${'ipaddress3_argument'} = new ConditionArgument('ipaddress', $args->ipaddress, 'like_prefix');
${'ipaddress3_argument'}->createConditionValue();
if(!${'ipaddress3_argument'}->isValid()) return ${'ipaddress3_argument'}->getErrorMessage();
} else
${'ipaddress3_argument'} = NULL;if(${'ipaddress3_argument'} !== null) ${'ipaddress3_argument'}->setColumnType('varchar');
if(isset($args->more_point)) {
${'more_point4_argument'} = new ConditionArgument('more_point', $args->more_point, 'more');
${'more_point4_argument'}->checkFilter('number');
${'more_point4_argument'}->createConditionValue();
if(!${'more_point4_argument'}->isValid()) return ${'more_point4_argument'}->getErrorMessage();
} else
${'more_point4_argument'} = NULL;if(${'more_point4_argument'} !== null) ${'more_point4_argument'}->setColumnType('number');
if(isset($args->less_point)) {
${'less_point5_argument'} = new ConditionArgument('less_point', $args->less_point, 'less');
${'less_point5_argument'}->checkFilter('number');
${'less_point5_argument'}->createConditionValue();
if(!${'less_point5_argument'}->isValid()) return ${'less_point5_argument'}->getErrorMessage();
} else
${'less_point5_argument'} = NULL;if(${'less_point5_argument'} !== null) ${'less_point5_argument'}->setColumnType('number');

${'sort_index6_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index6_argument'}->ensureDefaultValue('regdate');
if(!${'sort_index6_argument'}->isValid()) return ${'sort_index6_argument'}->getErrorMessage();

${'order_type7_argument'} = new SortArgument('order_type7', $args->order_type);
${'order_type7_argument'}->ensureDefaultValue('asc');
if(!${'order_type7_argument'}->isValid()) return ${'order_type7_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_document_voted_log`', '`document_voted_log`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl1_argument,"equal")
,new ConditionWithArgument('`member_srl`',$member_srl2_argument,"equal", 'and')
,new ConditionWithArgument('`ipaddress`',$ipaddress3_argument,"like_prefix", 'and')
,new ConditionWithArgument('`point`',$more_point4_argument,"more", 'and')
,new ConditionWithArgument('`point`',$less_point5_argument,"less", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index6_argument'}, $order_type7_argument)
));
$query->setLimit();
return $query; ?>