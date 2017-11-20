<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMidList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl3_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl3_argument'}->createConditionValue();
if(!${'module_srl3_argument'}->isValid()) return ${'module_srl3_argument'}->getErrorMessage();
} else
${'module_srl3_argument'} = NULL;if(${'module_srl3_argument'} !== null) ${'module_srl3_argument'}->setColumnType('number');
if(isset($args->module_srls)) {
${'module_srls4_argument'} = new ConditionArgument('module_srls', $args->module_srls, 'in');
${'module_srls4_argument'}->createConditionValue();
if(!${'module_srls4_argument'}->isValid()) return ${'module_srls4_argument'}->getErrorMessage();
} else
${'module_srls4_argument'} = NULL;if(${'module_srls4_argument'} !== null) ${'module_srls4_argument'}->setColumnType('number');
if(isset($args->site_srl)) {
${'site_srl5_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl5_argument'}->createConditionValue();
if(!${'site_srl5_argument'}->isValid()) return ${'site_srl5_argument'}->getErrorMessage();
} else
${'site_srl5_argument'} = NULL;if(${'site_srl5_argument'} !== null) ${'site_srl5_argument'}->setColumnType('number');
if(isset($args->module)) {
${'module6_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module6_argument'}->createConditionValue();
if(!${'module6_argument'}->isValid()) return ${'module6_argument'}->getErrorMessage();
} else
${'module6_argument'} = NULL;if(${'module6_argument'} !== null) ${'module6_argument'}->setColumnType('varchar');
if(isset($args->module_category_srl)) {
${'module_category_srl7_argument'} = new ConditionArgument('module_category_srl', $args->module_category_srl, 'equal');
${'module_category_srl7_argument'}->createConditionValue();
if(!${'module_category_srl7_argument'}->isValid()) return ${'module_category_srl7_argument'}->getErrorMessage();
} else
${'module_category_srl7_argument'} = NULL;if(${'module_category_srl7_argument'} !== null) ${'module_category_srl7_argument'}->setColumnType('number');

${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index8_argument'}->ensureDefaultValue('browser_title');
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl3_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srls4_argument,"in", 'and')
,new ConditionWithArgument('`site_srl`',$site_srl5_argument,"equal", 'and')
,new ConditionWithArgument('`module`',$module6_argument,"equal", 'and')
,new ConditionWithArgument('`module_category_srl`',$module_category_srl7_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, "asc")
));
$query->setLimit();
return $query; ?>