<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCommentParentNextSibling");
$query->setAction("select");
$query->setPriority("");

${'head1_argument'} = new ConditionArgument('head', $args->head, 'equal');
${'head1_argument'}->checkFilter('number');
${'head1_argument'}->checkNotNull();
${'head1_argument'}->createConditionValue();
if(!${'head1_argument'}->isValid()) return ${'head1_argument'}->getErrorMessage();
if(${'head1_argument'} !== null) ${'head1_argument'}->setColumnType('number');

${'arrange2_argument'} = new ConditionArgument('arrange', $args->arrange, 'excess');
${'arrange2_argument'}->checkFilter('number');
${'arrange2_argument'}->checkNotNull();
${'arrange2_argument'}->createConditionValue();
if(!${'arrange2_argument'}->isValid()) return ${'arrange2_argument'}->getErrorMessage();
if(${'arrange2_argument'} !== null) ${'arrange2_argument'}->setColumnType('number');

${'depth3_argument'} = new ConditionArgument('depth', $args->depth, 'less');
${'depth3_argument'}->checkFilter('number');
${'depth3_argument'}->checkNotNull();
${'depth3_argument'}->createConditionValue();
if(!${'depth3_argument'}->isValid()) return ${'depth3_argument'}->getErrorMessage();
if(${'depth3_argument'} !== null) ${'depth3_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('min(`comments_list`.`arrange`)', '`arrange`')
));
$query->setTables(array(
new Table('`xe_comments_list`', '`comments_list`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comments_list`.`head`',$head1_argument,"equal")
,new ConditionWithArgument('`comments_list`.`arrange`',$arrange2_argument,"excess", 'and')
,new ConditionWithArgument('`comments_list`.`depth`',$depth3_argument,"less", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>