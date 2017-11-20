<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentTranslationLangCodes");
$query->setAction("select");
$query->setPriority("");

${'document_srl4_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl4_argument'}->checkNotNull();
${'document_srl4_argument'}->createConditionValue();
if(!${'document_srl4_argument'}->isValid()) return ${'document_srl4_argument'}->getErrorMessage();
if(${'document_srl4_argument'} !== null) ${'document_srl4_argument'}->setColumnType('number');

${'var_idx5_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx5_argument'}->ensureDefaultValue('-2');
${'var_idx5_argument'}->checkNotNull();
${'var_idx5_argument'}->createConditionValue();
if(!${'var_idx5_argument'}->isValid()) return ${'var_idx5_argument'}->getErrorMessage();
if(${'var_idx5_argument'} !== null) ${'var_idx5_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('DISTINCT(`lang_code`)')
));
$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl4_argument,"equal")
,new ConditionWithArgument('`var_idx`',$var_idx5_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>