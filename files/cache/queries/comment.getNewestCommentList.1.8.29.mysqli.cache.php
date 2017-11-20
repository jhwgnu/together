<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNewestCommentList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->status)) {
${'status44_argument'} = new ConditionArgument('status', $args->status, 'equal');
${'status44_argument'}->createConditionValue();
if(!${'status44_argument'}->isValid()) return ${'status44_argument'}->getErrorMessage();
} else
${'status44_argument'} = NULL;if(${'status44_argument'} !== null) ${'status44_argument'}->setColumnType('number');
if(isset($args->module_srl)) {
${'module_srl45_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl45_argument'}->checkFilter('number');
${'module_srl45_argument'}->createConditionValue();
if(!${'module_srl45_argument'}->isValid()) return ${'module_srl45_argument'}->getErrorMessage();
} else
${'module_srl45_argument'} = NULL;if(${'module_srl45_argument'} !== null) ${'module_srl45_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl46_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl46_argument'}->checkFilter('number');
${'document_srl46_argument'}->createConditionValue();
if(!${'document_srl46_argument'}->isValid()) return ${'document_srl46_argument'}->getErrorMessage();
} else
${'document_srl46_argument'} = NULL;if(${'document_srl46_argument'} !== null) ${'document_srl46_argument'}->setColumnType('number');

${'list_count48_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count48_argument'}->ensureDefaultValue('20');
if(!${'list_count48_argument'}->isValid()) return ${'list_count48_argument'}->getErrorMessage();

${'sort_index47_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index47_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index47_argument'}->isValid()) return ${'sort_index47_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`status`',$status44_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl45_argument,"in", 'and')
,new ConditionWithArgument('`document_srl`',$document_srl46_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index47_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count48_argument'}));
return $query; ?>