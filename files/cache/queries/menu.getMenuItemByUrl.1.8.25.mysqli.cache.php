<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuItemByUrl");
$query->setAction("select");
$query->setPriority("");

${'url273_argument'} = new ConditionArgument('url', $args->url, 'equal');
${'url273_argument'}->checkNotNull();
${'url273_argument'}->createConditionValue();
if(!${'url273_argument'}->isValid()) return ${'url273_argument'}->getErrorMessage();
if(${'url273_argument'} !== null) ${'url273_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut274_argument'} = new ConditionArgument('is_shortcut', $args->is_shortcut, 'equal');
${'is_shortcut274_argument'}->createConditionValue();
if(!${'is_shortcut274_argument'}->isValid()) return ${'is_shortcut274_argument'}->getErrorMessage();
} else
${'is_shortcut274_argument'} = NULL;if(${'is_shortcut274_argument'} !== null) ${'is_shortcut274_argument'}->setColumnType('char');

${'site_srl275_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl275_argument'}->checkNotNull();
${'site_srl275_argument'}->createConditionValue();
if(!${'site_srl275_argument'}->isValid()) return ${'site_srl275_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu_item`', '`MI`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`MI`.`url`',$url273_argument,"equal")
,new ConditionWithArgument('`MI`.`is_shortcut`',$is_shortcut274_argument,"equal", 'and')
,new ConditionSubquery('`MI`.`menu_srl`',new Subquery('`getSiteSrl`', array(
new SelectExpression('`menu_srl`')
), 
array(
new Table('`xe_menu`', '`M`')
),
array(
new ConditionGroup(array(
new ConditionWithArgument('`M`.`site_srl`',$site_srl275_argument,"equal")))
),
array(),
array(),
null
),"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>