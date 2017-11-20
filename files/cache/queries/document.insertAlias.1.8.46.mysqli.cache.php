<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertAlias");
$query->setAction("insert");
$query->setPriority("");

${'module_srl1_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->ensureDefaultValue('0');
${'module_srl1_argument'}->checkNotNull();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');

${'document_srl2_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl2_argument'}->checkFilter('number');
${'document_srl2_argument'}->ensureDefaultValue('0');
${'document_srl2_argument'}->checkNotNull();
if(!${'document_srl2_argument'}->isValid()) return ${'document_srl2_argument'}->getErrorMessage();
if(${'document_srl2_argument'} !== null) ${'document_srl2_argument'}->setColumnType('number');

${'alias_title3_argument'} = new Argument('alias_title', $args->{'alias_title'});
${'alias_title3_argument'}->checkNotNull();
if(!${'alias_title3_argument'}->isValid()) return ${'alias_title3_argument'}->getErrorMessage();
if(${'alias_title3_argument'} !== null) ${'alias_title3_argument'}->setColumnType('varchar');

${'alias_srl4_argument'} = new Argument('alias_srl', $args->{'alias_srl'});
${'alias_srl4_argument'}->checkFilter('number');
${'alias_srl4_argument'}->ensureDefaultValue('0');
${'alias_srl4_argument'}->checkNotNull();
if(!${'alias_srl4_argument'}->isValid()) return ${'alias_srl4_argument'}->getErrorMessage();
if(${'alias_srl4_argument'} !== null) ${'alias_srl4_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl1_argument'})
,new InsertExpression('`document_srl`', ${'document_srl2_argument'})
,new InsertExpression('`alias_title`', ${'alias_title3_argument'})
,new InsertExpression('`alias_srl`', ${'alias_srl4_argument'})
));
$query->setTables(array(
new Table('`xe_document_aliases`', '`document_aliases`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>