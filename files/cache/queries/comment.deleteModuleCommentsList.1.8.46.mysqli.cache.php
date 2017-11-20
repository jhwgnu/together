<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleCommentsList");
$query->setAction("delete");
$query->setPriority("");

${'module_srl12_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl12_argument'}->checkFilter('number');
${'module_srl12_argument'}->checkNotNull();
${'module_srl12_argument'}->createConditionValue();
if(!${'module_srl12_argument'}->isValid()) return ${'module_srl12_argument'}->getErrorMessage();
if(${'module_srl12_argument'} !== null) ${'module_srl12_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_comments_list`', '`comments_list`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl12_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>