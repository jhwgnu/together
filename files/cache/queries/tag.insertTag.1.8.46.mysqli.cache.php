<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertTag");
$query->setAction("insert");
$query->setPriority("");

${'tag_srl1_argument'} = new Argument('tag_srl', $args->{'tag_srl'});
$db = DB::getInstance(); $sequence = $db->getNextSequence(); ${'tag_srl1_argument'}->ensureDefaultValue($sequence);
${'tag_srl1_argument'}->checkNotNull();
if(!${'tag_srl1_argument'}->isValid()) return ${'tag_srl1_argument'}->getErrorMessage();
if(${'tag_srl1_argument'} !== null) ${'tag_srl1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->checkNotNull();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

${'document_srl3_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl3_argument'}->checkFilter('number');
${'document_srl3_argument'}->checkNotNull();
if(!${'document_srl3_argument'}->isValid()) return ${'document_srl3_argument'}->getErrorMessage();
if(${'document_srl3_argument'} !== null) ${'document_srl3_argument'}->setColumnType('number');

${'tag4_argument'} = new Argument('tag', $args->{'tag'});
${'tag4_argument'}->checkNotNull();
if(!${'tag4_argument'}->isValid()) return ${'tag4_argument'}->getErrorMessage();
if(${'tag4_argument'} !== null) ${'tag4_argument'}->setColumnType('varchar');

${'regdate5_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate5_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate5_argument'}->isValid()) return ${'regdate5_argument'}->getErrorMessage();
if(${'regdate5_argument'} !== null) ${'regdate5_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`tag_srl`', ${'tag_srl1_argument'})
,new InsertExpression('`module_srl`', ${'module_srl2_argument'})
,new InsertExpression('`document_srl`', ${'document_srl3_argument'})
,new InsertExpression('`tag`', ${'tag4_argument'})
,new InsertExpression('`regdate`', ${'regdate5_argument'})
));
$query->setTables(array(
new Table('`xe_tags`', '`tags`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>