<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCommentListItem");
$query->setAction("select");
$query->setPriority("");

${'comment_srl1_argument'} = new ConditionArgument('comment_srl', $args->comment_srl, 'equal');
${'comment_srl1_argument'}->checkNotNull();
${'comment_srl1_argument'}->createConditionValue();
if(!${'comment_srl1_argument'}->isValid()) return ${'comment_srl1_argument'}->getErrorMessage();
if(${'comment_srl1_argument'} !== null) ${'comment_srl1_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`comments`.`parent_srl`')
,new SelectExpression('`comments_list`.*')
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
,new Table('`xe_comments_list`', '`comments_list`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comments`.`comment_srl`',$comment_srl1_argument,"equal")
,new ConditionWithoutArgument('`comments`.`comment_srl`','`comments_list`.`comment_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>