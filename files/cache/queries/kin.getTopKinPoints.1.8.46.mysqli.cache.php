<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTopKinPoints");
$query->setAction("select");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl11_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'in');
${'member_srl11_argument'}->createConditionValue();
if(!${'member_srl11_argument'}->isValid()) return ${'member_srl11_argument'}->getErrorMessage();
} else
${'member_srl11_argument'} = NULL;if(${'member_srl11_argument'} !== null) ${'member_srl11_argument'}->setColumnType('number');
if(isset($args->startTime)) {
${'startTime12_argument'} = new ConditionArgument('startTime', $args->startTime, 'excess');
${'startTime12_argument'}->createConditionValue();
if(!${'startTime12_argument'}->isValid()) return ${'startTime12_argument'}->getErrorMessage();
} else
${'startTime12_argument'} = NULL;if(${'startTime12_argument'} !== null) ${'startTime12_argument'}->setColumnType('number');
if(isset($args->endTime)) {
${'endTime13_argument'} = new ConditionArgument('endTime', $args->endTime, 'below');
${'endTime13_argument'}->createConditionValue();
if(!${'endTime13_argument'}->isValid()) return ${'endTime13_argument'}->getErrorMessage();
} else
${'endTime13_argument'} = NULL;if(${'endTime13_argument'} !== null) ${'endTime13_argument'}->setColumnType('number');
if(isset($args->search_keyword)) {
${'search_keyword14_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword14_argument'}->createConditionValue();
if(!${'search_keyword14_argument'}->isValid()) return ${'search_keyword14_argument'}->getErrorMessage();
} else
${'search_keyword14_argument'} = NULL;if(${'search_keyword14_argument'} !== null) ${'search_keyword14_argument'}->setColumnType('varchar');

${'page16_argument'} = new Argument('page', $args->{'page'});
${'page16_argument'}->ensureDefaultValue('1');
if(!${'page16_argument'}->isValid()) return ${'page16_argument'}->getErrorMessage();

${'page_count17_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count17_argument'}->ensureDefaultValue('10');
if(!${'page_count17_argument'}->isValid()) return ${'page_count17_argument'}->getErrorMessage();

${'listNumber18_argument'} = new Argument('listNumber', $args->{'listNumber'});
${'listNumber18_argument'}->ensureDefaultValue('5');
if(!${'listNumber18_argument'}->isValid()) return ${'listNumber18_argument'}->getErrorMessage();

${'sort_index15_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index15_argument'}->ensureDefaultValue('point');
if(!${'sort_index15_argument'}->isValid()) return ${'sort_index15_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('sum(`p`.`point`)', '`point`')
,new SelectExpression('`m`.`member_srl`', '`member_srl`')
,new SelectExpression('`m`.`user_name`', '`user_name`')
,new SelectExpression('`m`.`user_id`', '`user_id`')
,new SelectExpression('`m`.`nick_name`', '`nick_name`')
));
$query->setTables(array(
new Table('`xe_kin_point_log`', '`p`')
,new Table('`xe_member`', '`m`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`p`.`member_srl`','`m`.`member_srl`',"equal", 'and')
,new ConditionWithArgument('`p`.`member_srl`',$member_srl11_argument,"in", 'and')
,new ConditionWithArgument('`p`.`in_time`',$startTime12_argument,"excess", 'and')
,new ConditionWithArgument('`p`.`in_time`',$endTime13_argument,"below", 'and')
,new ConditionWithArgument('`m`.`nick_name`',$search_keyword14_argument,"like", 'and')))
));
$query->setGroups(array(
'`user_name`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index15_argument'}, "desc")
));
$query->setLimit(new Limit(${'listNumber18_argument'}, ${'page16_argument'}, ${'page_count17_argument'}));
return $query; ?>