<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertGroup");
$query->setAction("insert");
$query->setPriority("");

${'site_srl33_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl33_argument'}->ensureDefaultValue('0');
${'site_srl33_argument'}->checkNotNull();
if(!${'site_srl33_argument'}->isValid()) return ${'site_srl33_argument'}->getErrorMessage();
if(${'site_srl33_argument'} !== null) ${'site_srl33_argument'}->setColumnType('number');

${'group_srl34_argument'} = new Argument('group_srl', $args->{'group_srl'});
${'group_srl34_argument'}->checkNotNull();
if(!${'group_srl34_argument'}->isValid()) return ${'group_srl34_argument'}->getErrorMessage();
if(${'group_srl34_argument'} !== null) ${'group_srl34_argument'}->setColumnType('number');

${'list_order35_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order35_argument'}->checkNotNull();
if(!${'list_order35_argument'}->isValid()) return ${'list_order35_argument'}->getErrorMessage();
if(${'list_order35_argument'} !== null) ${'list_order35_argument'}->setColumnType('number');

${'title36_argument'} = new Argument('title', $args->{'title'});
${'title36_argument'}->checkNotNull();
if(!${'title36_argument'}->isValid()) return ${'title36_argument'}->getErrorMessage();
if(${'title36_argument'} !== null) ${'title36_argument'}->setColumnType('varchar');

${'is_default37_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default37_argument'}->ensureDefaultValue('N');
${'is_default37_argument'}->checkNotNull();
if(!${'is_default37_argument'}->isValid()) return ${'is_default37_argument'}->getErrorMessage();
if(${'is_default37_argument'} !== null) ${'is_default37_argument'}->setColumnType('char');

${'is_admin38_argument'} = new Argument('is_admin', $args->{'is_admin'});
${'is_admin38_argument'}->ensureDefaultValue('N');
${'is_admin38_argument'}->checkNotNull();
if(!${'is_admin38_argument'}->isValid()) return ${'is_admin38_argument'}->getErrorMessage();
if(${'is_admin38_argument'} !== null) ${'is_admin38_argument'}->setColumnType('char');

${'regdate39_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate39_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate39_argument'}->isValid()) return ${'regdate39_argument'}->getErrorMessage();
if(${'regdate39_argument'} !== null) ${'regdate39_argument'}->setColumnType('date');

${'description40_argument'} = new Argument('description', $args->{'description'});
${'description40_argument'}->ensureDefaultValue('');
if(!${'description40_argument'}->isValid()) return ${'description40_argument'}->getErrorMessage();
if(${'description40_argument'} !== null) ${'description40_argument'}->setColumnType('text');

${'image_mark41_argument'} = new Argument('image_mark', $args->{'image_mark'});
${'image_mark41_argument'}->ensureDefaultValue('');
if(!${'image_mark41_argument'}->isValid()) return ${'image_mark41_argument'}->getErrorMessage();
if(${'image_mark41_argument'} !== null) ${'image_mark41_argument'}->setColumnType('text');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl33_argument'})
,new InsertExpression('`group_srl`', ${'group_srl34_argument'})
,new InsertExpression('`list_order`', ${'list_order35_argument'})
,new InsertExpression('`title`', ${'title36_argument'})
,new InsertExpression('`is_default`', ${'is_default37_argument'})
,new InsertExpression('`is_admin`', ${'is_admin38_argument'})
,new InsertExpression('`regdate`', ${'regdate39_argument'})
,new InsertExpression('`description`', ${'description40_argument'})
,new InsertExpression('`image_mark`', ${'image_mark41_argument'})
));
$query->setTables(array(
new Table('`xe_member_group`', '`member_group`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>