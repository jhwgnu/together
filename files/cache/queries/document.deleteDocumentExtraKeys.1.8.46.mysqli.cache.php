<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDocumentExtraKeys");
$query->setAction("delete");
$query->setPriority("");

${'module_srl52_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl52_argument'}->checkFilter('number');
${'module_srl52_argument'}->checkNotNull();
${'module_srl52_argument'}->createConditionValue();
if(!${'module_srl52_argument'}->isValid()) return ${'module_srl52_argument'}->getErrorMessage();
if(${'module_srl52_argument'} !== null) ${'module_srl52_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl53_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl53_argument'}->checkFilter('number');
${'document_srl53_argument'}->createConditionValue();
if(!${'document_srl53_argument'}->isValid()) return ${'document_srl53_argument'}->getErrorMessage();
} else
${'document_srl53_argument'} = NULL;if(isset($args->var_idx)) {
${'var_idx54_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx54_argument'}->checkFilter('number');
${'var_idx54_argument'}->createConditionValue();
if(!${'var_idx54_argument'}->isValid()) return ${'var_idx54_argument'}->getErrorMessage();
} else
${'var_idx54_argument'} = NULL;if(${'var_idx54_argument'} !== null) ${'var_idx54_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_document_extra_keys`', '`document_extra_keys`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl52_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl53_argument,"equal", 'and')
,new ConditionWithArgument('`var_idx`',$var_idx54_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>