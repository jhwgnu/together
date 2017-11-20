<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentCountByDate");
$query->setAction("select");
$query->setPriority("");
if(isset($args->moduleSrlList)) {
${'moduleSrlList2_argument'} = new ConditionArgument('moduleSrlList', $args->moduleSrlList, 'in');
${'moduleSrlList2_argument'}->createConditionValue();
if(!${'moduleSrlList2_argument'}->isValid()) return ${'moduleSrlList2_argument'}->getErrorMessage();
} else
${'moduleSrlList2_argument'} = NULL;if(${'moduleSrlList2_argument'} !== null) ${'moduleSrlList2_argument'}->setColumnType('number');
if(isset($args->regDate)) {
${'regDate3_argument'} = new ConditionArgument('regDate', $args->regDate, 'like_prefix');
${'regDate3_argument'}->createConditionValue();
if(!${'regDate3_argument'}->isValid()) return ${'regDate3_argument'}->getErrorMessage();
} else
${'regDate3_argument'} = NULL;if(${'regDate3_argument'} !== null) ${'regDate3_argument'}->setColumnType('date');
if(isset($args->statusList)) {
${'statusList4_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList4_argument'}->createConditionValue();
if(!${'statusList4_argument'}->isValid()) return ${'statusList4_argument'}->getErrorMessage();
} else
${'statusList4_argument'} = NULL;if(${'statusList4_argument'} !== null) ${'statusList4_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$moduleSrlList2_argument,"in")
,new ConditionWithArgument('`regdate`',$regDate3_argument,"like_prefix", 'and')
,new ConditionWithArgument('`status`',$statusList4_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>