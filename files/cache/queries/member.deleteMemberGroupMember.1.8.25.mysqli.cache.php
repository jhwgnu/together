<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteMemberGroupMember");
$query->setAction("delete");
$query->setPriority("");

${'member_srl21_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl21_argument'}->checkFilter('number');
${'member_srl21_argument'}->checkNotNull();
${'member_srl21_argument'}->createConditionValue();
if(!${'member_srl21_argument'}->isValid()) return ${'member_srl21_argument'}->getErrorMessage();
if(${'member_srl21_argument'} !== null) ${'member_srl21_argument'}->setColumnType('number');
if(isset($args->group_srl)) {
${'group_srl22_argument'} = new ConditionArgument('group_srl', $args->group_srl, 'equal');
${'group_srl22_argument'}->checkFilter('number');
${'group_srl22_argument'}->createConditionValue();
if(!${'group_srl22_argument'}->isValid()) return ${'group_srl22_argument'}->getErrorMessage();
} else
${'group_srl22_argument'} = NULL;if(${'group_srl22_argument'} !== null) ${'group_srl22_argument'}->setColumnType('number');
if(isset($args->site_srl)) {
${'site_srl23_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl23_argument'}->checkFilter('number');
${'site_srl23_argument'}->createConditionValue();
if(!${'site_srl23_argument'}->isValid()) return ${'site_srl23_argument'}->getErrorMessage();
} else
${'site_srl23_argument'} = NULL;if(${'site_srl23_argument'} !== null) ${'site_srl23_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_member_group_member`', '`member_group_member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl21_argument,"equal")
,new ConditionWithArgument('`group_srl`',$group_srl22_argument,"equal", 'and')
,new ConditionWithArgument('`site_srl`',$site_srl23_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>