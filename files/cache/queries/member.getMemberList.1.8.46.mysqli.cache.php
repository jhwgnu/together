<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->is_admin)) {
${'is_admin12_argument'} = new ConditionArgument('is_admin', $args->is_admin, 'equal');
${'is_admin12_argument'}->createConditionValue();
if(!${'is_admin12_argument'}->isValid()) return ${'is_admin12_argument'}->getErrorMessage();
} else
${'is_admin12_argument'} = NULL;if(${'is_admin12_argument'} !== null) ${'is_admin12_argument'}->setColumnType('char');
if(isset($args->is_denied)) {
${'is_denied13_argument'} = new ConditionArgument('is_denied', $args->is_denied, 'equal');
${'is_denied13_argument'}->createConditionValue();
if(!${'is_denied13_argument'}->isValid()) return ${'is_denied13_argument'}->getErrorMessage();
} else
${'is_denied13_argument'} = NULL;if(${'is_denied13_argument'} !== null) ${'is_denied13_argument'}->setColumnType('char');
if(isset($args->member_srls)) {
${'member_srls14_argument'} = new ConditionArgument('member_srls', $args->member_srls, 'in');
${'member_srls14_argument'}->createConditionValue();
if(!${'member_srls14_argument'}->isValid()) return ${'member_srls14_argument'}->getErrorMessage();
} else
${'member_srls14_argument'} = NULL;if(${'member_srls14_argument'} !== null) ${'member_srls14_argument'}->setColumnType('number');
if(isset($args->s_user_id)) {
${'s_user_id15_argument'} = new ConditionArgument('s_user_id', $args->s_user_id, 'like');
${'s_user_id15_argument'}->createConditionValue();
if(!${'s_user_id15_argument'}->isValid()) return ${'s_user_id15_argument'}->getErrorMessage();
} else
${'s_user_id15_argument'} = NULL;if(${'s_user_id15_argument'} !== null) ${'s_user_id15_argument'}->setColumnType('varchar');
if(isset($args->s_user_name)) {
${'s_user_name16_argument'} = new ConditionArgument('s_user_name', $args->s_user_name, 'like');
${'s_user_name16_argument'}->createConditionValue();
if(!${'s_user_name16_argument'}->isValid()) return ${'s_user_name16_argument'}->getErrorMessage();
} else
${'s_user_name16_argument'} = NULL;if(${'s_user_name16_argument'} !== null) ${'s_user_name16_argument'}->setColumnType('varchar');
if(isset($args->s_nick_name)) {
${'s_nick_name17_argument'} = new ConditionArgument('s_nick_name', $args->s_nick_name, 'like');
${'s_nick_name17_argument'}->createConditionValue();
if(!${'s_nick_name17_argument'}->isValid()) return ${'s_nick_name17_argument'}->getErrorMessage();
} else
${'s_nick_name17_argument'} = NULL;if(${'s_nick_name17_argument'} !== null) ${'s_nick_name17_argument'}->setColumnType('varchar');
if(isset($args->html_nick_name)) {
${'html_nick_name18_argument'} = new ConditionArgument('html_nick_name', $args->html_nick_name, 'like');
${'html_nick_name18_argument'}->createConditionValue();
if(!${'html_nick_name18_argument'}->isValid()) return ${'html_nick_name18_argument'}->getErrorMessage();
} else
${'html_nick_name18_argument'} = NULL;if(${'html_nick_name18_argument'} !== null) ${'html_nick_name18_argument'}->setColumnType('varchar');
if(isset($args->s_email_address)) {
${'s_email_address19_argument'} = new ConditionArgument('s_email_address', $args->s_email_address, 'like');
${'s_email_address19_argument'}->createConditionValue();
if(!${'s_email_address19_argument'}->isValid()) return ${'s_email_address19_argument'}->getErrorMessage();
} else
${'s_email_address19_argument'} = NULL;if(${'s_email_address19_argument'} !== null) ${'s_email_address19_argument'}->setColumnType('varchar');
if(isset($args->s_birthday)) {
${'s_birthday20_argument'} = new ConditionArgument('s_birthday', $args->s_birthday, 'like');
${'s_birthday20_argument'}->createConditionValue();
if(!${'s_birthday20_argument'}->isValid()) return ${'s_birthday20_argument'}->getErrorMessage();
} else
${'s_birthday20_argument'} = NULL;if(${'s_birthday20_argument'} !== null) ${'s_birthday20_argument'}->setColumnType('char');
if(isset($args->s_extra_vars)) {
${'s_extra_vars21_argument'} = new ConditionArgument('s_extra_vars', $args->s_extra_vars, 'like');
${'s_extra_vars21_argument'}->createConditionValue();
if(!${'s_extra_vars21_argument'}->isValid()) return ${'s_extra_vars21_argument'}->getErrorMessage();
} else
${'s_extra_vars21_argument'} = NULL;if(${'s_extra_vars21_argument'} !== null) ${'s_extra_vars21_argument'}->setColumnType('text');
if(isset($args->s_regdate)) {
${'s_regdate22_argument'} = new ConditionArgument('s_regdate', $args->s_regdate, 'like_prefix');
${'s_regdate22_argument'}->createConditionValue();
if(!${'s_regdate22_argument'}->isValid()) return ${'s_regdate22_argument'}->getErrorMessage();
} else
${'s_regdate22_argument'} = NULL;if(${'s_regdate22_argument'} !== null) ${'s_regdate22_argument'}->setColumnType('date');
if(isset($args->s_last_login)) {
${'s_last_login23_argument'} = new ConditionArgument('s_last_login', $args->s_last_login, 'like_prefix');
${'s_last_login23_argument'}->createConditionValue();
if(!${'s_last_login23_argument'}->isValid()) return ${'s_last_login23_argument'}->getErrorMessage();
} else
${'s_last_login23_argument'} = NULL;if(${'s_last_login23_argument'} !== null) ${'s_last_login23_argument'}->setColumnType('date');
if(isset($args->s_regdate_more)) {
${'s_regdate_more24_argument'} = new ConditionArgument('s_regdate_more', $args->s_regdate_more, 'more');
${'s_regdate_more24_argument'}->createConditionValue();
if(!${'s_regdate_more24_argument'}->isValid()) return ${'s_regdate_more24_argument'}->getErrorMessage();
} else
${'s_regdate_more24_argument'} = NULL;if(${'s_regdate_more24_argument'} !== null) ${'s_regdate_more24_argument'}->setColumnType('date');
if(isset($args->s_regdate_less)) {
${'s_regdate_less25_argument'} = new ConditionArgument('s_regdate_less', $args->s_regdate_less, 'less');
${'s_regdate_less25_argument'}->createConditionValue();
if(!${'s_regdate_less25_argument'}->isValid()) return ${'s_regdate_less25_argument'}->getErrorMessage();
} else
${'s_regdate_less25_argument'} = NULL;if(${'s_regdate_less25_argument'} !== null) ${'s_regdate_less25_argument'}->setColumnType('date');
if(isset($args->s_last_login_more)) {
${'s_last_login_more26_argument'} = new ConditionArgument('s_last_login_more', $args->s_last_login_more, 'more');
${'s_last_login_more26_argument'}->createConditionValue();
if(!${'s_last_login_more26_argument'}->isValid()) return ${'s_last_login_more26_argument'}->getErrorMessage();
} else
${'s_last_login_more26_argument'} = NULL;if(${'s_last_login_more26_argument'} !== null) ${'s_last_login_more26_argument'}->setColumnType('date');
if(isset($args->s_last_login_less)) {
${'s_last_login_less27_argument'} = new ConditionArgument('s_last_login_less', $args->s_last_login_less, 'less');
${'s_last_login_less27_argument'}->createConditionValue();
if(!${'s_last_login_less27_argument'}->isValid()) return ${'s_last_login_less27_argument'}->getErrorMessage();
} else
${'s_last_login_less27_argument'} = NULL;if(${'s_last_login_less27_argument'} !== null) ${'s_last_login_less27_argument'}->setColumnType('date');

${'page30_argument'} = new Argument('page', $args->{'page'});
${'page30_argument'}->ensureDefaultValue('1');
if(!${'page30_argument'}->isValid()) return ${'page30_argument'}->getErrorMessage();

${'page_count31_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count31_argument'}->ensureDefaultValue('10');
if(!${'page_count31_argument'}->isValid()) return ${'page_count31_argument'}->getErrorMessage();

${'list_count32_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count32_argument'}->ensureDefaultValue('20');
if(!${'list_count32_argument'}->isValid()) return ${'list_count32_argument'}->getErrorMessage();

${'sort_index28_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index28_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index28_argument'}->isValid()) return ${'sort_index28_argument'}->getErrorMessage();

${'sort_order29_argument'} = new SortArgument('sort_order29', $args->sort_order);
${'sort_order29_argument'}->ensureDefaultValue('asc');
if(!${'sort_order29_argument'}->isValid()) return ${'sort_order29_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`is_admin`',$is_admin12_argument,"equal")
,new ConditionWithArgument('`denied`',$is_denied13_argument,"equal", 'and')
,new ConditionWithArgument('`member_srl`',$member_srls14_argument,"in", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`user_id`',$s_user_id15_argument,"like")
,new ConditionWithArgument('`user_name`',$s_user_name16_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$s_nick_name17_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$html_nick_name18_argument,"like", 'or')
,new ConditionWithArgument('`email_address`',$s_email_address19_argument,"like", 'or')
,new ConditionWithArgument('`birthday`',$s_birthday20_argument,"like", 'or')
,new ConditionWithArgument('`extra_vars`',$s_extra_vars21_argument,"like", 'or')
,new ConditionWithArgument('`regdate`',$s_regdate22_argument,"like_prefix", 'or')
,new ConditionWithArgument('`last_login`',$s_last_login23_argument,"like_prefix", 'or')
,new ConditionWithArgument('`member`.`regdate`',$s_regdate_more24_argument,"more", 'or')
,new ConditionWithArgument('`member`.`regdate`',$s_regdate_less25_argument,"less", 'or')
,new ConditionWithArgument('`member`.`last_login`',$s_last_login_more26_argument,"more", 'or')
,new ConditionWithArgument('`member`.`last_login`',$s_last_login_less27_argument,"less", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index28_argument'}, $sort_order29_argument)
));
$query->setLimit(new Limit(${'list_count32_argument'}, ${'page30_argument'}, ${'page_count31_argument'}));
return $query; ?>