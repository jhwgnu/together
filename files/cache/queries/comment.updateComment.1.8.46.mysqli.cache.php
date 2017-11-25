<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateComment");
$query->setAction("update");
$query->setPriority("");

${'module_srl1_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->ensureDefaultValue('0');
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl2_argument'} = new Argument('member_srl', $args->{'member_srl'});
if(!${'member_srl2_argument'}->isValid()) return ${'member_srl2_argument'}->getErrorMessage();
} else
${'member_srl2_argument'} = NULL;if(${'member_srl2_argument'} !== null) ${'member_srl2_argument'}->setColumnType('number');

${'parent_srl3_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl3_argument'}->checkFilter('number');
${'parent_srl3_argument'}->ensureDefaultValue('0');
if(!${'parent_srl3_argument'}->isValid()) return ${'parent_srl3_argument'}->getErrorMessage();
if(${'parent_srl3_argument'} !== null) ${'parent_srl3_argument'}->setColumnType('number');

${'is_secret4_argument'} = new Argument('is_secret', $args->{'is_secret'});
${'is_secret4_argument'}->ensureDefaultValue('N');
if(!${'is_secret4_argument'}->isValid()) return ${'is_secret4_argument'}->getErrorMessage();
if(${'is_secret4_argument'} !== null) ${'is_secret4_argument'}->setColumnType('char');

${'notify_message5_argument'} = new Argument('notify_message', $args->{'notify_message'});
${'notify_message5_argument'}->ensureDefaultValue('N');
if(!${'notify_message5_argument'}->isValid()) return ${'notify_message5_argument'}->getErrorMessage();
if(${'notify_message5_argument'} !== null) ${'notify_message5_argument'}->setColumnType('char');

${'content6_argument'} = new Argument('content', $args->{'content'});
${'content6_argument'}->checkNotNull();
if(!${'content6_argument'}->isValid()) return ${'content6_argument'}->getErrorMessage();
if(${'content6_argument'} !== null) ${'content6_argument'}->setColumnType('bigtext');
if(isset($args->password)) {
${'password7_argument'} = new Argument('password', $args->{'password'});
if(!${'password7_argument'}->isValid()) return ${'password7_argument'}->getErrorMessage();
} else
${'password7_argument'} = NULL;if(${'password7_argument'} !== null) ${'password7_argument'}->setColumnType('varchar');
if(isset($args->user_id)) {
${'user_id8_argument'} = new Argument('user_id', $args->{'user_id'});
if(!${'user_id8_argument'}->isValid()) return ${'user_id8_argument'}->getErrorMessage();
} else
${'user_id8_argument'} = NULL;if(${'user_id8_argument'} !== null) ${'user_id8_argument'}->setColumnType('varchar');

${'user_name9_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name9_argument'}->ensureDefaultValue('');
if(!${'user_name9_argument'}->isValid()) return ${'user_name9_argument'}->getErrorMessage();
if(${'user_name9_argument'} !== null) ${'user_name9_argument'}->setColumnType('varchar');

${'nick_name10_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name10_argument'}->checkNotNull();
if(!${'nick_name10_argument'}->isValid()) return ${'nick_name10_argument'}->getErrorMessage();
if(${'nick_name10_argument'} !== null) ${'nick_name10_argument'}->setColumnType('varchar');
if(isset($args->email_address)) {
${'email_address11_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address11_argument'}->checkFilter('email');
if(!${'email_address11_argument'}->isValid()) return ${'email_address11_argument'}->getErrorMessage();
} else
${'email_address11_argument'} = NULL;if(${'email_address11_argument'} !== null) ${'email_address11_argument'}->setColumnType('varchar');
if(isset($args->homepage)) {
${'homepage12_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage12_argument'}->checkFilter('homepage');
if(!${'homepage12_argument'}->isValid()) return ${'homepage12_argument'}->getErrorMessage();
} else
${'homepage12_argument'} = NULL;if(${'homepage12_argument'} !== null) ${'homepage12_argument'}->setColumnType('varchar');

${'uploaded_count13_argument'} = new Argument('uploaded_count', $args->{'uploaded_count'});
${'uploaded_count13_argument'}->ensureDefaultValue('0');
if(!${'uploaded_count13_argument'}->isValid()) return ${'uploaded_count13_argument'}->getErrorMessage();
if(${'uploaded_count13_argument'} !== null) ${'uploaded_count13_argument'}->setColumnType('number');

${'last_update14_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update14_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update14_argument'}->isValid()) return ${'last_update14_argument'}->getErrorMessage();
if(${'last_update14_argument'} !== null) ${'last_update14_argument'}->setColumnType('date');

${'comment_srl15_argument'} = new ConditionArgument('comment_srl', $args->comment_srl, 'equal');
${'comment_srl15_argument'}->checkFilter('number');
${'comment_srl15_argument'}->checkNotNull();
${'comment_srl15_argument'}->createConditionValue();
if(!${'comment_srl15_argument'}->isValid()) return ${'comment_srl15_argument'}->getErrorMessage();
if(${'comment_srl15_argument'} !== null) ${'comment_srl15_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`module_srl`', ${'module_srl1_argument'})
,new UpdateExpression('`member_srl`', ${'member_srl2_argument'})
,new UpdateExpression('`parent_srl`', ${'parent_srl3_argument'})
,new UpdateExpression('`is_secret`', ${'is_secret4_argument'})
,new UpdateExpression('`notify_message`', ${'notify_message5_argument'})
,new UpdateExpression('`content`', ${'content6_argument'})
,new UpdateExpression('`password`', ${'password7_argument'})
,new UpdateExpression('`user_id`', ${'user_id8_argument'})
,new UpdateExpression('`user_name`', ${'user_name9_argument'})
,new UpdateExpression('`nick_name`', ${'nick_name10_argument'})
,new UpdateExpression('`email_address`', ${'email_address11_argument'})
,new UpdateExpression('`homepage`', ${'homepage12_argument'})
,new UpdateExpression('`uploaded_count`', ${'uploaded_count13_argument'})
,new UpdateExpression('`last_update`', ${'last_update14_argument'})
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comment_srl`',$comment_srl15_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>