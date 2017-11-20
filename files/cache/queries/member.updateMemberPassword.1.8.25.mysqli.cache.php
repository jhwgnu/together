<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMemberPassword");
$query->setAction("update");
$query->setPriority("");

${'password3_argument'} = new Argument('password', $args->{'password'});
${'password3_argument'}->checkNotNull();
if(!${'password3_argument'}->isValid()) return ${'password3_argument'}->getErrorMessage();
if(${'password3_argument'} !== null) ${'password3_argument'}->setColumnType('varchar');
if(isset($args->denied)) {
${'denied4_argument'} = new Argument('denied', $args->{'denied'});
if(!${'denied4_argument'}->isValid()) return ${'denied4_argument'}->getErrorMessage();
} else
${'denied4_argument'} = NULL;if(${'denied4_argument'} !== null) ${'denied4_argument'}->setColumnType('char');

${'member_srl5_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl5_argument'}->checkFilter('number');
${'member_srl5_argument'}->checkNotNull();
${'member_srl5_argument'}->createConditionValue();
if(!${'member_srl5_argument'}->isValid()) return ${'member_srl5_argument'}->getErrorMessage();
if(${'member_srl5_argument'} !== null) ${'member_srl5_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`password`', ${'password3_argument'})
,new UpdateExpression('`denied`', ${'denied4_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl5_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>