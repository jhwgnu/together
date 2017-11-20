<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getPollListWithMember");
$query->setAction("select");
$query->setPriority("");
if(isset($args->pollIndexSrlList)) {
${'pollIndexSrlList1_argument'} = new ConditionArgument('pollIndexSrlList', $args->pollIndexSrlList, 'in');
${'pollIndexSrlList1_argument'}->checkFilter('number');
${'pollIndexSrlList1_argument'}->createConditionValue();
if(!${'pollIndexSrlList1_argument'}->isValid()) return ${'pollIndexSrlList1_argument'}->getErrorMessage();
} else
${'pollIndexSrlList1_argument'} = NULL;if(${'pollIndexSrlList1_argument'} !== null) ${'pollIndexSrlList1_argument'}->setColumnType('number');
if(isset($args->s_title)) {
${'s_title2_argument'} = new ConditionArgument('s_title', $args->s_title, 'like');
${'s_title2_argument'}->createConditionValue();
if(!${'s_title2_argument'}->isValid()) return ${'s_title2_argument'}->getErrorMessage();
} else
${'s_title2_argument'} = NULL;if(${'s_title2_argument'} !== null) ${'s_title2_argument'}->setColumnType('varchar');
if(isset($args->s_regdate)) {
${'s_regdate3_argument'} = new ConditionArgument('s_regdate', $args->s_regdate, 'like_prefix');
${'s_regdate3_argument'}->createConditionValue();
if(!${'s_regdate3_argument'}->isValid()) return ${'s_regdate3_argument'}->getErrorMessage();
} else
${'s_regdate3_argument'} = NULL;if(${'s_regdate3_argument'} !== null) ${'s_regdate3_argument'}->setColumnType('date');
if(isset($args->s_ipaddress)) {
${'s_ipaddress4_argument'} = new ConditionArgument('s_ipaddress', $args->s_ipaddress, 'like_prefix');
${'s_ipaddress4_argument'}->createConditionValue();
if(!${'s_ipaddress4_argument'}->isValid()) return ${'s_ipaddress4_argument'}->getErrorMessage();
} else
${'s_ipaddress4_argument'} = NULL;if(${'s_ipaddress4_argument'} !== null) ${'s_ipaddress4_argument'}->setColumnType('varchar');

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
${'sort_index5_argument'}->ensureDefaultValue('P.list_order');
if(!${'sort_index5_argument'}->isValid()) return ${'sort_index5_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`P`.`poll_srl`', '`poll_srl`')
,new SelectExpression('`P`.`poll_index_srl`', '`poll_index_srl`')
,new SelectExpression('`P`.`title`', '`title`')
,new SelectExpression('`P`.`checkcount`', '`checkcount`')
,new SelectExpression('`P`.`poll_count`', '`poll_count`')
,new SelectExpression('`P`.`upload_target_srl`', '`upload_target_srl`')
,new SelectExpression('`P`.`ipaddress`', '`ipaddress`')
,new SelectExpression('`P`.`regdate`', '`poll_regdate`')
,new SelectExpression('`P2`.`stop_date`', '`poll_stop_date`')
,new SelectExpression('`M`.*')
));
$query->setTables(array(
new Table('`xe_poll_title`', '`P`')
,new JoinTable('`xe_poll`', '`P2`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`P2`.`poll_srl`','`P`.`poll_srl`',"equal")))
))
,new JoinTable('`xe_member`', '`M`', "left outer join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`P2`.`member_srl`','`M`.`member_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`poll_index_srl`',$pollIndexSrlList1_argument,"in", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`P`.`title`',$s_title2_argument,"like", 'or')
,new ConditionWithArgument('`P`.`regdate`',$s_regdate3_argument,"like_prefix", 'or')
,new ConditionWithArgument('`P`.`ipaddress`',$s_ipaddress4_argument,"like_prefix", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index5_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count8_argument'}, ${'page6_argument'}, ${'page_count7_argument'}));
return $query; ?>