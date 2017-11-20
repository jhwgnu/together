<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberCountByDate");
$query->setAction("select");
$query->setPriority("");
if(isset($args->regDate)) {
${'regDate7_argument'} = new ConditionArgument('regDate', $args->regDate, 'like_prefix');
${'regDate7_argument'}->createConditionValue();
if(!${'regDate7_argument'}->isValid()) return ${'regDate7_argument'}->getErrorMessage();
} else
${'regDate7_argument'} = NULL;if(${'regDate7_argument'} !== null) ${'regDate7_argument'}->setColumnType('date');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`regdate`',$regDate7_argument,"like_prefix")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>