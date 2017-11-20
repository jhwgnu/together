<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDocumentExtraVars");
$query->setAction("delete");
$query->setPriority("");

${'module_srl18_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl18_argument'}->checkFilter('number');
${'module_srl18_argument'}->checkNotNull();
${'module_srl18_argument'}->createConditionValue();
if(!${'module_srl18_argument'}->isValid()) return ${'module_srl18_argument'}->getErrorMessage();
if(${'module_srl18_argument'} !== null) ${'module_srl18_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl19_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl19_argument'}->checkFilter('number');
${'document_srl19_argument'}->createConditionValue();
if(!${'document_srl19_argument'}->isValid()) return ${'document_srl19_argument'}->getErrorMessage();
} else
${'document_srl19_argument'} = NULL;if(${'document_srl19_argument'} !== null) ${'document_srl19_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx20_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx20_argument'}->checkFilter('number');
${'var_idx20_argument'}->createConditionValue();
if(!${'var_idx20_argument'}->isValid()) return ${'var_idx20_argument'}->getErrorMessage();
} else
${'var_idx20_argument'} = NULL;if(${'var_idx20_argument'} !== null) ${'var_idx20_argument'}->setColumnType('number');
if(isset($args->lang_code)) {
${'lang_code21_argument'} = new ConditionArgument('lang_code', $args->lang_code, 'equal');
${'lang_code21_argument'}->createConditionValue();
if(!${'lang_code21_argument'}->isValid()) return ${'lang_code21_argument'}->getErrorMessage();
} else
${'lang_code21_argument'} = NULL;if(${'lang_code21_argument'} !== null) ${'lang_code21_argument'}->setColumnType('varchar');
if(isset($args->eid)) {
${'eid22_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid22_argument'}->createConditionValue();
if(!${'eid22_argument'}->isValid()) return ${'eid22_argument'}->getErrorMessage();
} else
${'eid22_argument'} = NULL;if(${'eid22_argument'} !== null) ${'eid22_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl18_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl19_argument,"equal", 'and')
,new ConditionWithArgument('`var_idx`',$var_idx20_argument,"equal", 'and')
,new ConditionWithArgument('`lang_code`',$lang_code21_argument,"equal", 'and')
,new ConditionWithArgument('`eid`',$eid22_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>