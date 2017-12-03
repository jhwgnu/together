<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentListWithinComment");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
} else
${'module_srl1_argument'} = NULL;if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->exclude_module_srl)) {
${'exclude_module_srl2_argument'} = new ConditionArgument('exclude_module_srl', $args->exclude_module_srl, 'notin');
${'exclude_module_srl2_argument'}->checkFilter('number');
${'exclude_module_srl2_argument'}->createConditionValue();
if(!${'exclude_module_srl2_argument'}->isValid()) return ${'exclude_module_srl2_argument'}->getErrorMessage();
} else
${'exclude_module_srl2_argument'} = NULL;if(${'exclude_module_srl2_argument'} !== null) ${'exclude_module_srl2_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl3_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl3_argument'}->createConditionValue();
if(!${'category_srl3_argument'}->isValid()) return ${'category_srl3_argument'}->getErrorMessage();
} else
${'category_srl3_argument'} = NULL;if(${'category_srl3_argument'} !== null) ${'category_srl3_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl4_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl4_argument'}->checkFilter('number');
${'member_srl4_argument'}->createConditionValue();
if(!${'member_srl4_argument'}->isValid()) return ${'member_srl4_argument'}->getErrorMessage();
} else
${'member_srl4_argument'} = NULL;if(${'member_srl4_argument'} !== null) ${'member_srl4_argument'}->setColumnType('number');
if(isset($args->statusList)) {
${'statusList5_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList5_argument'}->createConditionValue();
if(!${'statusList5_argument'}->isValid()) return ${'statusList5_argument'}->getErrorMessage();
} else
${'statusList5_argument'} = NULL;if(${'statusList5_argument'} !== null) ${'statusList5_argument'}->setColumnType('varchar');

${'s_comment6_argument'} = new ConditionArgument('s_comment', $args->s_comment, 'like');
${'s_comment6_argument'}->checkNotNull();
${'s_comment6_argument'}->createConditionValue();
if(!${'s_comment6_argument'}->isValid()) return ${'s_comment6_argument'}->getErrorMessage();
if(${'s_comment6_argument'} !== null) ${'s_comment6_argument'}->setColumnType('bigtext');
if(isset($args->division)) {
${'division7_argument'} = new ConditionArgument('division', $args->division, 'more');
${'division7_argument'}->createConditionValue();
if(!${'division7_argument'}->isValid()) return ${'division7_argument'}->getErrorMessage();
} else
${'division7_argument'} = NULL;if(${'division7_argument'} !== null) ${'division7_argument'}->setColumnType('number');
if(isset($args->last_division)) {
${'last_division8_argument'} = new ConditionArgument('last_division', $args->last_division, 'below');
${'last_division8_argument'}->createConditionValue();
if(!${'last_division8_argument'}->isValid()) return ${'last_division8_argument'}->getErrorMessage();
} else
${'last_division8_argument'} = NULL;if(${'last_division8_argument'} !== null) ${'last_division8_argument'}->setColumnType('number');

${'page10_argument'} = new Argument('page', $args->{'page'});
${'page10_argument'}->ensureDefaultValue('1');
if(!${'page10_argument'}->isValid()) return ${'page10_argument'}->getErrorMessage();

${'page_count11_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count11_argument'}->ensureDefaultValue('10');
if(!${'page_count11_argument'}->isValid()) return ${'page_count11_argument'}->getErrorMessage();

${'list_count12_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count12_argument'}->ensureDefaultValue('20');
if(!${'list_count12_argument'}->isValid()) return ${'list_count12_argument'}->getErrorMessage();

${'sort_index9_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index9_argument'}->ensureDefaultValue('comments.list_order');
if(!${'sort_index9_argument'}->isValid()) return ${'sort_index9_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`documents`.`document_srl`')
,new SelectExpression('`documents`.`list_order`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
,new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`documents`.`module_srl`',$module_srl1_argument,"in")
,new ConditionWithArgument('`documents`.`module_srl`',$exclude_module_srl2_argument,"notin", 'and')
,new ConditionWithArgument('`documents`.`category_srl`',$category_srl3_argument,"equal", 'and')
,new ConditionWithoutArgument('`documents`.`document_srl`','`comments`.`document_srl`',"equal", 'and')
,new ConditionWithArgument('`documents`.`member_srl`',$member_srl4_argument,"equal", 'and')
,new ConditionWithArgument('`documents`.`status`',$statusList5_argument,"in", 'and')
,new ConditionWithArgument('`comments`.`content`',$s_comment6_argument,"like", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`documents`.`list_order`',$division7_argument,"more", 'and')
,new ConditionWithArgument('`documents`.`list_order`',$last_division8_argument,"below", 'and')),'and')
));
$query->setGroups(array(
'`documents`.`document_srl`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index9_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count12_argument'}, ${'page10_argument'}, ${'page_count11_argument'}));
return $query; ?>