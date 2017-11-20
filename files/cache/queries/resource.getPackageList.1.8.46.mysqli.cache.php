<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getPackageList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
} else
${'module_srl1_argument'} = NULL;if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->status)) {
${'status2_argument'} = new ConditionArgument('status', $args->status, 'equal');
${'status2_argument'}->createConditionValue();
if(!${'status2_argument'}->isValid()) return ${'status2_argument'}->getErrorMessage();
} else
${'status2_argument'} = NULL;if(${'status2_argument'} !== null) ${'status2_argument'}->setColumnType('char');
if(isset($args->idx_status)) {
${'idx_status3_argument'} = new ConditionArgument('idx_status', $args->idx_status, 'more');
${'idx_status3_argument'}->createConditionValue();
if(!${'idx_status3_argument'}->isValid()) return ${'idx_status3_argument'}->getErrorMessage();
} else
${'idx_status3_argument'} = NULL;if(${'idx_status3_argument'} !== null) ${'idx_status3_argument'}->setColumnType('char');
if(isset($args->category_srl)) {
${'category_srl4_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl4_argument'}->checkFilter('number');
${'category_srl4_argument'}->createConditionValue();
if(!${'category_srl4_argument'}->isValid()) return ${'category_srl4_argument'}->getErrorMessage();
} else
${'category_srl4_argument'} = NULL;if(${'category_srl4_argument'} !== null) ${'category_srl4_argument'}->setColumnType('number');
if(isset($args->idx_category_srl)) {
${'idx_category_srl5_argument'} = new ConditionArgument('idx_category_srl', $args->idx_category_srl, 'more');
${'idx_category_srl5_argument'}->createConditionValue();
if(!${'idx_category_srl5_argument'}->isValid()) return ${'idx_category_srl5_argument'}->getErrorMessage();
} else
${'idx_category_srl5_argument'} = NULL;if(${'idx_category_srl5_argument'} !== null) ${'idx_category_srl5_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl6_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl6_argument'}->checkFilter('number');
${'member_srl6_argument'}->createConditionValue();
if(!${'member_srl6_argument'}->isValid()) return ${'member_srl6_argument'}->getErrorMessage();
} else
${'member_srl6_argument'} = NULL;if(${'member_srl6_argument'} !== null) ${'member_srl6_argument'}->setColumnType('number');

${'page8_argument'} = new Argument('page', $args->{'page'});
${'page8_argument'}->ensureDefaultValue('1');
if(!${'page8_argument'}->isValid()) return ${'page8_argument'}->getErrorMessage();

${'page_count9_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count9_argument'}->ensureDefaultValue('10');
if(!${'page_count9_argument'}->isValid()) return ${'page_count9_argument'}->getErrorMessage();

${'list_count10_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count10_argument'}->ensureDefaultValue('40');
if(!${'list_count10_argument'}->isValid()) return ${'list_count10_argument'}->getErrorMessage();

${'sort_index7_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index7_argument'}->ensureDefaultValue('package.list_order');
if(!${'sort_index7_argument'}->isValid()) return ${'sort_index7_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`package`.*')
,new SelectExpression('`item`.`version`')
,new SelectExpression('`member`.`nick_name`', '`nick_name`')
,new SelectExpression('`member`.`user_id`', '`user_id`')
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
,new Table('`xe_resource_packages`', '`package`')
,new JoinTable('`xe_resource_items`', '`item`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`item`.`item_srl`','`package`.`latest_item_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package`.`module_srl`',$module_srl1_argument,"equal")
,new ConditionWithArgument('`package`.`status`',$status2_argument,"equal", 'and')
,new ConditionWithArgument('`package`.`status`',$idx_status3_argument,"more", 'and')
,new ConditionWithArgument('`package`.`category_srl`',$category_srl4_argument,"equal", 'and')
,new ConditionWithArgument('`package`.`category_srl`',$idx_category_srl5_argument,"more", 'and')
,new ConditionWithArgument('`package`.`member_srl`',$member_srl6_argument,"equal", 'and')
,new ConditionWithoutArgument('`package`.`member_srl`','`member`.`member_srl`',"equal", 'and')
,new ConditionWithoutArgument('`package`.`list_order`','0',"less", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index7_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count10_argument'}, ${'page8_argument'}, ${'page_count9_argument'}));
return $query; ?>