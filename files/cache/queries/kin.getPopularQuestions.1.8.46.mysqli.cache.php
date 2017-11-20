<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getPopularQuestions");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl24_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl24_argument'}->checkFilter('number');
${'module_srl24_argument'}->createConditionValue();
if(!${'module_srl24_argument'}->isValid()) return ${'module_srl24_argument'}->getErrorMessage();
} else
${'module_srl24_argument'} = NULL;if(${'module_srl24_argument'} !== null) ${'module_srl24_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl25_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'in');
${'category_srl25_argument'}->createConditionValue();
if(!${'category_srl25_argument'}->isValid()) return ${'category_srl25_argument'}->getErrorMessage();
} else
${'category_srl25_argument'} = NULL;if(${'category_srl25_argument'} !== null) ${'category_srl25_argument'}->setColumnType('number');
if(isset($args->category_childs)) {
${'category_childs26_argument'} = new ConditionArgument('category_childs', $args->category_childs, 'in');
${'category_childs26_argument'}->createConditionValue();
if(!${'category_childs26_argument'}->isValid()) return ${'category_childs26_argument'}->getErrorMessage();
} else
${'category_childs26_argument'} = NULL;if(${'category_childs26_argument'} !== null) ${'category_childs26_argument'}->setColumnType('number');
if(isset($args->search_keyword)) {
${'search_keyword27_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword27_argument'}->createConditionValue();
if(!${'search_keyword27_argument'}->isValid()) return ${'search_keyword27_argument'}->getErrorMessage();
} else
${'search_keyword27_argument'} = NULL;if(${'search_keyword27_argument'} !== null) ${'search_keyword27_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword28_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword28_argument'}->createConditionValue();
if(!${'search_keyword28_argument'}->isValid()) return ${'search_keyword28_argument'}->getErrorMessage();
} else
${'search_keyword28_argument'} = NULL;if(${'search_keyword28_argument'} !== null) ${'search_keyword28_argument'}->setColumnType('bigtext');

${'page31_argument'} = new Argument('page', $args->{'page'});
${'page31_argument'}->ensureDefaultValue('1');
if(!${'page31_argument'}->isValid()) return ${'page31_argument'}->getErrorMessage();

${'page_count32_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count32_argument'}->ensureDefaultValue('10');
if(!${'page_count32_argument'}->isValid()) return ${'page_count32_argument'}->getErrorMessage();

${'list_count33_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count33_argument'}->ensureDefaultValue('20');
if(!${'list_count33_argument'}->isValid()) return ${'list_count33_argument'}->getErrorMessage();

${'sort_index29_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index29_argument'}->ensureDefaultValue('doc.voted_count');
if(!${'sort_index29_argument'}->isValid()) return ${'sort_index29_argument'}->getErrorMessage();

${'order_type30_argument'} = new SortArgument('order_type30', $args->order_type);
${'order_type30_argument'}->ensureDefaultValue('asc');
if(!${'order_type30_argument'}->isValid()) return ${'order_type30_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`doc`.*')
,new SelectExpression('`kin_thread`.`selected`', '`selected`')
));
$query->setTables(array(
new Table('`xe_documents`', '`doc`')
,new JoinTable('`xe_kin_thread`', '`kin_thread`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`doc`.`document_srl`','`kin_thread`.`document_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`doc`.`module_srl`',$module_srl24_argument,"equal")))
,new ConditionGroup(array(
new ConditionWithArgument('`doc`.`category_srl`',$category_srl25_argument,"in")
,new ConditionWithArgument('`doc`.`category_srl`',$category_childs26_argument,"in", 'or')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`doc`.`title`',$search_keyword27_argument,"like")
,new ConditionWithArgument('`doc`.`content`',$search_keyword28_argument,"like", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index29_argument'}, $order_type30_argument)
));
$query->setLimit(new Limit(${'list_count33_argument'}, ${'page31_argument'}, ${'page_count32_argument'}));
return $query; ?>