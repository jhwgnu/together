<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("isExistsSiteDomain");
$query->setAction("select");
$query->setPriority("");

${'domain127_argument'} = new ConditionArgument('domain', $args->domain, 'equal');
${'domain127_argument'}->checkNotNull();
${'domain127_argument'}->createConditionValue();
if(!${'domain127_argument'}->isValid()) return ${'domain127_argument'}->getErrorMessage();
if(${'domain127_argument'} !== null) ${'domain127_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_sites`', '`sites`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`domain`',$domain127_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>