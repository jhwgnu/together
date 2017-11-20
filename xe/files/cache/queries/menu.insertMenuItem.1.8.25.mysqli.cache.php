<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMenuItem");
$query->setAction("insert");
$query->setPriority("");

${'menu_item_srl134_argument'} = new Argument('menu_item_srl', $args->{'menu_item_srl'});
${'menu_item_srl134_argument'}->checkFilter('number');
${'menu_item_srl134_argument'}->checkNotNull();
if(!${'menu_item_srl134_argument'}->isValid()) return ${'menu_item_srl134_argument'}->getErrorMessage();
if(${'menu_item_srl134_argument'} !== null) ${'menu_item_srl134_argument'}->setColumnType('number');

${'parent_srl135_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl135_argument'}->checkFilter('number');
${'parent_srl135_argument'}->ensureDefaultValue('0');
if(!${'parent_srl135_argument'}->isValid()) return ${'parent_srl135_argument'}->getErrorMessage();
if(${'parent_srl135_argument'} !== null) ${'parent_srl135_argument'}->setColumnType('number');

${'menu_srl136_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl136_argument'}->checkFilter('number');
${'menu_srl136_argument'}->checkNotNull();
if(!${'menu_srl136_argument'}->isValid()) return ${'menu_srl136_argument'}->getErrorMessage();
if(${'menu_srl136_argument'} !== null) ${'menu_srl136_argument'}->setColumnType('number');

${'name137_argument'} = new Argument('name', $args->{'name'});
${'name137_argument'}->checkNotNull();
if(!${'name137_argument'}->isValid()) return ${'name137_argument'}->getErrorMessage();
if(${'name137_argument'} !== null) ${'name137_argument'}->setColumnType('text');
if(isset($args->desc)) {
${'desc138_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc138_argument'}->isValid()) return ${'desc138_argument'}->getErrorMessage();
} else
${'desc138_argument'} = NULL;if(${'desc138_argument'} !== null) ${'desc138_argument'}->setColumnType('varchar');
if(isset($args->url)) {
${'url139_argument'} = new Argument('url', $args->{'url'});
if(!${'url139_argument'}->isValid()) return ${'url139_argument'}->getErrorMessage();
} else
${'url139_argument'} = NULL;if(${'url139_argument'} !== null) ${'url139_argument'}->setColumnType('varchar');

${'is_shortcut140_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
${'is_shortcut140_argument'}->ensureDefaultValue('N');
${'is_shortcut140_argument'}->checkNotNull();
if(!${'is_shortcut140_argument'}->isValid()) return ${'is_shortcut140_argument'}->getErrorMessage();
if(${'is_shortcut140_argument'} !== null) ${'is_shortcut140_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window141_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window141_argument'}->isValid()) return ${'open_window141_argument'}->getErrorMessage();
} else
${'open_window141_argument'} = NULL;if(${'open_window141_argument'} !== null) ${'open_window141_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand142_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand142_argument'}->isValid()) return ${'expand142_argument'}->getErrorMessage();
} else
${'expand142_argument'} = NULL;if(${'expand142_argument'} !== null) ${'expand142_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn143_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn143_argument'}->isValid()) return ${'normal_btn143_argument'}->getErrorMessage();
} else
${'normal_btn143_argument'} = NULL;if(${'normal_btn143_argument'} !== null) ${'normal_btn143_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn144_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn144_argument'}->isValid()) return ${'hover_btn144_argument'}->getErrorMessage();
} else
${'hover_btn144_argument'} = NULL;if(${'hover_btn144_argument'} !== null) ${'hover_btn144_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn145_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn145_argument'}->isValid()) return ${'active_btn145_argument'}->getErrorMessage();
} else
${'active_btn145_argument'} = NULL;if(${'active_btn145_argument'} !== null) ${'active_btn145_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls146_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls146_argument'}->isValid()) return ${'group_srls146_argument'}->getErrorMessage();
} else
${'group_srls146_argument'} = NULL;if(${'group_srls146_argument'} !== null) ${'group_srls146_argument'}->setColumnType('text');

${'listorder147_argument'} = new Argument('listorder', $args->{'listorder'});
${'listorder147_argument'}->checkNotNull();
if(!${'listorder147_argument'}->isValid()) return ${'listorder147_argument'}->getErrorMessage();
if(${'listorder147_argument'} !== null) ${'listorder147_argument'}->setColumnType('number');

${'regdate148_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate148_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate148_argument'}->isValid()) return ${'regdate148_argument'}->getErrorMessage();
if(${'regdate148_argument'} !== null) ${'regdate148_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`menu_item_srl`', ${'menu_item_srl134_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl135_argument'})
,new InsertExpression('`menu_srl`', ${'menu_srl136_argument'})
,new InsertExpression('`name`', ${'name137_argument'})
,new InsertExpression('`desc`', ${'desc138_argument'})
,new InsertExpression('`url`', ${'url139_argument'})
,new InsertExpression('`is_shortcut`', ${'is_shortcut140_argument'})
,new InsertExpression('`open_window`', ${'open_window141_argument'})
,new InsertExpression('`expand`', ${'expand142_argument'})
,new InsertExpression('`normal_btn`', ${'normal_btn143_argument'})
,new InsertExpression('`hover_btn`', ${'hover_btn144_argument'})
,new InsertExpression('`active_btn`', ${'active_btn145_argument'})
,new InsertExpression('`group_srls`', ${'group_srls146_argument'})
,new InsertExpression('`listorder`', ${'listorder147_argument'})
,new InsertExpression('`regdate`', ${'regdate148_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>