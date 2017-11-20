<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl17_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl17_argument'}->checkFilter('number');
${'module_srl17_argument'}->createConditionValue();
if(!${'module_srl17_argument'}->isValid()) return ${'module_srl17_argument'}->getErrorMessage();
} else
${'module_srl17_argument'} = NULL;if(${'module_srl17_argument'} !== null) ${'module_srl17_argument'}->setColumnType('number');
if(isset($args->exclude_module_srl)) {
${'exclude_module_srl18_argument'} = new ConditionArgument('exclude_module_srl', $args->exclude_module_srl, 'notin');
${'exclude_module_srl18_argument'}->checkFilter('number');
${'exclude_module_srl18_argument'}->createConditionValue();
if(!${'exclude_module_srl18_argument'}->isValid()) return ${'exclude_module_srl18_argument'}->getErrorMessage();
} else
${'exclude_module_srl18_argument'} = NULL;if(${'exclude_module_srl18_argument'} !== null) ${'exclude_module_srl18_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl19_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'in');
${'category_srl19_argument'}->createConditionValue();
if(!${'category_srl19_argument'}->isValid()) return ${'category_srl19_argument'}->getErrorMessage();
} else
${'category_srl19_argument'} = NULL;if(${'category_srl19_argument'} !== null) ${'category_srl19_argument'}->setColumnType('number');
if(isset($args->s_is_notice)) {
${'s_is_notice20_argument'} = new ConditionArgument('s_is_notice', $args->s_is_notice, 'equal');
${'s_is_notice20_argument'}->createConditionValue();
if(!${'s_is_notice20_argument'}->isValid()) return ${'s_is_notice20_argument'}->getErrorMessage();
} else
${'s_is_notice20_argument'} = NULL;if(${'s_is_notice20_argument'} !== null) ${'s_is_notice20_argument'}->setColumnType('char');
if(isset($args->member_srl)) {
${'member_srl21_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl21_argument'}->checkFilter('number');
${'member_srl21_argument'}->createConditionValue();
if(!${'member_srl21_argument'}->isValid()) return ${'member_srl21_argument'}->getErrorMessage();
} else
${'member_srl21_argument'} = NULL;if(${'member_srl21_argument'} !== null) ${'member_srl21_argument'}->setColumnType('number');
if(isset($args->statusList)) {
${'statusList22_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList22_argument'}->createConditionValue();
if(!${'statusList22_argument'}->isValid()) return ${'statusList22_argument'}->getErrorMessage();
} else
${'statusList22_argument'} = NULL;if(${'statusList22_argument'} !== null) ${'statusList22_argument'}->setColumnType('varchar');
if(isset($args->division)) {
${'division23_argument'} = new ConditionArgument('division', $args->division, 'more');
${'division23_argument'}->createConditionValue();
if(!${'division23_argument'}->isValid()) return ${'division23_argument'}->getErrorMessage();
} else
${'division23_argument'} = NULL;if(${'division23_argument'} !== null) ${'division23_argument'}->setColumnType('number');
if(isset($args->last_division)) {
${'last_division24_argument'} = new ConditionArgument('last_division', $args->last_division, 'below');
${'last_division24_argument'}->createConditionValue();
if(!${'last_division24_argument'}->isValid()) return ${'last_division24_argument'}->getErrorMessage();
} else
${'last_division24_argument'} = NULL;if(${'last_division24_argument'} !== null) ${'last_division24_argument'}->setColumnType('number');
if(isset($args->s_title)) {
${'s_title25_argument'} = new ConditionArgument('s_title', $args->s_title, 'like');
${'s_title25_argument'}->createConditionValue();
if(!${'s_title25_argument'}->isValid()) return ${'s_title25_argument'}->getErrorMessage();
} else
${'s_title25_argument'} = NULL;if(${'s_title25_argument'} !== null) ${'s_title25_argument'}->setColumnType('varchar');
if(isset($args->s_content)) {
${'s_content26_argument'} = new ConditionArgument('s_content', $args->s_content, 'like');
${'s_content26_argument'}->createConditionValue();
if(!${'s_content26_argument'}->isValid()) return ${'s_content26_argument'}->getErrorMessage();
} else
${'s_content26_argument'} = NULL;if(${'s_content26_argument'} !== null) ${'s_content26_argument'}->setColumnType('bigtext');
if(isset($args->s_user_name)) {
${'s_user_name27_argument'} = new ConditionArgument('s_user_name', $args->s_user_name, 'like');
${'s_user_name27_argument'}->createConditionValue();
if(!${'s_user_name27_argument'}->isValid()) return ${'s_user_name27_argument'}->getErrorMessage();
} else
${'s_user_name27_argument'} = NULL;if(${'s_user_name27_argument'} !== null) ${'s_user_name27_argument'}->setColumnType('varchar');
if(isset($args->s_user_id)) {
${'s_user_id28_argument'} = new ConditionArgument('s_user_id', $args->s_user_id, 'like');
${'s_user_id28_argument'}->createConditionValue();
if(!${'s_user_id28_argument'}->isValid()) return ${'s_user_id28_argument'}->getErrorMessage();
} else
${'s_user_id28_argument'} = NULL;if(${'s_user_id28_argument'} !== null) ${'s_user_id28_argument'}->setColumnType('varchar');
if(isset($args->s_nick_name)) {
${'s_nick_name29_argument'} = new ConditionArgument('s_nick_name', $args->s_nick_name, 'like');
${'s_nick_name29_argument'}->createConditionValue();
if(!${'s_nick_name29_argument'}->isValid()) return ${'s_nick_name29_argument'}->getErrorMessage();
} else
${'s_nick_name29_argument'} = NULL;if(${'s_nick_name29_argument'} !== null) ${'s_nick_name29_argument'}->setColumnType('varchar');
if(isset($args->s_email_address)) {
${'s_email_address30_argument'} = new ConditionArgument('s_email_address', $args->s_email_address, 'like');
${'s_email_address30_argument'}->createConditionValue();
if(!${'s_email_address30_argument'}->isValid()) return ${'s_email_address30_argument'}->getErrorMessage();
} else
${'s_email_address30_argument'} = NULL;if(${'s_email_address30_argument'} !== null) ${'s_email_address30_argument'}->setColumnType('varchar');
if(isset($args->s_homepage)) {
${'s_homepage31_argument'} = new ConditionArgument('s_homepage', $args->s_homepage, 'like');
${'s_homepage31_argument'}->createConditionValue();
if(!${'s_homepage31_argument'}->isValid()) return ${'s_homepage31_argument'}->getErrorMessage();
} else
${'s_homepage31_argument'} = NULL;if(${'s_homepage31_argument'} !== null) ${'s_homepage31_argument'}->setColumnType('varchar');
if(isset($args->s_tags)) {
${'s_tags32_argument'} = new ConditionArgument('s_tags', $args->s_tags, 'like');
${'s_tags32_argument'}->createConditionValue();
if(!${'s_tags32_argument'}->isValid()) return ${'s_tags32_argument'}->getErrorMessage();
} else
${'s_tags32_argument'} = NULL;if(${'s_tags32_argument'} !== null) ${'s_tags32_argument'}->setColumnType('text');
if(isset($args->s_member_srl)) {
${'s_member_srl33_argument'} = new ConditionArgument('s_member_srl', $args->s_member_srl, 'equal');
${'s_member_srl33_argument'}->createConditionValue();
if(!${'s_member_srl33_argument'}->isValid()) return ${'s_member_srl33_argument'}->getErrorMessage();
} else
${'s_member_srl33_argument'} = NULL;if(${'s_member_srl33_argument'} !== null) ${'s_member_srl33_argument'}->setColumnType('number');
if(isset($args->s_readed_count)) {
${'s_readed_count34_argument'} = new ConditionArgument('s_readed_count', $args->s_readed_count, 'more');
${'s_readed_count34_argument'}->createConditionValue();
if(!${'s_readed_count34_argument'}->isValid()) return ${'s_readed_count34_argument'}->getErrorMessage();
} else
${'s_readed_count34_argument'} = NULL;if(${'s_readed_count34_argument'} !== null) ${'s_readed_count34_argument'}->setColumnType('number');
if(isset($args->s_voted_count)) {
${'s_voted_count35_argument'} = new ConditionArgument('s_voted_count', $args->s_voted_count, 'more');
${'s_voted_count35_argument'}->createConditionValue();
if(!${'s_voted_count35_argument'}->isValid()) return ${'s_voted_count35_argument'}->getErrorMessage();
} else
${'s_voted_count35_argument'} = NULL;if(${'s_voted_count35_argument'} !== null) ${'s_voted_count35_argument'}->setColumnType('number');
if(isset($args->s_blamed_count)) {
${'s_blamed_count36_argument'} = new ConditionArgument('s_blamed_count', $args->s_blamed_count, 'less');
${'s_blamed_count36_argument'}->createConditionValue();
if(!${'s_blamed_count36_argument'}->isValid()) return ${'s_blamed_count36_argument'}->getErrorMessage();
} else
${'s_blamed_count36_argument'} = NULL;if(${'s_blamed_count36_argument'} !== null) ${'s_blamed_count36_argument'}->setColumnType('number');
if(isset($args->s_comment_count)) {
${'s_comment_count37_argument'} = new ConditionArgument('s_comment_count', $args->s_comment_count, 'more');
${'s_comment_count37_argument'}->createConditionValue();
if(!${'s_comment_count37_argument'}->isValid()) return ${'s_comment_count37_argument'}->getErrorMessage();
} else
${'s_comment_count37_argument'} = NULL;if(${'s_comment_count37_argument'} !== null) ${'s_comment_count37_argument'}->setColumnType('number');
if(isset($args->s_trackback_count)) {
${'s_trackback_count38_argument'} = new ConditionArgument('s_trackback_count', $args->s_trackback_count, 'more');
${'s_trackback_count38_argument'}->createConditionValue();
if(!${'s_trackback_count38_argument'}->isValid()) return ${'s_trackback_count38_argument'}->getErrorMessage();
} else
${'s_trackback_count38_argument'} = NULL;if(${'s_trackback_count38_argument'} !== null) ${'s_trackback_count38_argument'}->setColumnType('number');
if(isset($args->s_uploaded_count)) {
${'s_uploaded_count39_argument'} = new ConditionArgument('s_uploaded_count', $args->s_uploaded_count, 'more');
${'s_uploaded_count39_argument'}->createConditionValue();
if(!${'s_uploaded_count39_argument'}->isValid()) return ${'s_uploaded_count39_argument'}->getErrorMessage();
} else
${'s_uploaded_count39_argument'} = NULL;if(${'s_uploaded_count39_argument'} !== null) ${'s_uploaded_count39_argument'}->setColumnType('number');
if(isset($args->s_regdate)) {
${'s_regdate40_argument'} = new ConditionArgument('s_regdate', $args->s_regdate, 'like_prefix');
${'s_regdate40_argument'}->createConditionValue();
if(!${'s_regdate40_argument'}->isValid()) return ${'s_regdate40_argument'}->getErrorMessage();
} else
${'s_regdate40_argument'} = NULL;if(${'s_regdate40_argument'} !== null) ${'s_regdate40_argument'}->setColumnType('date');
if(isset($args->s_last_update)) {
${'s_last_update41_argument'} = new ConditionArgument('s_last_update', $args->s_last_update, 'like_prefix');
${'s_last_update41_argument'}->createConditionValue();
if(!${'s_last_update41_argument'}->isValid()) return ${'s_last_update41_argument'}->getErrorMessage();
} else
${'s_last_update41_argument'} = NULL;if(${'s_last_update41_argument'} !== null) ${'s_last_update41_argument'}->setColumnType('date');
if(isset($args->s_ipaddress)) {
${'s_ipaddress42_argument'} = new ConditionArgument('s_ipaddress', $args->s_ipaddress, 'like_prefix');
${'s_ipaddress42_argument'}->createConditionValue();
if(!${'s_ipaddress42_argument'}->isValid()) return ${'s_ipaddress42_argument'}->getErrorMessage();
} else
${'s_ipaddress42_argument'} = NULL;if(${'s_ipaddress42_argument'} !== null) ${'s_ipaddress42_argument'}->setColumnType('varchar');
if(isset($args->start_date)) {
${'start_date43_argument'} = new ConditionArgument('start_date', $args->start_date, 'more');
${'start_date43_argument'}->createConditionValue();
if(!${'start_date43_argument'}->isValid()) return ${'start_date43_argument'}->getErrorMessage();
} else
${'start_date43_argument'} = NULL;if(${'start_date43_argument'} !== null) ${'start_date43_argument'}->setColumnType('date');
if(isset($args->end_date)) {
${'end_date44_argument'} = new ConditionArgument('end_date', $args->end_date, 'less');
${'end_date44_argument'}->createConditionValue();
if(!${'end_date44_argument'}->isValid()) return ${'end_date44_argument'}->getErrorMessage();
} else
${'end_date44_argument'} = NULL;if(${'end_date44_argument'} !== null) ${'end_date44_argument'}->setColumnType('date');

${'page47_argument'} = new Argument('page', $args->{'page'});
${'page47_argument'}->ensureDefaultValue('1');
if(!${'page47_argument'}->isValid()) return ${'page47_argument'}->getErrorMessage();

${'page_count48_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count48_argument'}->ensureDefaultValue('10');
if(!${'page_count48_argument'}->isValid()) return ${'page_count48_argument'}->getErrorMessage();

${'list_count49_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count49_argument'}->ensureDefaultValue('20');
if(!${'list_count49_argument'}->isValid()) return ${'list_count49_argument'}->getErrorMessage();

${'sort_index45_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index45_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index45_argument'}->isValid()) return ${'sort_index45_argument'}->getErrorMessage();

${'order_type46_argument'} = new SortArgument('order_type46', $args->order_type);
${'order_type46_argument'}->ensureDefaultValue('asc');
if(!${'order_type46_argument'}->isValid()) return ${'order_type46_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl17_argument,"in")
,new ConditionWithArgument('`module_srl`',$exclude_module_srl18_argument,"notin", 'and')
,new ConditionWithArgument('`category_srl`',$category_srl19_argument,"in", 'and')
,new ConditionWithArgument('`is_notice`',$s_is_notice20_argument,"equal", 'and')
,new ConditionWithArgument('`member_srl`',$member_srl21_argument,"equal", 'and')
,new ConditionWithArgument('`status`',$statusList22_argument,"in", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`list_order`',$division23_argument,"more", 'and')
,new ConditionWithArgument('`list_order`',$last_division24_argument,"below", 'and')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`title`',$s_title25_argument,"like")
,new ConditionWithArgument('`content`',$s_content26_argument,"like", 'or')
,new ConditionWithArgument('`user_name`',$s_user_name27_argument,"like", 'or')
,new ConditionWithArgument('`user_id`',$s_user_id28_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$s_nick_name29_argument,"like", 'or')
,new ConditionWithArgument('`email_address`',$s_email_address30_argument,"like", 'or')
,new ConditionWithArgument('`homepage`',$s_homepage31_argument,"like", 'or')
,new ConditionWithArgument('`tags`',$s_tags32_argument,"like", 'or')
,new ConditionWithArgument('`member_srl`',$s_member_srl33_argument,"equal", 'or')
,new ConditionWithArgument('`readed_count`',$s_readed_count34_argument,"more", 'or')
,new ConditionWithArgument('`voted_count`',$s_voted_count35_argument,"more", 'or')
,new ConditionWithArgument('`blamed_count`',$s_blamed_count36_argument,"less", 'or')
,new ConditionWithArgument('`comment_count`',$s_comment_count37_argument,"more", 'or')
,new ConditionWithArgument('`trackback_count`',$s_trackback_count38_argument,"more", 'or')
,new ConditionWithArgument('`uploaded_count`',$s_uploaded_count39_argument,"more", 'or')
,new ConditionWithArgument('`regdate`',$s_regdate40_argument,"like_prefix", 'or')
,new ConditionWithArgument('`last_update`',$s_last_update41_argument,"like_prefix", 'or')
,new ConditionWithArgument('`ipaddress`',$s_ipaddress42_argument,"like_prefix", 'or')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`last_update`',$start_date43_argument,"more", 'and')
,new ConditionWithArgument('`last_update`',$end_date44_argument,"less", 'and')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index45_argument'}, $order_type46_argument)
));
$query->setLimit(new Limit(${'list_count49_argument'}, ${'page47_argument'}, ${'page_count48_argument'}));
return $query; ?>