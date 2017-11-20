<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTreeList");
$query->setAction("select");
$query->setPriority("");

${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->checkNotNull();
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->checkNotNull();
${'module_srl2_argument'}->createConditionValue();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

${'sort_index3_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index3_argument'}->ensureDefaultValue('COALESCE(category.list_order, 0)');
if(!${'sort_index3_argument'}->isValid()) return ${'sort_index3_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`doc`.`title`', '`title`')
,new SelectExpression('`doc`.`document_srl`', '`document_srl`')
,new SelectExpression('`category`.`parent_srl`', '`parent_srl`')
,new SelectExpression('`category`.`list_order`', '`list_order`')
));
$query->setTables(array(
new Table('`xe_documents`', '`doc`')
,new JoinTable('`xe_document_categories`', '`category`', "left join", array(
new ConditionGroup(array(
new ConditionWithArgument('`category`.`module_srl`',$module_srl1_argument,"equal")
,new ConditionWithoutArgument('`category`.`category_srl`','`doc`.`document_srl`',"equal", 'and')))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`doc`.`module_srl`',$module_srl2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index3_argument'}, "asc")
));
$query->setLimit();
return $query; ?>