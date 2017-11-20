<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSiteCounterStatus");
$query->setAction("select");
$query->setPriority("");

${'regdate1_argument'} = new ConditionArgument('regdate', $args->regdate, 'in');
${'regdate1_argument'}->checkNotNull();
${'regdate1_argument'}->createConditionValue();
if(!${'regdate1_argument'}->isValid()) return ${'regdate1_argument'}->getErrorMessage();
if(${'regdate1_argument'} !== null) ${'regdate1_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_counter_status`', '`counter_status`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`regdate`',$regdate1_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>