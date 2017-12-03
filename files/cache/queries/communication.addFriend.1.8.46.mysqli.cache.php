<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("addFriend");
$query->setAction("insert");
$query->setPriority("");

${'friend_srl1_argument'} = new Argument('friend_srl', $args->{'friend_srl'});
${'friend_srl1_argument'}->checkNotNull();
if(!${'friend_srl1_argument'}->isValid()) return ${'friend_srl1_argument'}->getErrorMessage();
if(${'friend_srl1_argument'} !== null) ${'friend_srl1_argument'}->setColumnType('number');

${'friend_group_srl2_argument'} = new Argument('friend_group_srl', $args->{'friend_group_srl'});
${'friend_group_srl2_argument'}->ensureDefaultValue('0');
if(!${'friend_group_srl2_argument'}->isValid()) return ${'friend_group_srl2_argument'}->getErrorMessage();
if(${'friend_group_srl2_argument'} !== null) ${'friend_group_srl2_argument'}->setColumnType('number');

${'member_srl3_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl3_argument'}->checkNotNull();
if(!${'member_srl3_argument'}->isValid()) return ${'member_srl3_argument'}->getErrorMessage();
if(${'member_srl3_argument'} !== null) ${'member_srl3_argument'}->setColumnType('number');

${'target_srl4_argument'} = new Argument('target_srl', $args->{'target_srl'});
${'target_srl4_argument'}->checkNotNull();
if(!${'target_srl4_argument'}->isValid()) return ${'target_srl4_argument'}->getErrorMessage();
if(${'target_srl4_argument'} !== null) ${'target_srl4_argument'}->setColumnType('number');
if(isset($args->list_order)) {
${'list_order5_argument'} = new Argument('list_order', $args->{'list_order'});
if(!${'list_order5_argument'}->isValid()) return ${'list_order5_argument'}->getErrorMessage();
} else
${'list_order5_argument'} = NULL;if(${'list_order5_argument'} !== null) ${'list_order5_argument'}->setColumnType('number');

${'regdate6_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate6_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate6_argument'}->isValid()) return ${'regdate6_argument'}->getErrorMessage();
if(${'regdate6_argument'} !== null) ${'regdate6_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`friend_srl`', ${'friend_srl1_argument'})
,new InsertExpression('`friend_group_srl`', ${'friend_group_srl2_argument'})
,new InsertExpression('`member_srl`', ${'member_srl3_argument'})
,new InsertExpression('`target_srl`', ${'target_srl4_argument'})
,new InsertExpression('`list_order`', ${'list_order5_argument'})
,new InsertExpression('`regdate`', ${'regdate6_argument'})
));
$query->setTables(array(
new Table('`xe_member_friend`', '`member_friend`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>