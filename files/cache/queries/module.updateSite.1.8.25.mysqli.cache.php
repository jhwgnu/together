<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateSite");
$query->setAction("update");
$query->setPriority("");
if(isset($args->index_module_srl)) {
${'index_module_srl290_argument'} = new Argument('index_module_srl', $args->{'index_module_srl'});
if(!${'index_module_srl290_argument'}->isValid()) return ${'index_module_srl290_argument'}->getErrorMessage();
} else
${'index_module_srl290_argument'} = NULL;if(${'index_module_srl290_argument'} !== null) ${'index_module_srl290_argument'}->setColumnType('number');
if(isset($args->domain)) {
${'domain291_argument'} = new Argument('domain', $args->{'domain'});
if(!${'domain291_argument'}->isValid()) return ${'domain291_argument'}->getErrorMessage();
} else
${'domain291_argument'} = NULL;if(${'domain291_argument'} !== null) ${'domain291_argument'}->setColumnType('varchar');
if(isset($args->default_language)) {
${'default_language292_argument'} = new Argument('default_language', $args->{'default_language'});
if(!${'default_language292_argument'}->isValid()) return ${'default_language292_argument'}->getErrorMessage();
} else
${'default_language292_argument'} = NULL;if(${'default_language292_argument'} !== null) ${'default_language292_argument'}->setColumnType('varchar');

${'site_srl293_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl293_argument'}->checkFilter('number');
${'site_srl293_argument'}->checkNotNull();
${'site_srl293_argument'}->createConditionValue();
if(!${'site_srl293_argument'}->isValid()) return ${'site_srl293_argument'}->getErrorMessage();
if(${'site_srl293_argument'} !== null) ${'site_srl293_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`index_module_srl`', ${'index_module_srl290_argument'})
,new UpdateExpression('`domain`', ${'domain291_argument'})
,new UpdateExpression('`default_language`', ${'default_language292_argument'})
));
$query->setTables(array(
new Table('`xe_sites`', '`sites`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl293_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>