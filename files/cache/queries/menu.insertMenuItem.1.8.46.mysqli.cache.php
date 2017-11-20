<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMenuItem");
$query->setAction("insert");
$query->setPriority("");

${'menu_item_srl29_argument'} = new Argument('menu_item_srl', $args->{'menu_item_srl'});
${'menu_item_srl29_argument'}->checkFilter('number');
${'menu_item_srl29_argument'}->checkNotNull();
if(!${'menu_item_srl29_argument'}->isValid()) return ${'menu_item_srl29_argument'}->getErrorMessage();
if(${'menu_item_srl29_argument'} !== null) ${'menu_item_srl29_argument'}->setColumnType('number');

${'parent_srl30_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl30_argument'}->checkFilter('number');
${'parent_srl30_argument'}->ensureDefaultValue('0');
if(!${'parent_srl30_argument'}->isValid()) return ${'parent_srl30_argument'}->getErrorMessage();
if(${'parent_srl30_argument'} !== null) ${'parent_srl30_argument'}->setColumnType('number');

${'menu_srl31_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl31_argument'}->checkFilter('number');
${'menu_srl31_argument'}->checkNotNull();
if(!${'menu_srl31_argument'}->isValid()) return ${'menu_srl31_argument'}->getErrorMessage();
if(${'menu_srl31_argument'} !== null) ${'menu_srl31_argument'}->setColumnType('number');

${'name32_argument'} = new Argument('name', $args->{'name'});
${'name32_argument'}->checkNotNull();
if(!${'name32_argument'}->isValid()) return ${'name32_argument'}->getErrorMessage();
if(${'name32_argument'} !== null) ${'name32_argument'}->setColumnType('text');
if(isset($args->desc)) {
${'desc33_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc33_argument'}->isValid()) return ${'desc33_argument'}->getErrorMessage();
} else
${'desc33_argument'} = NULL;if(${'desc33_argument'} !== null) ${'desc33_argument'}->setColumnType('varchar');
if(isset($args->url)) {
${'url34_argument'} = new Argument('url', $args->{'url'});
if(!${'url34_argument'}->isValid()) return ${'url34_argument'}->getErrorMessage();
} else
${'url34_argument'} = NULL;if(${'url34_argument'} !== null) ${'url34_argument'}->setColumnType('varchar');

${'is_shortcut35_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
${'is_shortcut35_argument'}->ensureDefaultValue('N');
${'is_shortcut35_argument'}->checkNotNull();
if(!${'is_shortcut35_argument'}->isValid()) return ${'is_shortcut35_argument'}->getErrorMessage();
if(${'is_shortcut35_argument'} !== null) ${'is_shortcut35_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window36_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window36_argument'}->isValid()) return ${'open_window36_argument'}->getErrorMessage();
} else
${'open_window36_argument'} = NULL;if(${'open_window36_argument'} !== null) ${'open_window36_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand37_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand37_argument'}->isValid()) return ${'expand37_argument'}->getErrorMessage();
} else
${'expand37_argument'} = NULL;if(${'expand37_argument'} !== null) ${'expand37_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn38_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn38_argument'}->isValid()) return ${'normal_btn38_argument'}->getErrorMessage();
} else
${'normal_btn38_argument'} = NULL;if(${'normal_btn38_argument'} !== null) ${'normal_btn38_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn39_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn39_argument'}->isValid()) return ${'hover_btn39_argument'}->getErrorMessage();
} else
${'hover_btn39_argument'} = NULL;if(${'hover_btn39_argument'} !== null) ${'hover_btn39_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn40_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn40_argument'}->isValid()) return ${'active_btn40_argument'}->getErrorMessage();
} else
${'active_btn40_argument'} = NULL;if(${'active_btn40_argument'} !== null) ${'active_btn40_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls41_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls41_argument'}->isValid()) return ${'group_srls41_argument'}->getErrorMessage();
} else
${'group_srls41_argument'} = NULL;if(${'group_srls41_argument'} !== null) ${'group_srls41_argument'}->setColumnType('text');

${'listorder42_argument'} = new Argument('listorder', $args->{'listorder'});
${'listorder42_argument'}->checkNotNull();
if(!${'listorder42_argument'}->isValid()) return ${'listorder42_argument'}->getErrorMessage();
if(${'listorder42_argument'} !== null) ${'listorder42_argument'}->setColumnType('number');

${'regdate43_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate43_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate43_argument'}->isValid()) return ${'regdate43_argument'}->getErrorMessage();
if(${'regdate43_argument'} !== null) ${'regdate43_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`menu_item_srl`', ${'menu_item_srl29_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl30_argument'})
,new InsertExpression('`menu_srl`', ${'menu_srl31_argument'})
,new InsertExpression('`name`', ${'name32_argument'})
,new InsertExpression('`desc`', ${'desc33_argument'})
,new InsertExpression('`url`', ${'url34_argument'})
,new InsertExpression('`is_shortcut`', ${'is_shortcut35_argument'})
,new InsertExpression('`open_window`', ${'open_window36_argument'})
,new InsertExpression('`expand`', ${'expand37_argument'})
,new InsertExpression('`normal_btn`', ${'normal_btn38_argument'})
,new InsertExpression('`hover_btn`', ${'hover_btn39_argument'})
,new InsertExpression('`active_btn`', ${'active_btn40_argument'})
,new InsertExpression('`group_srls`', ${'group_srls41_argument'})
,new InsertExpression('`listorder`', ${'listorder42_argument'})
,new InsertExpression('`regdate`', ${'regdate43_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>