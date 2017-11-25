<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("sendMessage");
$query->setAction("insert");
$query->setPriority("");

${'message_srl2_argument'} = new Argument('message_srl', $args->{'message_srl'});
${'message_srl2_argument'}->checkNotNull();
if(!${'message_srl2_argument'}->isValid()) return ${'message_srl2_argument'}->getErrorMessage();
if(${'message_srl2_argument'} !== null) ${'message_srl2_argument'}->setColumnType('number');

${'related_srl3_argument'} = new Argument('related_srl', $args->{'related_srl'});
${'related_srl3_argument'}->ensureDefaultValue('0');
if(!${'related_srl3_argument'}->isValid()) return ${'related_srl3_argument'}->getErrorMessage();
if(${'related_srl3_argument'} !== null) ${'related_srl3_argument'}->setColumnType('number');

${'list_order4_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order4_argument'}->checkNotNull();
if(!${'list_order4_argument'}->isValid()) return ${'list_order4_argument'}->getErrorMessage();
if(${'list_order4_argument'} !== null) ${'list_order4_argument'}->setColumnType('number');

${'sender_srl5_argument'} = new Argument('sender_srl', $args->{'sender_srl'});
${'sender_srl5_argument'}->checkNotNull();
if(!${'sender_srl5_argument'}->isValid()) return ${'sender_srl5_argument'}->getErrorMessage();
if(${'sender_srl5_argument'} !== null) ${'sender_srl5_argument'}->setColumnType('number');

${'receiver_srl6_argument'} = new Argument('receiver_srl', $args->{'receiver_srl'});
${'receiver_srl6_argument'}->checkNotNull();
if(!${'receiver_srl6_argument'}->isValid()) return ${'receiver_srl6_argument'}->getErrorMessage();
if(${'receiver_srl6_argument'} !== null) ${'receiver_srl6_argument'}->setColumnType('number');

${'message_type7_argument'} = new Argument('message_type', $args->{'message_type'});
${'message_type7_argument'}->checkNotNull();
if(!${'message_type7_argument'}->isValid()) return ${'message_type7_argument'}->getErrorMessage();
if(${'message_type7_argument'} !== null) ${'message_type7_argument'}->setColumnType('char');

${'title8_argument'} = new Argument('title', $args->{'title'});
${'title8_argument'}->checkNotNull();
if(!${'title8_argument'}->isValid()) return ${'title8_argument'}->getErrorMessage();
if(${'title8_argument'} !== null) ${'title8_argument'}->setColumnType('varchar');

${'content9_argument'} = new Argument('content', $args->{'content'});
${'content9_argument'}->checkNotNull();
if(!${'content9_argument'}->isValid()) return ${'content9_argument'}->getErrorMessage();
if(${'content9_argument'} !== null) ${'content9_argument'}->setColumnType('text');

${'readed10_argument'} = new Argument('readed', $args->{'readed'});
${'readed10_argument'}->checkNotNull();
if(!${'readed10_argument'}->isValid()) return ${'readed10_argument'}->getErrorMessage();
if(${'readed10_argument'} !== null) ${'readed10_argument'}->setColumnType('char');

${'regdate11_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate11_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate11_argument'}->isValid()) return ${'regdate11_argument'}->getErrorMessage();
if(${'regdate11_argument'} !== null) ${'regdate11_argument'}->setColumnType('date');
if(isset($args->readed_date)) {
${'readed_date12_argument'} = new Argument('readed_date', $args->{'readed_date'});
if(!${'readed_date12_argument'}->isValid()) return ${'readed_date12_argument'}->getErrorMessage();
} else
${'readed_date12_argument'} = NULL;if(${'readed_date12_argument'} !== null) ${'readed_date12_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`message_srl`', ${'message_srl2_argument'})
,new InsertExpression('`related_srl`', ${'related_srl3_argument'})
,new InsertExpression('`list_order`', ${'list_order4_argument'})
,new InsertExpression('`sender_srl`', ${'sender_srl5_argument'})
,new InsertExpression('`receiver_srl`', ${'receiver_srl6_argument'})
,new InsertExpression('`message_type`', ${'message_type7_argument'})
,new InsertExpression('`title`', ${'title8_argument'})
,new InsertExpression('`content`', ${'content9_argument'})
,new InsertExpression('`readed`', ${'readed10_argument'})
,new InsertExpression('`regdate`', ${'regdate11_argument'})
,new InsertExpression('`readed_date`', ${'readed_date12_argument'})
));
$query->setTables(array(
new Table('`xe_member_message`', '`member_message`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>