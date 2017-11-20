<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLatestItemList");
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
${'category_srl2_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'in');
${'category_srl2_argument'}->checkFilter('number');
${'category_srl2_argument'}->createConditionValue();
if(!${'category_srl2_argument'}->isValid()) return ${'category_srl2_argument'}->getErrorMessage();
} else
${'category_srl2_argument'} = NULL;if(${'category_srl2_argument'} !== null) ${'category_srl2_argument'}->setColumnType('number');
if(isset($args->idx_category_srl)) {
${'idx_category_srl3_argument'} = new ConditionArgument('idx_category_srl', $args->idx_category_srl, 'more');
${'idx_category_srl3_argument'}->createConditionValue();
if(!${'idx_category_srl3_argument'}->isValid()) return ${'idx_category_srl3_argument'}->getErrorMessage();
} else
${'idx_category_srl3_argument'} = NULL;if(${'idx_category_srl3_argument'} !== null) ${'idx_category_srl3_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl4_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl4_argument'}->checkFilter('number');
${'member_srl4_argument'}->createConditionValue();
if(!${'member_srl4_argument'}->isValid()) return ${'member_srl4_argument'}->getErrorMessage();
} else
${'member_srl4_argument'} = NULL;if(${'member_srl4_argument'} !== null) ${'member_srl4_argument'}->setColumnType('number');
if(isset($args->search_keyword)) {
${'search_keyword5_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword5_argument'}->createConditionValue();
if(!${'search_keyword5_argument'}->isValid()) return ${'search_keyword5_argument'}->getErrorMessage();
} else
${'search_keyword5_argument'} = NULL;if(${'search_keyword5_argument'} !== null) ${'search_keyword5_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword6_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword6_argument'}->createConditionValue();
if(!${'search_keyword6_argument'}->isValid()) return ${'search_keyword6_argument'}->getErrorMessage();
} else
${'search_keyword6_argument'} = NULL;if(${'search_keyword6_argument'} !== null) ${'search_keyword6_argument'}->setColumnType('varchar');
if(isset($args->search_keyword)) {
${'search_keyword7_argument'} = new ConditionArgument('search_keyword', $args->search_keyword, 'like');
${'search_keyword7_argument'}->createConditionValue();
if(!${'search_keyword7_argument'}->isValid()) return ${'search_keyword7_argument'}->getErrorMessage();
} else
${'search_keyword7_argument'} = NULL;if(${'search_keyword7_argument'} !== null) ${'search_keyword7_argument'}->setColumnType('text');

${'page10_argument'} = new Argument('page', $args->{'page'});
${'page10_argument'}->ensureDefaultValue('1');
if(!${'page10_argument'}->isValid()) return ${'page10_argument'}->getErrorMessage();

${'page_count11_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count11_argument'}->ensureDefaultValue('10');
if(!${'page_count11_argument'}->isValid()) return ${'page_count11_argument'}->getErrorMessage();

${'list_count12_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count12_argument'}->ensureDefaultValue('20');
if(!${'list_count12_argument'}->isValid()) return ${'list_count12_argument'}->getErrorMessage();

${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index8_argument'}->ensureDefaultValue('package.update_order');
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();

${'order_type9_argument'} = new SortArgument('order_type9', $args->order_type);
${'order_type9_argument'}->ensureDefaultValue('asc');
if(!${'order_type9_argument'}->isValid()) return ${'order_type9_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`package`.`module_srl`', '`module_srl`')
,new SelectExpression('`package`.`status`', '`status`')
,new SelectExpression('`package`.`category_srl`', '`category_srl`')
,new SelectExpression('`package`.`member_srl`', '`member_srl`')
,new SelectExpression('`package`.`package_srl`', '`package_srl`')
,new SelectExpression('`package`.`path`', '`path`')
,new SelectExpression('`package`.`license`', '`license`')
,new SelectExpression('`package`.`title`', '`title`')
,new SelectExpression('`package`.`homepage`', '`homepage`')
,new SelectExpression('`package`.`description`', '`package_description`')
,new SelectExpression('`package`.`voter`', '`package_voter`')
,new SelectExpression('`package`.`voted`', '`package_voted`')
,new SelectExpression('`package`.`downloaded`', '`package_downloaded`')
,new SelectExpression('`package`.`regdate`', '`package_regdate`')
,new SelectExpression('`package`.`last_update`', '`package_last_update`')
,new SelectExpression('`member`.`nick_name`', '`nick_name`')
,new SelectExpression('`member`.`user_id`', '`user_id`')
,new SelectExpression('`item`.`item_srl`', '`item_srl`')
,new SelectExpression('`item`.`document_srl`', '`item_document_srl`')
,new SelectExpression('`item`.`file_srl`', '`item_file_srl`')
,new SelectExpression('`item`.`screenshot_url`', '`item_screenshot_url`')
,new SelectExpression('`item`.`version`', '`item_version`')
,new SelectExpression('`item`.`voter`', '`item_voter`')
,new SelectExpression('`item`.`voted`', '`item_voted`')
,new SelectExpression('`item`.`downloaded`', '`item_downloaded`')
,new SelectExpression('`item`.`regdate`', '`item_regdate`')
,new SelectExpression('`files`.`source_filename`', '`source_filename`')
,new SelectExpression('`files`.`sid`', '`sid`')
));
$query->setTables(array(
new Table('`xe_resource_packages`', '`package`')
,new Table('`xe_member`', '`member`')
,new Table('`xe_resource_items`', '`item`')
,new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package`.`module_srl`',$module_srl1_argument,"equal")
,new ConditionWithoutArgument('`package`.`status`',"'accepted'","equal", 'and')
,new ConditionWithArgument('`package`.`category_srl`',$category_srl2_argument,"in", 'and')
,new ConditionWithArgument('`package`.`category_srl`',$idx_category_srl3_argument,"more", 'and')
,new ConditionWithArgument('`package`.`member_srl`',$member_srl4_argument,"equal", 'and')
,new ConditionWithoutArgument('`package`.`member_srl`','`member`.`member_srl`',"equal", 'and')
,new ConditionWithoutArgument('`item`.`item_srl`','`package`.`latest_item_srl`',"equal", 'and')
,new ConditionWithoutArgument('`package`.`update_order`','0',"less", 'and')
,new ConditionWithoutArgument('`files`.`file_srl`','`item`.`file_srl`',"equal", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`package`.`title`',$search_keyword5_argument,"like", 'or')
,new ConditionWithArgument('`package`.`path`',$search_keyword6_argument,"like", 'or')
,new ConditionWithArgument('`package`.`description`',$search_keyword7_argument,"like", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, $order_type9_argument)
));
$query->setLimit(new Limit(${'list_count12_argument'}, ${'page10_argument'}, ${'page_count11_argument'}));
return $query; ?>