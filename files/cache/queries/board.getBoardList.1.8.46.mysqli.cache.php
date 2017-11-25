<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getBoardList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->s_module_category_srl)) {
${'s_module_category_srl1_argument'} = new ConditionArgument('s_module_category_srl', $args->s_module_category_srl, 'equal');
${'s_module_category_srl1_argument'}->createConditionValue();
if(!${'s_module_category_srl1_argument'}->isValid()) return ${'s_module_category_srl1_argument'}->getErrorMessage();
} else
${'s_module_category_srl1_argument'} = NULL;if(${'s_module_category_srl1_argument'} !== null) ${'s_module_category_srl1_argument'}->setColumnType('number');
if(isset($args->s_mid)) {
${'s_mid2_argument'} = new ConditionArgument('s_mid', $args->s_mid, 'like');
${'s_mid2_argument'}->createConditionValue();
if(!${'s_mid2_argument'}->isValid()) return ${'s_mid2_argument'}->getErrorMessage();
} else
${'s_mid2_argument'} = NULL;if(${'s_mid2_argument'} !== null) ${'s_mid2_argument'}->setColumnType('varchar');
if(isset($args->s_browser_title)) {
${'s_browser_title3_argument'} = new ConditionArgument('s_browser_title', $args->s_browser_title, 'like');
${'s_browser_title3_argument'}->createConditionValue();
if(!${'s_browser_title3_argument'}->isValid()) return ${'s_browser_title3_argument'}->getErrorMessage();
} else
${'s_browser_title3_argument'} = NULL;if(${'s_browser_title3_argument'} !== null) ${'s_browser_title3_argument'}->setColumnType('varchar');
if(isset($args->s_comment)) {
${'s_comment4_argument'} = new ConditionArgument('s_comment', $args->s_comment, 'like');
${'s_comment4_argument'}->createConditionValue();
if(!${'s_comment4_argument'}->isValid()) return ${'s_comment4_argument'}->getErrorMessage();
} else
${'s_comment4_argument'} = NULL;
${'page6_argument'} = new Argument('page', $args->{'page'});
${'page6_argument'}->ensureDefaultValue('1');
if(!${'page6_argument'}->isValid()) return ${'page6_argument'}->getErrorMessage();

${'page_count7_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count7_argument'}->ensureDefaultValue('10');
if(!${'page_count7_argument'}->isValid()) return ${'page_count7_argument'}->getErrorMessage();

${'list_count8_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count8_argument'}->ensureDefaultValue('20');
if(!${'list_count8_argument'}->isValid()) return ${'list_count8_argument'}->getErrorMessage();

${'sort_index5_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index5_argument'}->ensureDefaultValue('module_srl');
if(!${'sort_index5_argument'}->isValid()) return ${'sort_index5_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`module`',"'board'","equal")
,new ConditionWithArgument('`module_category_srl`',$s_module_category_srl1_argument,"equal", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`mid`',$s_mid2_argument,"like", 'or')
,new ConditionWithArgument('`browser_title`',$s_browser_title3_argument,"like", 'or')
,new ConditionWithArgument('`comment`',$s_comment4_argument,"like", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index5_argument'}, "desc")
));
$query->setLimit(new Limit(${'list_count8_argument'}, ${'page6_argument'}, ${'page_count7_argument'}));
return $query; ?>