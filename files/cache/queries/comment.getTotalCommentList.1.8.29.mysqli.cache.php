<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTotalCommentList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->s_module_srl)) {
${'s_module_srl1_argument'} = new ConditionArgument('s_module_srl', $args->s_module_srl, 'in');
${'s_module_srl1_argument'}->createConditionValue();
if(!${'s_module_srl1_argument'}->isValid()) return ${'s_module_srl1_argument'}->getErrorMessage();
} else
${'s_module_srl1_argument'} = NULL;if(${'s_module_srl1_argument'} !== null) ${'s_module_srl1_argument'}->setColumnType('number');
if(isset($args->exclude_module_srl)) {
${'exclude_module_srl2_argument'} = new ConditionArgument('exclude_module_srl', $args->exclude_module_srl, 'notin');
${'exclude_module_srl2_argument'}->createConditionValue();
if(!${'exclude_module_srl2_argument'}->isValid()) return ${'exclude_module_srl2_argument'}->getErrorMessage();
} else
${'exclude_module_srl2_argument'} = NULL;if(${'exclude_module_srl2_argument'} !== null) ${'exclude_module_srl2_argument'}->setColumnType('number');
if(isset($args->s_is_secret)) {
${'s_is_secret3_argument'} = new ConditionArgument('s_is_secret', $args->s_is_secret, 'equal');
${'s_is_secret3_argument'}->createConditionValue();
if(!${'s_is_secret3_argument'}->isValid()) return ${'s_is_secret3_argument'}->getErrorMessage();
} else
${'s_is_secret3_argument'} = NULL;if(${'s_is_secret3_argument'} !== null) ${'s_is_secret3_argument'}->setColumnType('char');
if(isset($args->s_is_published)) {
${'s_is_published4_argument'} = new ConditionArgument('s_is_published', $args->s_is_published, 'equal');
${'s_is_published4_argument'}->createConditionValue();
if(!${'s_is_published4_argument'}->isValid()) return ${'s_is_published4_argument'}->getErrorMessage();
} else
${'s_is_published4_argument'} = NULL;if(${'s_is_published4_argument'} !== null) ${'s_is_published4_argument'}->setColumnType('number');
if(isset($args->s_content)) {
${'s_content5_argument'} = new ConditionArgument('s_content', $args->s_content, 'like');
${'s_content5_argument'}->createConditionValue();
if(!${'s_content5_argument'}->isValid()) return ${'s_content5_argument'}->getErrorMessage();
} else
${'s_content5_argument'} = NULL;if(${'s_content5_argument'} !== null) ${'s_content5_argument'}->setColumnType('bigtext');
if(isset($args->s_user_name)) {
${'s_user_name6_argument'} = new ConditionArgument('s_user_name', $args->s_user_name, 'like');
${'s_user_name6_argument'}->createConditionValue();
if(!${'s_user_name6_argument'}->isValid()) return ${'s_user_name6_argument'}->getErrorMessage();
} else
${'s_user_name6_argument'} = NULL;if(${'s_user_name6_argument'} !== null) ${'s_user_name6_argument'}->setColumnType('varchar');
if(isset($args->s_nick_name)) {
${'s_nick_name7_argument'} = new ConditionArgument('s_nick_name', $args->s_nick_name, 'like');
${'s_nick_name7_argument'}->createConditionValue();
if(!${'s_nick_name7_argument'}->isValid()) return ${'s_nick_name7_argument'}->getErrorMessage();
} else
${'s_nick_name7_argument'} = NULL;if(${'s_nick_name7_argument'} !== null) ${'s_nick_name7_argument'}->setColumnType('varchar');
if(isset($args->s_email_address)) {
${'s_email_address8_argument'} = new ConditionArgument('s_email_address', $args->s_email_address, 'like');
${'s_email_address8_argument'}->createConditionValue();
if(!${'s_email_address8_argument'}->isValid()) return ${'s_email_address8_argument'}->getErrorMessage();
} else
${'s_email_address8_argument'} = NULL;if(${'s_email_address8_argument'} !== null) ${'s_email_address8_argument'}->setColumnType('varchar');
if(isset($args->s_homepage)) {
${'s_homepage9_argument'} = new ConditionArgument('s_homepage', $args->s_homepage, 'like');
${'s_homepage9_argument'}->createConditionValue();
if(!${'s_homepage9_argument'}->isValid()) return ${'s_homepage9_argument'}->getErrorMessage();
} else
${'s_homepage9_argument'} = NULL;if(${'s_homepage9_argument'} !== null) ${'s_homepage9_argument'}->setColumnType('varchar');
if(isset($args->s_member_srl)) {
${'s_member_srl10_argument'} = new ConditionArgument('s_member_srl', $args->s_member_srl, 'equal');
${'s_member_srl10_argument'}->createConditionValue();
if(!${'s_member_srl10_argument'}->isValid()) return ${'s_member_srl10_argument'}->getErrorMessage();
} else
${'s_member_srl10_argument'} = NULL;if(${'s_member_srl10_argument'} !== null) ${'s_member_srl10_argument'}->setColumnType('number');
if(isset($args->s_regdate)) {
${'s_regdate11_argument'} = new ConditionArgument('s_regdate', $args->s_regdate, 'like_prefix');
${'s_regdate11_argument'}->createConditionValue();
if(!${'s_regdate11_argument'}->isValid()) return ${'s_regdate11_argument'}->getErrorMessage();
} else
${'s_regdate11_argument'} = NULL;if(${'s_regdate11_argument'} !== null) ${'s_regdate11_argument'}->setColumnType('date');
if(isset($args->s_last_upate)) {
${'s_last_upate12_argument'} = new ConditionArgument('s_last_upate', $args->s_last_upate, 'like_prefix');
${'s_last_upate12_argument'}->createConditionValue();
if(!${'s_last_upate12_argument'}->isValid()) return ${'s_last_upate12_argument'}->getErrorMessage();
} else
${'s_last_upate12_argument'} = NULL;if(${'s_last_upate12_argument'} !== null) ${'s_last_upate12_argument'}->setColumnType('date');
if(isset($args->s_ipaddress)) {
${'s_ipaddress13_argument'} = new ConditionArgument('s_ipaddress', $args->s_ipaddress, 'like_prefix');
${'s_ipaddress13_argument'}->createConditionValue();
if(!${'s_ipaddress13_argument'}->isValid()) return ${'s_ipaddress13_argument'}->getErrorMessage();
} else
${'s_ipaddress13_argument'} = NULL;if(${'s_ipaddress13_argument'} !== null) ${'s_ipaddress13_argument'}->setColumnType('varchar');

${'page15_argument'} = new Argument('page', $args->{'page'});
${'page15_argument'}->ensureDefaultValue('1');
if(!${'page15_argument'}->isValid()) return ${'page15_argument'}->getErrorMessage();

${'page_count16_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count16_argument'}->ensureDefaultValue('10');
if(!${'page_count16_argument'}->isValid()) return ${'page_count16_argument'}->getErrorMessage();

${'list_count17_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count17_argument'}->ensureDefaultValue('20');
if(!${'list_count17_argument'}->isValid()) return ${'list_count17_argument'}->getErrorMessage();

${'sort_index14_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index14_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index14_argument'}->isValid()) return ${'sort_index14_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$s_module_srl1_argument,"in")
,new ConditionWithArgument('`module_srl`',$exclude_module_srl2_argument,"notin", 'and')
,new ConditionWithArgument('`is_secret`',$s_is_secret3_argument,"equal", 'and')
,new ConditionWithArgument('`status`',$s_is_published4_argument,"equal", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`content`',$s_content5_argument,"like", 'or')
,new ConditionWithArgument('`user_name`',$s_user_name6_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$s_nick_name7_argument,"like", 'or')
,new ConditionWithArgument('`email_address`',$s_email_address8_argument,"like", 'or')
,new ConditionWithArgument('`homepage`',$s_homepage9_argument,"like", 'or')
,new ConditionWithArgument('`member_srl`',$s_member_srl10_argument,"equal", 'or')
,new ConditionWithArgument('`regdate`',$s_regdate11_argument,"like_prefix", 'or')
,new ConditionWithArgument('`last_update`',$s_last_upate12_argument,"like_prefix", 'or')
,new ConditionWithArgument('`ipaddress`',$s_ipaddress13_argument,"like_prefix", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index14_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count17_argument'}, ${'page15_argument'}, ${'page_count16_argument'}));
return $query; ?>