<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGroupsExtraVars");
$query->setAction("select");
$query->setPriority("");

${'module_srl13_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl13_argument'}->checkFilter('number');
${'module_srl13_argument'}->checkNotNull();
${'module_srl13_argument'}->createConditionValue();
if(!${'module_srl13_argument'}->isValid()) return ${'module_srl13_argument'}->getErrorMessage();
if(${'module_srl13_argument'} !== null) ${'module_srl13_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx14_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'notin');
${'var_idx14_argument'}->checkFilter('number');
${'var_idx14_argument'}->createConditionValue();
if(!${'var_idx14_argument'}->isValid()) return ${'var_idx14_argument'}->getErrorMessage();
} else
${'var_idx14_argument'} = NULL;if(${'var_idx14_argument'} !== null) ${'var_idx14_argument'}->setColumnType('number');
if(isset($args->eid)) {
${'eid15_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid15_argument'}->createConditionValue();
if(!${'eid15_argument'}->isValid()) return ${'eid15_argument'}->getErrorMessage();
} else
${'eid15_argument'} = NULL;if(${'eid15_argument'} !== null) ${'eid15_argument'}->setColumnType('varchar');

${'sort_index16_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index16_argument'}->ensureDefaultValue('var_idx');
if(!${'sort_index16_argument'}->isValid()) return ${'sort_index16_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`module_srl`', '`module_srl`')
,new SelectExpression('`var_idx`', '`idx`')
,new SelectExpression('`eid`', '`eid`')
));
$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl13_argument,"equal")
,new ConditionWithArgument('`var_idx`',$var_idx14_argument,"notin", 'and')
,new ConditionWithArgument('`eid`',$eid15_argument,"equal", 'and')))
));
$query->setGroups(array(
'`module_srl`' ,'`var_idx`' ,'`eid`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index16_argument'}, "asc")
));
$query->setLimit();
return $query; ?>