<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMember");
$query->setAction("update");
$query->setPriority("");

${'password1_argument'} = new Argument('password', $args->{'password'});
${'password1_argument'}->checkNotNull();
if(!${'password1_argument'}->isValid()) return ${'password1_argument'}->getErrorMessage();
if(${'password1_argument'} !== null) ${'password1_argument'}->setColumnType('varchar');

${'user_name2_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name2_argument'}->checkNotNull();
if(!${'user_name2_argument'}->isValid()) return ${'user_name2_argument'}->getErrorMessage();
if(${'user_name2_argument'} !== null) ${'user_name2_argument'}->setColumnType('varchar');

${'nick_name3_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name3_argument'}->checkNotNull();
if(!${'nick_name3_argument'}->isValid()) return ${'nick_name3_argument'}->getErrorMessage();
if(${'nick_name3_argument'} !== null) ${'nick_name3_argument'}->setColumnType('varchar');

${'user_id4_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id4_argument'}->checkNotNull();
if(!${'user_id4_argument'}->isValid()) return ${'user_id4_argument'}->getErrorMessage();
if(${'user_id4_argument'} !== null) ${'user_id4_argument'}->setColumnType('varchar');

${'email_address5_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address5_argument'}->checkNotNull();
if(!${'email_address5_argument'}->isValid()) return ${'email_address5_argument'}->getErrorMessage();
if(${'email_address5_argument'} !== null) ${'email_address5_argument'}->setColumnType('varchar');
if(isset($args->email_id)) {
${'email_id6_argument'} = new Argument('email_id', $args->{'email_id'});
if(!${'email_id6_argument'}->isValid()) return ${'email_id6_argument'}->getErrorMessage();
} else
${'email_id6_argument'} = NULL;if(${'email_id6_argument'} !== null) ${'email_id6_argument'}->setColumnType('varchar');
if(isset($args->email_host)) {
${'email_host7_argument'} = new Argument('email_host', $args->{'email_host'});
if(!${'email_host7_argument'}->isValid()) return ${'email_host7_argument'}->getErrorMessage();
} else
${'email_host7_argument'} = NULL;if(${'email_host7_argument'} !== null) ${'email_host7_argument'}->setColumnType('varchar');
if(isset($args->find_account_question)) {
${'find_account_question8_argument'} = new Argument('find_account_question', $args->{'find_account_question'});
if(!${'find_account_question8_argument'}->isValid()) return ${'find_account_question8_argument'}->getErrorMessage();
} else
${'find_account_question8_argument'} = NULL;if(${'find_account_question8_argument'} !== null) ${'find_account_question8_argument'}->setColumnType('number');

${'find_account_answer9_argument'} = new Argument('find_account_answer', $args->{'find_account_answer'});
${'find_account_answer9_argument'}->ensureDefaultValue('');
if(!${'find_account_answer9_argument'}->isValid()) return ${'find_account_answer9_argument'}->getErrorMessage();
if(${'find_account_answer9_argument'} !== null) ${'find_account_answer9_argument'}->setColumnType('varchar');

${'homepage10_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage10_argument'}->ensureDefaultValue('');
if(!${'homepage10_argument'}->isValid()) return ${'homepage10_argument'}->getErrorMessage();
if(${'homepage10_argument'} !== null) ${'homepage10_argument'}->setColumnType('varchar');

${'blog11_argument'} = new Argument('blog', $args->{'blog'});
${'blog11_argument'}->ensureDefaultValue('');
if(!${'blog11_argument'}->isValid()) return ${'blog11_argument'}->getErrorMessage();
if(${'blog11_argument'} !== null) ${'blog11_argument'}->setColumnType('varchar');
if(isset($args->birthday)) {
${'birthday12_argument'} = new Argument('birthday', $args->{'birthday'});
if(!${'birthday12_argument'}->isValid()) return ${'birthday12_argument'}->getErrorMessage();
} else
${'birthday12_argument'} = NULL;if(${'birthday12_argument'} !== null) ${'birthday12_argument'}->setColumnType('char');

${'allow_mailing13_argument'} = new Argument('allow_mailing', $args->{'allow_mailing'});
${'allow_mailing13_argument'}->ensureDefaultValue('Y');
if(!${'allow_mailing13_argument'}->isValid()) return ${'allow_mailing13_argument'}->getErrorMessage();
if(${'allow_mailing13_argument'} !== null) ${'allow_mailing13_argument'}->setColumnType('char');
if(isset($args->allow_message)) {
${'allow_message14_argument'} = new Argument('allow_message', $args->{'allow_message'});
if(!${'allow_message14_argument'}->isValid()) return ${'allow_message14_argument'}->getErrorMessage();
} else
${'allow_message14_argument'} = NULL;if(${'allow_message14_argument'} !== null) ${'allow_message14_argument'}->setColumnType('char');
if(isset($args->denied)) {
${'denied15_argument'} = new Argument('denied', $args->{'denied'});
if(!${'denied15_argument'}->isValid()) return ${'denied15_argument'}->getErrorMessage();
} else
${'denied15_argument'} = NULL;if(${'denied15_argument'} !== null) ${'denied15_argument'}->setColumnType('char');
if(isset($args->limit_date)) {
${'limit_date16_argument'} = new Argument('limit_date', $args->{'limit_date'});
if(!${'limit_date16_argument'}->isValid()) return ${'limit_date16_argument'}->getErrorMessage();
} else
${'limit_date16_argument'} = NULL;if(${'limit_date16_argument'} !== null) ${'limit_date16_argument'}->setColumnType('date');
if(isset($args->is_admin)) {
${'is_admin17_argument'} = new Argument('is_admin', $args->{'is_admin'});
if(!${'is_admin17_argument'}->isValid()) return ${'is_admin17_argument'}->getErrorMessage();
} else
${'is_admin17_argument'} = NULL;if(${'is_admin17_argument'} !== null) ${'is_admin17_argument'}->setColumnType('char');
if(isset($args->description)) {
${'description18_argument'} = new Argument('description', $args->{'description'});
if(!${'description18_argument'}->isValid()) return ${'description18_argument'}->getErrorMessage();
} else
${'description18_argument'} = NULL;if(${'description18_argument'} !== null) ${'description18_argument'}->setColumnType('text');
if(isset($args->extra_vars)) {
${'extra_vars19_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars19_argument'}->isValid()) return ${'extra_vars19_argument'}->getErrorMessage();
} else
${'extra_vars19_argument'} = NULL;if(${'extra_vars19_argument'} !== null) ${'extra_vars19_argument'}->setColumnType('text');

${'member_srl20_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl20_argument'}->checkFilter('number');
${'member_srl20_argument'}->checkNotNull();
${'member_srl20_argument'}->createConditionValue();
if(!${'member_srl20_argument'}->isValid()) return ${'member_srl20_argument'}->getErrorMessage();
if(${'member_srl20_argument'} !== null) ${'member_srl20_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`password`', ${'password1_argument'})
,new UpdateExpression('`user_name`', ${'user_name2_argument'})
,new UpdateExpression('`nick_name`', ${'nick_name3_argument'})
,new UpdateExpression('`user_id`', ${'user_id4_argument'})
,new UpdateExpression('`email_address`', ${'email_address5_argument'})
,new UpdateExpression('`email_id`', ${'email_id6_argument'})
,new UpdateExpression('`email_host`', ${'email_host7_argument'})
,new UpdateExpression('`find_account_question`', ${'find_account_question8_argument'})
,new UpdateExpression('`find_account_answer`', ${'find_account_answer9_argument'})
,new UpdateExpression('`homepage`', ${'homepage10_argument'})
,new UpdateExpression('`blog`', ${'blog11_argument'})
,new UpdateExpression('`birthday`', ${'birthday12_argument'})
,new UpdateExpression('`allow_mailing`', ${'allow_mailing13_argument'})
,new UpdateExpression('`allow_message`', ${'allow_message14_argument'})
,new UpdateExpression('`denied`', ${'denied15_argument'})
,new UpdateExpression('`limit_date`', ${'limit_date16_argument'})
,new UpdateExpression('`is_admin`', ${'is_admin17_argument'})
,new UpdateExpression('`description`', ${'description18_argument'})
,new UpdateExpression('`extra_vars`', ${'extra_vars19_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl20_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>