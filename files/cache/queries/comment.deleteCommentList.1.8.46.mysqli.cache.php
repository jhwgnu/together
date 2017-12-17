<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteCommentList");
$query->setAction("delete");
$query->setPriority("");

${'comment_srl3_argument'} = new ConditionArgument('comment_srl', $args->comment_srl, 'equal');
${'comment_srl3_argument'}->checkFilter('number');
${'comment_srl3_argument'}->checkNotNull();
${'comment_srl3_argument'}->createConditionValue();
if(!${'comment_srl3_argument'}->isValid()) return ${'comment_srl3_argument'}->getErrorMessage();
if(${'comment_srl3_argument'} !== null) ${'comment_srl3_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_comments_list`', '`comments_list`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comment_srl`',$comment_srl3_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>