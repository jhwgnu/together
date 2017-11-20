<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("isExistsSiteDomain");
$query->setAction("select");
$query->setPriority("");

${'domain4_argument'} = new ConditionArgument('domain', $args->domain, 'equal');
${'domain4_argument'}->checkNotNull();
${'domain4_argument'}->createConditionValue();
if(!${'domain4_argument'}->isValid()) return ${'domain4_argument'}->getErrorMessage();
if(${'domain4_argument'} !== null) ${'domain4_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_sites`', '`sites`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`domain`',$domain4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>