<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateQuestionVote");
$query->setAction("update");
$query->setPriority("");

${'voted_count1_argument'} = new Argument('voted_count', $args->{'voted_count'});
${'voted_count1_argument'}->checkNotNull();
if(!${'voted_count1_argument'}->isValid()) return ${'voted_count1_argument'}->getErrorMessage();
if(${'voted_count1_argument'} !== null) ${'voted_count1_argument'}->setColumnType('number');

${'extra_vars2_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
${'extra_vars2_argument'}->checkNotNull();
if(!${'extra_vars2_argument'}->isValid()) return ${'extra_vars2_argument'}->getErrorMessage();
if(${'extra_vars2_argument'} !== null) ${'extra_vars2_argument'}->setColumnType('text');

${'document_srl3_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl3_argument'}->checkFilter('number');
${'document_srl3_argument'}->checkNotNull();
${'document_srl3_argument'}->createConditionValue();
if(!${'document_srl3_argument'}->isValid()) return ${'document_srl3_argument'}->getErrorMessage();
if(${'document_srl3_argument'} !== null) ${'document_srl3_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`voted_count`', ${'voted_count1_argument'})
,new UpdateExpression('`extra_vars`', ${'extra_vars2_argument'})
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl3_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>