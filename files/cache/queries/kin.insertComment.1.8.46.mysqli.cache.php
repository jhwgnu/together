<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertComment");
$query->setAction("insert");
$query->setPriority("");

${'reply_srl1_argument'} = new Argument('reply_srl', $args->{'reply_srl'});
${'reply_srl1_argument'}->checkFilter('number');
${'reply_srl1_argument'}->checkNotNull();
if(!${'reply_srl1_argument'}->isValid()) return ${'reply_srl1_argument'}->getErrorMessage();
if(${'reply_srl1_argument'} !== null) ${'reply_srl1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->checkNotNull();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

${'parent_srl3_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl3_argument'}->checkFilter('number');
${'parent_srl3_argument'}->checkNotNull();
if(!${'parent_srl3_argument'}->isValid()) return ${'parent_srl3_argument'}->getErrorMessage();
if(${'parent_srl3_argument'} !== null) ${'parent_srl3_argument'}->setColumnType('number');

${'content4_argument'} = new Argument('content', $args->{'content'});
${'content4_argument'}->checkNotNull();
if(!${'content4_argument'}->isValid()) return ${'content4_argument'}->getErrorMessage();
if(${'content4_argument'} !== null) ${'content4_argument'}->setColumnType('bigtext');

${'member_srl5_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl5_argument'}->checkNotNull();
if(!${'member_srl5_argument'}->isValid()) return ${'member_srl5_argument'}->getErrorMessage();
if(${'member_srl5_argument'} !== null) ${'member_srl5_argument'}->setColumnType('number');

${'nick_name6_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name6_argument'}->checkNotNull();
if(!${'nick_name6_argument'}->isValid()) return ${'nick_name6_argument'}->getErrorMessage();
if(${'nick_name6_argument'} !== null) ${'nick_name6_argument'}->setColumnType('varchar');

${'regdate7_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate7_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate7_argument'}->isValid()) return ${'regdate7_argument'}->getErrorMessage();
if(${'regdate7_argument'} !== null) ${'regdate7_argument'}->setColumnType('date');

${'ipaddress8_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress8_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress8_argument'}->isValid()) return ${'ipaddress8_argument'}->getErrorMessage();
if(${'ipaddress8_argument'} !== null) ${'ipaddress8_argument'}->setColumnType('varchar');

${'list_order9_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order9_argument'}->checkFilter('number');
${'list_order9_argument'}->checkNotNull();
if(!${'list_order9_argument'}->isValid()) return ${'list_order9_argument'}->getErrorMessage();
if(${'list_order9_argument'} !== null) ${'list_order9_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`reply_srl`', ${'reply_srl1_argument'})
,new InsertExpression('`module_srl`', ${'module_srl2_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl3_argument'})
,new InsertExpression('`content`', ${'content4_argument'})
,new InsertExpression('`member_srl`', ${'member_srl5_argument'})
,new InsertExpression('`nick_name`', ${'nick_name6_argument'})
,new InsertExpression('`regdate`', ${'regdate7_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress8_argument'})
,new InsertExpression('`list_order`', ${'list_order9_argument'})
));
$query->setTables(array(
new Table('`xe_kin_replies`', '`kin_replies`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>