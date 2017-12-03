<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("addFriendGroup");
$query->setAction("insert");
$query->setPriority("");

${'friend_group_srl1_argument'} = new Argument('friend_group_srl', $args->{'friend_group_srl'});
$db = DB::getInstance(); $sequence = $db->getNextSequence(); ${'friend_group_srl1_argument'}->ensureDefaultValue($sequence);
${'friend_group_srl1_argument'}->checkNotNull();
if(!${'friend_group_srl1_argument'}->isValid()) return ${'friend_group_srl1_argument'}->getErrorMessage();
if(${'friend_group_srl1_argument'} !== null) ${'friend_group_srl1_argument'}->setColumnType('number');

${'member_srl2_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl2_argument'}->checkNotNull();
if(!${'member_srl2_argument'}->isValid()) return ${'member_srl2_argument'}->getErrorMessage();
if(${'member_srl2_argument'} !== null) ${'member_srl2_argument'}->setColumnType('number');

${'title3_argument'} = new Argument('title', $args->{'title'});
${'title3_argument'}->checkNotNull();
if(!${'title3_argument'}->isValid()) return ${'title3_argument'}->getErrorMessage();
if(${'title3_argument'} !== null) ${'title3_argument'}->setColumnType('varchar');

${'regdate4_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate4_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate4_argument'}->isValid()) return ${'regdate4_argument'}->getErrorMessage();
if(${'regdate4_argument'} !== null) ${'regdate4_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`friend_group_srl`', ${'friend_group_srl1_argument'})
,new InsertExpression('`member_srl`', ${'member_srl2_argument'})
,new InsertExpression('`title`', ${'title3_argument'})
,new InsertExpression('`regdate`', ${'regdate4_argument'})
));
$query->setTables(array(
new Table('`xe_member_friend_group`', '`member_friend_group`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>