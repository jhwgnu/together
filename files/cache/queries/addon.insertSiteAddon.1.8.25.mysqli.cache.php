<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertSiteAddon");
$query->setAction("insert");
$query->setPriority("");

${'site_srl109_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl109_argument'}->checkNotNull();
if(!${'site_srl109_argument'}->isValid()) return ${'site_srl109_argument'}->getErrorMessage();
if(${'site_srl109_argument'} !== null) ${'site_srl109_argument'}->setColumnType('number');

${'addon110_argument'} = new Argument('addon', $args->{'addon'});
${'addon110_argument'}->checkNotNull();
if(!${'addon110_argument'}->isValid()) return ${'addon110_argument'}->getErrorMessage();
if(${'addon110_argument'} !== null) ${'addon110_argument'}->setColumnType('varchar');

${'is_used111_argument'} = new Argument('is_used', $args->{'is_used'});
${'is_used111_argument'}->ensureDefaultValue('N');
${'is_used111_argument'}->checkNotNull();
if(!${'is_used111_argument'}->isValid()) return ${'is_used111_argument'}->getErrorMessage();
if(${'is_used111_argument'} !== null) ${'is_used111_argument'}->setColumnType('char');

${'is_used_m112_argument'} = new Argument('is_used_m', $args->{'is_used_m'});
${'is_used_m112_argument'}->ensureDefaultValue('N');
if(!${'is_used_m112_argument'}->isValid()) return ${'is_used_m112_argument'}->getErrorMessage();
if(${'is_used_m112_argument'} !== null) ${'is_used_m112_argument'}->setColumnType('char');
if(isset($args->extra_vars)) {
${'extra_vars113_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars113_argument'}->isValid()) return ${'extra_vars113_argument'}->getErrorMessage();
} else
${'extra_vars113_argument'} = NULL;if(${'extra_vars113_argument'} !== null) ${'extra_vars113_argument'}->setColumnType('text');

${'regdate114_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate114_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate114_argument'}->isValid()) return ${'regdate114_argument'}->getErrorMessage();
if(${'regdate114_argument'} !== null) ${'regdate114_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl109_argument'})
,new InsertExpression('`addon`', ${'addon110_argument'})
,new InsertExpression('`is_used`', ${'is_used111_argument'})
,new InsertExpression('`is_used_m`', ${'is_used_m112_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars113_argument'})
,new InsertExpression('`regdate`', ${'regdate114_argument'})
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>