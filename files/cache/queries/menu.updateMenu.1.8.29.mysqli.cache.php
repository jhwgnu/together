<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMenu");
$query->setAction("update");
$query->setPriority("");

${'title1_argument'} = new Argument('title', $args->{'title'});
${'title1_argument'}->checkNotNull();
if(!${'title1_argument'}->isValid()) return ${'title1_argument'}->getErrorMessage();
if(${'title1_argument'} !== null) ${'title1_argument'}->setColumnType('varchar');

${'menu_srl2_argument'} = new ConditionArgument('menu_srl', $args->menu_srl, 'equal');
${'menu_srl2_argument'}->checkFilter('number');
${'menu_srl2_argument'}->checkNotNull();
${'menu_srl2_argument'}->createConditionValue();
if(!${'menu_srl2_argument'}->isValid()) return ${'menu_srl2_argument'}->getErrorMessage();
if(${'menu_srl2_argument'} !== null) ${'menu_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`title`', ${'title1_argument'})
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_srl`',$menu_srl2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>