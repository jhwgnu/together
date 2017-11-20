<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteHistory");
$query->setAction("delete");
$query->setPriority("");
if(isset($args->history_srl)) {
${'history_srl63_argument'} = new ConditionArgument('history_srl', $args->history_srl, 'equal');
${'history_srl63_argument'}->checkFilter('number');
${'history_srl63_argument'}->createConditionValue();
if(!${'history_srl63_argument'}->isValid()) return ${'history_srl63_argument'}->getErrorMessage();
} else
${'history_srl63_argument'} = NULL;if(${'history_srl63_argument'} !== null) ${'history_srl63_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl64_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl64_argument'}->checkFilter('number');
${'document_srl64_argument'}->createConditionValue();
if(!${'document_srl64_argument'}->isValid()) return ${'document_srl64_argument'}->getErrorMessage();
} else
${'document_srl64_argument'} = NULL;if(${'document_srl64_argument'} !== null) ${'document_srl64_argument'}->setColumnType('number');
if(isset($args->module_srl)) {
${'module_srl65_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl65_argument'}->checkFilter('number');
${'module_srl65_argument'}->createConditionValue();
if(!${'module_srl65_argument'}->isValid()) return ${'module_srl65_argument'}->getErrorMessage();
} else
${'module_srl65_argument'} = NULL;if(${'module_srl65_argument'} !== null) ${'module_srl65_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_document_histories`', '`document_histories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`history_srl`',$history_srl63_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl64_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl65_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>