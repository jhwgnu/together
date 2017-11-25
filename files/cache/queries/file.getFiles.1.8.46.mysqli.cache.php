<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getFiles");
$query->setAction("select");
$query->setPriority("");

${'upload_target_srl6_argument'} = new ConditionArgument('upload_target_srl', $args->upload_target_srl, 'equal');
${'upload_target_srl6_argument'}->checkFilter('number');
${'upload_target_srl6_argument'}->checkNotNull();
${'upload_target_srl6_argument'}->createConditionValue();
if(!${'upload_target_srl6_argument'}->isValid()) return ${'upload_target_srl6_argument'}->getErrorMessage();
if(${'upload_target_srl6_argument'} !== null) ${'upload_target_srl6_argument'}->setColumnType('number');
if(isset($args->isvalid)) {
${'isvalid7_argument'} = new ConditionArgument('isvalid', $args->isvalid, 'equal');
${'isvalid7_argument'}->createConditionValue();
if(!${'isvalid7_argument'}->isValid()) return ${'isvalid7_argument'}->getErrorMessage();
} else
${'isvalid7_argument'} = NULL;if(${'isvalid7_argument'} !== null) ${'isvalid7_argument'}->setColumnType('char');
if(isset($args->sort_index)) {
${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();
} else
${'sort_index8_argument'} = NULL;
$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`upload_target_srl`',$upload_target_srl6_argument,"equal")
,new ConditionWithArgument('`isvalid`',$isvalid7_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, "asc")
));
$query->setLimit();
return $query; ?>