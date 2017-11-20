<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateSite");
$query->setAction("update");
$query->setPriority("");
if(isset($args->index_module_srl)) {
${'index_module_srl1_argument'} = new Argument('index_module_srl', $args->{'index_module_srl'});
if(!${'index_module_srl1_argument'}->isValid()) return ${'index_module_srl1_argument'}->getErrorMessage();
} else
${'index_module_srl1_argument'} = NULL;if(${'index_module_srl1_argument'} !== null) ${'index_module_srl1_argument'}->setColumnType('number');
if(isset($args->domain)) {
${'domain2_argument'} = new Argument('domain', $args->{'domain'});
if(!${'domain2_argument'}->isValid()) return ${'domain2_argument'}->getErrorMessage();
} else
${'domain2_argument'} = NULL;if(${'domain2_argument'} !== null) ${'domain2_argument'}->setColumnType('varchar');
if(isset($args->default_language)) {
${'default_language3_argument'} = new Argument('default_language', $args->{'default_language'});
if(!${'default_language3_argument'}->isValid()) return ${'default_language3_argument'}->getErrorMessage();
} else
${'default_language3_argument'} = NULL;if(${'default_language3_argument'} !== null) ${'default_language3_argument'}->setColumnType('varchar');

${'site_srl4_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl4_argument'}->checkFilter('number');
${'site_srl4_argument'}->checkNotNull();
${'site_srl4_argument'}->createConditionValue();
if(!${'site_srl4_argument'}->isValid()) return ${'site_srl4_argument'}->getErrorMessage();
if(${'site_srl4_argument'} !== null) ${'site_srl4_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`index_module_srl`', ${'index_module_srl1_argument'})
,new UpdateExpression('`domain`', ${'domain2_argument'})
,new UpdateExpression('`default_language`', ${'default_language3_argument'})
));
$query->setTables(array(
new Table('`xe_sites`', '`sites`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>