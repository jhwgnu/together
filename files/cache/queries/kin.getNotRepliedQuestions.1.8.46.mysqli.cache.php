<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNotRepliedQuestions");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
} else
${'module_srl1_argument'} = NULL;if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl2_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl2_argument'}->createConditionValue();
if(!${'category_srl2_argument'}->isValid()) return ${'category_srl2_argument'}->getErrorMessage();
} else
${'category_srl2_argument'} = NULL;if(${'category_srl2_argument'} !== null) ${'category_srl2_argument'}->setColumnType('number');
if(isset($args->category_childs)) {
${'category_childs3_argument'} = new ConditionArgument('category_childs', $args->category_childs, 'in');
${'category_childs3_argument'}->createConditionValue();
if(!${'category_childs3_argument'}->isValid()) return ${'category_childs3_argument'}->getErrorMessage();
} else
${'category_childs3_argument'} = NULL;if(${'category_childs3_argument'} !== null) ${'category_childs3_argument'}->setColumnType('number');
if(isset($args->search_keyword)) {
${'search_keyword4_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword4_argument'}->createConditionValue();
if(!${'search_keyword4_argument'}->isValid()) return ${'search_keyword4_argument'}->getErrorMessage();
} else
${'search_keyword4_argument'} = NULL;if(${'search_keyword4_argument'} !== null) ${'search_keyword4_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword5_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword5_argument'}->createConditionValue();
if(!${'search_keyword5_argument'}->isValid()) return ${'search_keyword5_argument'}->getErrorMessage();
} else
${'search_keyword5_argument'} = NULL;if(${'search_keyword5_argument'} !== null) ${'search_keyword5_argument'}->setColumnType('bigtext');

${'page8_argument'} = new Argument('page', $args->{'page'});
${'page8_argument'}->ensureDefaultValue('1');
if(!${'page8_argument'}->isValid()) return ${'page8_argument'}->getErrorMessage();

${'page_count9_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count9_argument'}->ensureDefaultValue('10');
if(!${'page_count9_argument'}->isValid()) return ${'page_count9_argument'}->getErrorMessage();

${'list_count10_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count10_argument'}->ensureDefaultValue('20');
if(!${'list_count10_argument'}->isValid()) return ${'list_count10_argument'}->getErrorMessage();

${'sort_index6_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index6_argument'}->ensureDefaultValue('doc.list_order');
if(!${'sort_index6_argument'}->isValid()) return ${'sort_index6_argument'}->getErrorMessage();

${'order_type7_argument'} = new SortArgument('order_type7', $args->order_type);
${'order_type7_argument'}->ensureDefaultValue('asc');
if(!${'order_type7_argument'}->isValid()) return ${'order_type7_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`doc`.*')
));
$query->setTables(array(
new Table('`xe_documents`', '`doc`')
,new JoinTable('`xe_kin_thread`', '`kin`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`doc`.`document_srl`','`kin`.`document_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`doc`.`module_srl`',$module_srl1_argument,"equal")
,new ConditionWithoutArgument('`kin`.`selected`','1',"null", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`doc`.`category_srl`',$category_srl2_argument,"equal")
,new ConditionWithArgument('`doc`.`category_srl`',$category_childs3_argument,"in", 'or')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`doc`.`title`',$search_keyword4_argument,"like")
,new ConditionWithArgument('`doc`.`content`',$search_keyword5_argument,"like", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index6_argument'}, $order_type7_argument)
));
$query->setLimit(new Limit(${'list_count10_argument'}, ${'page8_argument'}, ${'page_count9_argument'}));
return $query; ?>