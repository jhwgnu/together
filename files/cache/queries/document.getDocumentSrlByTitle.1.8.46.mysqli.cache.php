<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentSrlByTitle");
$query->setAction("select");
$query->setPriority("");

${'title1_argument'} = new ConditionArgument('title', $args->title, 'equal');
${'title1_argument'}->checkNotNull();
${'title1_argument'}->createConditionValue();
if(!${'title1_argument'}->isValid()) return ${'title1_argument'}->getErrorMessage();
if(${'title1_argument'} !== null) ${'title1_argument'}->setColumnType('varchar');

${'module_srl2_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl2_argument'}->checkNotNull();
${'module_srl2_argument'}->createConditionValue();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`document_srl`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
,new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`title`',$title1_argument,"equal")
,new ConditionWithArgument('`modules`.`module_srl`',$module_srl2_argument,"equal", 'and')
,new ConditionWithoutArgument('`modules`.`module_srl`','`documents`.`module_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>