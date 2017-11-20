<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCategoryDocumentCount");
$query->setAction("select");
$query->setPriority("");

${'category_srl1_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl1_argument'}->checkFilter('number');
${'category_srl1_argument'}->checkNotNull();
${'category_srl1_argument'}->createConditionValue();
if(!${'category_srl1_argument'}->isValid()) return ${'category_srl1_argument'}->getErrorMessage();
if(${'category_srl1_argument'} !== null) ${'category_srl1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->checkNotNull();
${'module_srl2_argument'}->createConditionValue();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`category_srl`',$category_srl1_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl2_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>