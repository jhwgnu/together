<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->is_admin)) {
${'is_admin43_argument'} = new ConditionArgument('is_admin', $args->is_admin, 'equal');
${'is_admin43_argument'}->createConditionValue();
if(!${'is_admin43_argument'}->isValid()) return ${'is_admin43_argument'}->getErrorMessage();
} else
${'is_admin43_argument'} = NULL;if(${'is_admin43_argument'} !== null) ${'is_admin43_argument'}->setColumnType('char');
if(isset($args->is_denied)) {
${'is_denied44_argument'} = new ConditionArgument('is_denied', $args->is_denied, 'equal');
${'is_denied44_argument'}->createConditionValue();
if(!${'is_denied44_argument'}->isValid()) return ${'is_denied44_argument'}->getErrorMessage();
} else
${'is_denied44_argument'} = NULL;if(${'is_denied44_argument'} !== null) ${'is_denied44_argument'}->setColumnType('char');
if(isset($args->member_srls)) {
${'member_srls45_argument'} = new ConditionArgument('member_srls', $args->member_srls, 'in');
${'member_srls45_argument'}->createConditionValue();
if(!${'member_srls45_argument'}->isValid()) return ${'member_srls45_argument'}->getErrorMessage();
} else
${'member_srls45_argument'} = NULL;if(${'member_srls45_argument'} !== null) ${'member_srls45_argument'}->setColumnType('number');
if(isset($args->s_user_id)) {
${'s_user_id46_argument'} = new ConditionArgument('s_user_id', $args->s_user_id, 'like');
${'s_user_id46_argument'}->createConditionValue();
if(!${'s_user_id46_argument'}->isValid()) return ${'s_user_id46_argument'}->getErrorMessage();
} else
${'s_user_id46_argument'} = NULL;if(${'s_user_id46_argument'} !== null) ${'s_user_id46_argument'}->setColumnType('varchar');
if(isset($args->s_user_name)) {
${'s_user_name47_argument'} = new ConditionArgument('s_user_name', $args->s_user_name, 'like');
${'s_user_name47_argument'}->createConditionValue();
if(!${'s_user_name47_argument'}->isValid()) return ${'s_user_name47_argument'}->getErrorMessage();
} else
${'s_user_name47_argument'} = NULL;if(${'s_user_name47_argument'} !== null) ${'s_user_name47_argument'}->setColumnType('varchar');
if(isset($args->s_nick_name)) {
${'s_nick_name48_argument'} = new ConditionArgument('s_nick_name', $args->s_nick_name, 'like');
${'s_nick_name48_argument'}->createConditionValue();
if(!${'s_nick_name48_argument'}->isValid()) return ${'s_nick_name48_argument'}->getErrorMessage();
} else
${'s_nick_name48_argument'} = NULL;if(${'s_nick_name48_argument'} !== null) ${'s_nick_name48_argument'}->setColumnType('varchar');
if(isset($args->html_nick_name)) {
${'html_nick_name49_argument'} = new ConditionArgument('html_nick_name', $args->html_nick_name, 'like');
${'html_nick_name49_argument'}->createConditionValue();
if(!${'html_nick_name49_argument'}->isValid()) return ${'html_nick_name49_argument'}->getErrorMessage();
} else
${'html_nick_name49_argument'} = NULL;if(${'html_nick_name49_argument'} !== null) ${'html_nick_name49_argument'}->setColumnType('varchar');
if(isset($args->s_email_address)) {
${'s_email_address50_argument'} = new ConditionArgument('s_email_address', $args->s_email_address, 'like');
${'s_email_address50_argument'}->createConditionValue();
if(!${'s_email_address50_argument'}->isValid()) return ${'s_email_address50_argument'}->getErrorMessage();
} else
${'s_email_address50_argument'} = NULL;if(${'s_email_address50_argument'} !== null) ${'s_email_address50_argument'}->setColumnType('varchar');
if(isset($args->s_birthday)) {
${'s_birthday51_argument'} = new ConditionArgument('s_birthday', $args->s_birthday, 'like');
${'s_birthday51_argument'}->createConditionValue();
if(!${'s_birthday51_argument'}->isValid()) return ${'s_birthday51_argument'}->getErrorMessage();
} else
${'s_birthday51_argument'} = NULL;if(${'s_birthday51_argument'} !== null) ${'s_birthday51_argument'}->setColumnType('char');
if(isset($args->s_extra_vars)) {
${'s_extra_vars52_argument'} = new ConditionArgument('s_extra_vars', $args->s_extra_vars, 'like');
${'s_extra_vars52_argument'}->createConditionValue();
if(!${'s_extra_vars52_argument'}->isValid()) return ${'s_extra_vars52_argument'}->getErrorMessage();
} else
${'s_extra_vars52_argument'} = NULL;if(${'s_extra_vars52_argument'} !== null) ${'s_extra_vars52_argument'}->setColumnType('text');
if(isset($args->s_regdate)) {
${'s_regdate53_argument'} = new ConditionArgument('s_regdate', $args->s_regdate, 'like_prefix');
${'s_regdate53_argument'}->createConditionValue();
if(!${'s_regdate53_argument'}->isValid()) return ${'s_regdate53_argument'}->getErrorMessage();
} else
${'s_regdate53_argument'} = NULL;if(${'s_regdate53_argument'} !== null) ${'s_regdate53_argument'}->setColumnType('date');
if(isset($args->s_last_login)) {
${'s_last_login54_argument'} = new ConditionArgument('s_last_login', $args->s_last_login, 'like_prefix');
${'s_last_login54_argument'}->createConditionValue();
if(!${'s_last_login54_argument'}->isValid()) return ${'s_last_login54_argument'}->getErrorMessage();
} else
${'s_last_login54_argument'} = NULL;if(${'s_last_login54_argument'} !== null) ${'s_last_login54_argument'}->setColumnType('date');
if(isset($args->s_regdate_more)) {
${'s_regdate_more55_argument'} = new ConditionArgument('s_regdate_more', $args->s_regdate_more, 'more');
${'s_regdate_more55_argument'}->createConditionValue();
if(!${'s_regdate_more55_argument'}->isValid()) return ${'s_regdate_more55_argument'}->getErrorMessage();
} else
${'s_regdate_more55_argument'} = NULL;if(${'s_regdate_more55_argument'} !== null) ${'s_regdate_more55_argument'}->setColumnType('date');
if(isset($args->s_regdate_less)) {
${'s_regdate_less56_argument'} = new ConditionArgument('s_regdate_less', $args->s_regdate_less, 'less');
${'s_regdate_less56_argument'}->createConditionValue();
if(!${'s_regdate_less56_argument'}->isValid()) return ${'s_regdate_less56_argument'}->getErrorMessage();
} else
${'s_regdate_less56_argument'} = NULL;if(${'s_regdate_less56_argument'} !== null) ${'s_regdate_less56_argument'}->setColumnType('date');
if(isset($args->s_last_login_more)) {
${'s_last_login_more57_argument'} = new ConditionArgument('s_last_login_more', $args->s_last_login_more, 'more');
${'s_last_login_more57_argument'}->createConditionValue();
if(!${'s_last_login_more57_argument'}->isValid()) return ${'s_last_login_more57_argument'}->getErrorMessage();
} else
${'s_last_login_more57_argument'} = NULL;if(${'s_last_login_more57_argument'} !== null) ${'s_last_login_more57_argument'}->setColumnType('date');
if(isset($args->s_last_login_less)) {
${'s_last_login_less58_argument'} = new ConditionArgument('s_last_login_less', $args->s_last_login_less, 'less');
${'s_last_login_less58_argument'}->createConditionValue();
if(!${'s_last_login_less58_argument'}->isValid()) return ${'s_last_login_less58_argument'}->getErrorMessage();
} else
${'s_last_login_less58_argument'} = NULL;if(${'s_last_login_less58_argument'} !== null) ${'s_last_login_less58_argument'}->setColumnType('date');

${'page61_argument'} = new Argument('page', $args->{'page'});
${'page61_argument'}->ensureDefaultValue('1');
if(!${'page61_argument'}->isValid()) return ${'page61_argument'}->getErrorMessage();

${'page_count62_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count62_argument'}->ensureDefaultValue('10');
if(!${'page_count62_argument'}->isValid()) return ${'page_count62_argument'}->getErrorMessage();

${'list_count63_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count63_argument'}->ensureDefaultValue('20');
if(!${'list_count63_argument'}->isValid()) return ${'list_count63_argument'}->getErrorMessage();

${'sort_index59_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index59_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index59_argument'}->isValid()) return ${'sort_index59_argument'}->getErrorMessage();

${'sort_order60_argument'} = new SortArgument('sort_order60', $args->sort_order);
${'sort_order60_argument'}->ensureDefaultValue('asc');
if(!${'sort_order60_argument'}->isValid()) return ${'sort_order60_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`is_admin`',$is_admin43_argument,"equal")
,new ConditionWithArgument('`denied`',$is_denied44_argument,"equal", 'and')
,new ConditionWithArgument('`member_srl`',$member_srls45_argument,"in", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`user_id`',$s_user_id46_argument,"like")
,new ConditionWithArgument('`user_name`',$s_user_name47_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$s_nick_name48_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$html_nick_name49_argument,"like", 'or')
,new ConditionWithArgument('`email_address`',$s_email_address50_argument,"like", 'or')
,new ConditionWithArgument('`birthday`',$s_birthday51_argument,"like", 'or')
,new ConditionWithArgument('`extra_vars`',$s_extra_vars52_argument,"like", 'or')
,new ConditionWithArgument('`regdate`',$s_regdate53_argument,"like_prefix", 'or')
,new ConditionWithArgument('`last_login`',$s_last_login54_argument,"like_prefix", 'or')
,new ConditionWithArgument('`member`.`regdate`',$s_regdate_more55_argument,"more", 'or')
,new ConditionWithArgument('`member`.`regdate`',$s_regdate_less56_argument,"less", 'or')
,new ConditionWithArgument('`member`.`last_login`',$s_last_login_more57_argument,"more", 'or')
,new ConditionWithArgument('`member`.`last_login`',$s_last_login_less58_argument,"less", 'or')),'and')
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index59_argument'}, $sort_order60_argument)
));
$query->setLimit(new Limit(${'list_count63_argument'}, ${'page61_argument'}, ${'page_count62_argument'}));
return $query; ?>