<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertGuestbookItem");
$query->setAction("insert");
$query->setPriority("");

${'guestbook_item_srl1_argument'} = new Argument('guestbook_item_srl', $args->{'guestbook_item_srl'});
${'guestbook_item_srl1_argument'}->checkFilter('number');
${'guestbook_item_srl1_argument'}->checkNotNull();
if(!${'guestbook_item_srl1_argument'}->isValid()) return ${'guestbook_item_srl1_argument'}->getErrorMessage();
if(${'guestbook_item_srl1_argument'} !== null) ${'guestbook_item_srl1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->checkNotNull();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

${'parent_srl3_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl3_argument'}->checkFilter('number');
${'parent_srl3_argument'}->ensureDefaultValue('0');
${'parent_srl3_argument'}->checkNotNull();
if(!${'parent_srl3_argument'}->isValid()) return ${'parent_srl3_argument'}->getErrorMessage();
if(${'parent_srl3_argument'} !== null) ${'parent_srl3_argument'}->setColumnType('number');

${'member_srl4_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl4_argument'}->checkFilter('number');
${'member_srl4_argument'}->ensureDefaultValue('0');
if(!${'member_srl4_argument'}->isValid()) return ${'member_srl4_argument'}->getErrorMessage();
if(${'member_srl4_argument'} !== null) ${'member_srl4_argument'}->setColumnType('number');

${'password5_argument'} = new Argument('password', $args->{'password'});
${'password5_argument'}->ensureDefaultValue('');
if(!${'password5_argument'}->isValid()) return ${'password5_argument'}->getErrorMessage();
if(${'password5_argument'} !== null) ${'password5_argument'}->setColumnType('varchar');

${'user_name6_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name6_argument'}->ensureDefaultValue('');
${'user_name6_argument'}->checkNotNull();
if(!${'user_name6_argument'}->isValid()) return ${'user_name6_argument'}->getErrorMessage();
if(${'user_name6_argument'} !== null) ${'user_name6_argument'}->setColumnType('varchar');

${'user_id7_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id7_argument'}->ensureDefaultValue('');
${'user_id7_argument'}->checkNotNull();
if(!${'user_id7_argument'}->isValid()) return ${'user_id7_argument'}->getErrorMessage();
if(${'user_id7_argument'} !== null) ${'user_id7_argument'}->setColumnType('varchar');

${'nick_name8_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name8_argument'}->ensureDefaultValue('');
${'nick_name8_argument'}->checkNotNull();
if(!${'nick_name8_argument'}->isValid()) return ${'nick_name8_argument'}->getErrorMessage();
if(${'nick_name8_argument'} !== null) ${'nick_name8_argument'}->setColumnType('varchar');
if(isset($args->email_address)) {
${'email_address9_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address9_argument'}->checkFilter('email');
if(!${'email_address9_argument'}->isValid()) return ${'email_address9_argument'}->getErrorMessage();
} else
${'email_address9_argument'} = NULL;if(${'email_address9_argument'} !== null) ${'email_address9_argument'}->setColumnType('varchar');

${'homepage10_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage10_argument'}->ensureDefaultValue('');
if(!${'homepage10_argument'}->isValid()) return ${'homepage10_argument'}->getErrorMessage();
if(${'homepage10_argument'} !== null) ${'homepage10_argument'}->setColumnType('varchar');

${'content11_argument'} = new Argument('content', $args->{'content'});
${'content11_argument'}->ensureDefaultValue('');
${'content11_argument'}->checkNotNull();
if(!${'content11_argument'}->isValid()) return ${'content11_argument'}->getErrorMessage();
if(${'content11_argument'} !== null) ${'content11_argument'}->setColumnType('bigtext');

${'regdate12_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate12_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate12_argument'}->isValid()) return ${'regdate12_argument'}->getErrorMessage();
if(${'regdate12_argument'} !== null) ${'regdate12_argument'}->setColumnType('date');

${'last_update13_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update13_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update13_argument'}->isValid()) return ${'last_update13_argument'}->getErrorMessage();
if(${'last_update13_argument'} !== null) ${'last_update13_argument'}->setColumnType('date');

${'is_secret14_argument'} = new Argument('is_secret', $args->{'is_secret'});
${'is_secret14_argument'}->ensureDefaultValue('-1');
if(!${'is_secret14_argument'}->isValid()) return ${'is_secret14_argument'}->getErrorMessage();
if(${'is_secret14_argument'} !== null) ${'is_secret14_argument'}->setColumnType('number');

${'list_order15_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order15_argument'}->ensureDefaultValue('0');
if(!${'list_order15_argument'}->isValid()) return ${'list_order15_argument'}->getErrorMessage();
if(${'list_order15_argument'} !== null) ${'list_order15_argument'}->setColumnType('number');

${'ipaddress16_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress16_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress16_argument'}->isValid()) return ${'ipaddress16_argument'}->getErrorMessage();
if(${'ipaddress16_argument'} !== null) ${'ipaddress16_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`guestbook_item_srl`', ${'guestbook_item_srl1_argument'})
,new InsertExpression('`module_srl`', ${'module_srl2_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl3_argument'})
,new InsertExpression('`member_srl`', ${'member_srl4_argument'})
,new InsertExpression('`password`', ${'password5_argument'})
,new InsertExpression('`user_name`', ${'user_name6_argument'})
,new InsertExpression('`user_id`', ${'user_id7_argument'})
,new InsertExpression('`nick_name`', ${'nick_name8_argument'})
,new InsertExpression('`email_address`', ${'email_address9_argument'})
,new InsertExpression('`homepage`', ${'homepage10_argument'})
,new InsertExpression('`content`', ${'content11_argument'})
,new InsertExpression('`regdate`', ${'regdate12_argument'})
,new InsertExpression('`last_update`', ${'last_update13_argument'})
,new InsertExpression('`is_secret`', ${'is_secret14_argument'})
,new InsertExpression('`list_order`', ${'list_order15_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress16_argument'})
));
$query->setTables(array(
new Table('`xe_guestbook_item`', '`guestbook_item`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>