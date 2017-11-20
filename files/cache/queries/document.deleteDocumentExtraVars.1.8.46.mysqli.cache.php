<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDocumentExtraVars");
$query->setAction("delete");
$query->setPriority("");

${'module_srl55_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl55_argument'}->checkFilter('number');
${'module_srl55_argument'}->checkNotNull();
${'module_srl55_argument'}->createConditionValue();
if(!${'module_srl55_argument'}->isValid()) return ${'module_srl55_argument'}->getErrorMessage();
if(${'module_srl55_argument'} !== null) ${'module_srl55_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl56_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl56_argument'}->checkFilter('number');
${'document_srl56_argument'}->createConditionValue();
if(!${'document_srl56_argument'}->isValid()) return ${'document_srl56_argument'}->getErrorMessage();
} else
${'document_srl56_argument'} = NULL;if(${'document_srl56_argument'} !== null) ${'document_srl56_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx57_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx57_argument'}->checkFilter('number');
${'var_idx57_argument'}->createConditionValue();
if(!${'var_idx57_argument'}->isValid()) return ${'var_idx57_argument'}->getErrorMessage();
} else
${'var_idx57_argument'} = NULL;if(${'var_idx57_argument'} !== null) ${'var_idx57_argument'}->setColumnType('number');
if(isset($args->lang_code)) {
${'lang_code58_argument'} = new ConditionArgument('lang_code', $args->lang_code, 'equal');
${'lang_code58_argument'}->createConditionValue();
if(!${'lang_code58_argument'}->isValid()) return ${'lang_code58_argument'}->getErrorMessage();
} else
${'lang_code58_argument'} = NULL;if(${'lang_code58_argument'} !== null) ${'lang_code58_argument'}->setColumnType('varchar');
if(isset($args->eid)) {
${'eid59_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid59_argument'}->createConditionValue();
if(!${'eid59_argument'}->isValid()) return ${'eid59_argument'}->getErrorMessage();
} else
${'eid59_argument'} = NULL;if(${'eid59_argument'} !== null) ${'eid59_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl55_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl56_argument,"equal", 'and')
,new ConditionWithArgument('`var_idx`',$var_idx57_argument,"equal", 'and')
,new ConditionWithArgument('`lang_code`',$lang_code58_argument,"equal", 'and')
,new ConditionWithArgument('`eid`',$eid59_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>