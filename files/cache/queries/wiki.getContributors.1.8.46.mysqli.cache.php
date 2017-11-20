<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getContributors");
$query->setAction("select");
$query->setPriority("");
if(isset($args->document_srl)) {
${'document_srl3_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl3_argument'}->createConditionValue();
if(!${'document_srl3_argument'}->isValid()) return ${'document_srl3_argument'}->getErrorMessage();
} else
${'document_srl3_argument'} = NULL;if(${'document_srl3_argument'} !== null) ${'document_srl3_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`member_srl`', '`member_srl`')
,new SelectExpression('`nick_name`', '`nick_name`')
));
$query->setTables(array(
new Table('`xe_document_histories`', '`document_histories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl3_argument,"equal")))
));
$query->setGroups(array(
'`member_srl`' ,'`nick_name`' ));
$query->setOrder(array());
$query->setLimit();
return $query; ?>