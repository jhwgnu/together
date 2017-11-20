<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentCountByDate");
$query->setAction("select");
$query->setPriority("");
if(isset($args->moduleSrlList)) {
${'moduleSrlList8_argument'} = new ConditionArgument('moduleSrlList', $args->moduleSrlList, 'in');
${'moduleSrlList8_argument'}->createConditionValue();
if(!${'moduleSrlList8_argument'}->isValid()) return ${'moduleSrlList8_argument'}->getErrorMessage();
} else
${'moduleSrlList8_argument'} = NULL;if(${'moduleSrlList8_argument'} !== null) ${'moduleSrlList8_argument'}->setColumnType('number');
if(isset($args->regDate)) {
${'regDate9_argument'} = new ConditionArgument('regDate', $args->regDate, 'like_prefix');
${'regDate9_argument'}->createConditionValue();
if(!${'regDate9_argument'}->isValid()) return ${'regDate9_argument'}->getErrorMessage();
} else
${'regDate9_argument'} = NULL;if(${'regDate9_argument'} !== null) ${'regDate9_argument'}->setColumnType('date');
if(isset($args->statusList)) {
${'statusList10_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList10_argument'}->createConditionValue();
if(!${'statusList10_argument'}->isValid()) return ${'statusList10_argument'}->getErrorMessage();
} else
${'statusList10_argument'} = NULL;if(${'statusList10_argument'} !== null) ${'statusList10_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$moduleSrlList8_argument,"in")
,new ConditionWithArgument('`regdate`',$regDate9_argument,"like_prefix", 'and')
,new ConditionWithArgument('`status`',$statusList10_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>