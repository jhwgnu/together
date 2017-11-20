<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberCountByDate");
$query->setAction("select");
$query->setPriority("");
if(isset($args->regDate)) {
${'regDate1_argument'} = new ConditionArgument('regDate', $args->regDate, 'like_prefix');
${'regDate1_argument'}->createConditionValue();
if(!${'regDate1_argument'}->isValid()) return ${'regDate1_argument'}->getErrorMessage();
} else
${'regDate1_argument'} = NULL;if(${'regDate1_argument'} !== null) ${'regDate1_argument'}->setColumnType('date');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`regdate`',$regDate1_argument,"like_prefix")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>