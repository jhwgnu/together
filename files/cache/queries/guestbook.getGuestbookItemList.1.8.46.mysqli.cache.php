<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGuestbookItemList");
$query->setAction("select");
$query->setPriority("");

${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->checkNotNull();
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->parent_srl)) {
${'parent_srl2_argument'} = new ConditionArgument('parent_srl', $args->parent_srl, 'equal');
${'parent_srl2_argument'}->createConditionValue();
if(!${'parent_srl2_argument'}->isValid()) return ${'parent_srl2_argument'}->getErrorMessage();
} else
${'parent_srl2_argument'} = NULL;if(${'parent_srl2_argument'} !== null) ${'parent_srl2_argument'}->setColumnType('number');
if(isset($args->user_id_search)) {
${'user_id_search3_argument'} = new ConditionArgument('user_id_search', $args->user_id_search, 'like');
${'user_id_search3_argument'}->createConditionValue();
if(!${'user_id_search3_argument'}->isValid()) return ${'user_id_search3_argument'}->getErrorMessage();
} else
${'user_id_search3_argument'} = NULL;if(${'user_id_search3_argument'} !== null) ${'user_id_search3_argument'}->setColumnType('varchar');
if(isset($args->user_name_search)) {
${'user_name_search4_argument'} = new ConditionArgument('user_name_search', $args->user_name_search, 'like');
${'user_name_search4_argument'}->createConditionValue();
if(!${'user_name_search4_argument'}->isValid()) return ${'user_name_search4_argument'}->getErrorMessage();
} else
${'user_name_search4_argument'} = NULL;if(${'user_name_search4_argument'} !== null) ${'user_name_search4_argument'}->setColumnType('varchar');
if(isset($args->nick_name_search)) {
${'nick_name_search5_argument'} = new ConditionArgument('nick_name_search', $args->nick_name_search, 'like');
${'nick_name_search5_argument'}->createConditionValue();
if(!${'nick_name_search5_argument'}->isValid()) return ${'nick_name_search5_argument'}->getErrorMessage();
} else
${'nick_name_search5_argument'} = NULL;if(${'nick_name_search5_argument'} !== null) ${'nick_name_search5_argument'}->setColumnType('varchar');
if(isset($args->homepage_search)) {
${'homepage_search6_argument'} = new ConditionArgument('homepage_search', $args->homepage_search, 'like');
${'homepage_search6_argument'}->createConditionValue();
if(!${'homepage_search6_argument'}->isValid()) return ${'homepage_search6_argument'}->getErrorMessage();
} else
${'homepage_search6_argument'} = NULL;if(${'homepage_search6_argument'} !== null) ${'homepage_search6_argument'}->setColumnType('varchar');
if(isset($args->email_address_search)) {
${'email_address_search7_argument'} = new ConditionArgument('email_address_search', $args->email_address_search, 'like');
${'email_address_search7_argument'}->createConditionValue();
if(!${'email_address_search7_argument'}->isValid()) return ${'email_address_search7_argument'}->getErrorMessage();
} else
${'email_address_search7_argument'} = NULL;if(${'email_address_search7_argument'} !== null) ${'email_address_search7_argument'}->setColumnType('varchar');
if(isset($args->ipaddress_search)) {
${'ipaddress_search8_argument'} = new ConditionArgument('ipaddress_search', $args->ipaddress_search, 'like');
${'ipaddress_search8_argument'}->createConditionValue();
if(!${'ipaddress_search8_argument'}->isValid()) return ${'ipaddress_search8_argument'}->getErrorMessage();
} else
${'ipaddress_search8_argument'} = NULL;if(${'ipaddress_search8_argument'} !== null) ${'ipaddress_search8_argument'}->setColumnType('varchar');
if(isset($args->content_search)) {
${'content_search9_argument'} = new ConditionArgument('content_search', $args->content_search, 'like');
${'content_search9_argument'}->createConditionValue();
if(!${'content_search9_argument'}->isValid()) return ${'content_search9_argument'}->getErrorMessage();
} else
${'content_search9_argument'} = NULL;if(${'content_search9_argument'} !== null) ${'content_search9_argument'}->setColumnType('bigtext');

${'page13_argument'} = new Argument('page', $args->{'page'});
${'page13_argument'}->ensureDefaultValue('1');
if(!${'page13_argument'}->isValid()) return ${'page13_argument'}->getErrorMessage();

${'page_count14_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count14_argument'}->ensureDefaultValue('10');
if(!${'page_count14_argument'}->isValid()) return ${'page_count14_argument'}->getErrorMessage();

${'list_count15_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count15_argument'}->ensureDefaultValue('20');
if(!${'list_count15_argument'}->isValid()) return ${'list_count15_argument'}->getErrorMessage();

${'parent_srl12_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl12_argument'}->ensureDefaultValue('guestbook.parent_srl');
if(!${'parent_srl12_argument'}->isValid()) return ${'parent_srl12_argument'}->getErrorMessage();

${'sort_index10_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index10_argument'}->ensureDefaultValue('guestbook.list_order');
if(!${'sort_index10_argument'}->isValid()) return ${'sort_index10_argument'}->getErrorMessage();

${'order_type11_argument'} = new SortArgument('order_type11', $args->order_type);
${'order_type11_argument'}->ensureDefaultValue('asc');
if(!${'order_type11_argument'}->isValid()) return ${'order_type11_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_guestbook_item`', '`guestbook`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl1_argument,"equal")
,new ConditionWithArgument('`parent_srl`',$parent_srl2_argument,"equal", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`user_id`',$user_id_search3_argument,"like", 'or')
,new ConditionWithArgument('`user_name`',$user_name_search4_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$nick_name_search5_argument,"like", 'or')
,new ConditionWithArgument('`homepage`',$homepage_search6_argument,"like", 'or')
,new ConditionWithArgument('`email_address`',$email_address_search7_argument,"like", 'or')
,new ConditionWithArgument('`ipaddress`',$ipaddress_search8_argument,"like", 'or')
,new ConditionWithArgument('`content`',$content_search9_argument,"like", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index10_argument'}, $order_type11_argument)
,new OrderByColumn(${'parent_srl12_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count15_argument'}, ${'page13_argument'}, ${'page_count14_argument'}));
return $query; ?>