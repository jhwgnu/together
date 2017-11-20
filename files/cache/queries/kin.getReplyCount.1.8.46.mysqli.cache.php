<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getReplies");
$query->setAction("select");
$query->setPriority("");

${'parent_srl3_argument'} = new ConditionArgument('parent_srl', $args->parent_srl, 'in');
${'parent_srl3_argument'}->checkNotNull();
${'parent_srl3_argument'}->createConditionValue();
if(!${'parent_srl3_argument'}->isValid()) return ${'parent_srl3_argument'}->getErrorMessage();
if(${'parent_srl3_argument'} !== null) ${'parent_srl3_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`parent_srl`')
,new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_kin_replies`', '`kin_replies`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`parent_srl`',$parent_srl3_argument,"in")))
));
$query->setGroups(array(
'`parent_srl`' ));
$query->setOrder(array());
$query->setLimit();
return $query; ?>