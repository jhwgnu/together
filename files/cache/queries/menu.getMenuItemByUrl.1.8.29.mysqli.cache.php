<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuItemByUrl");
$query->setAction("select");
$query->setPriority("");

${'url3_argument'} = new ConditionArgument('url', $args->url, 'equal');
${'url3_argument'}->checkNotNull();
${'url3_argument'}->createConditionValue();
if(!${'url3_argument'}->isValid()) return ${'url3_argument'}->getErrorMessage();
if(${'url3_argument'} !== null) ${'url3_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut4_argument'} = new ConditionArgument('is_shortcut', $args->is_shortcut, 'equal');
${'is_shortcut4_argument'}->createConditionValue();
if(!${'is_shortcut4_argument'}->isValid()) return ${'is_shortcut4_argument'}->getErrorMessage();
} else
${'is_shortcut4_argument'} = NULL;if(${'is_shortcut4_argument'} !== null) ${'is_shortcut4_argument'}->setColumnType('char');

${'site_srl5_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl5_argument'}->checkNotNull();
${'site_srl5_argument'}->createConditionValue();
if(!${'site_srl5_argument'}->isValid()) return ${'site_srl5_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu_item`', '`MI`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`MI`.`url`',$url3_argument,"equal")
,new ConditionWithArgument('`MI`.`is_shortcut`',$is_shortcut4_argument,"equal", 'and')
,new ConditionSubquery('`MI`.`menu_srl`',new Subquery('`getSiteSrl`', array(
new SelectExpression('`menu_srl`')
), 
array(
new Table('`xe_menu`', '`M`')
),
array(
new ConditionGroup(array(
new ConditionWithArgument('`M`.`site_srl`',$site_srl5_argument,"equal")))
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