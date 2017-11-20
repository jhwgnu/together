<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertCategory");
$query->setAction("insert");
$query->setPriority("");

${'category_srl1_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl1_argument'}->checkFilter('number');
${'category_srl1_argument'}->checkNotNull();
if(!${'category_srl1_argument'}->isValid()) return ${'category_srl1_argument'}->getErrorMessage();
if(${'category_srl1_argument'} !== null) ${'category_srl1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->ensureDefaultValue('0');
${'module_srl2_argument'}->checkNotNull();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

${'title3_argument'} = new Argument('title', $args->{'title'});
${'title3_argument'}->checkNotNull();
if(!${'title3_argument'}->isValid()) return ${'title3_argument'}->getErrorMessage();
if(${'title3_argument'} !== null) ${'title3_argument'}->setColumnType('varchar');
if(isset($args->description)) {
${'description4_argument'} = new Argument('description', $args->{'description'});
if(!${'description4_argument'}->isValid()) return ${'description4_argument'}->getErrorMessage();
} else
${'description4_argument'} = NULL;if(${'description4_argument'} !== null) ${'description4_argument'}->setColumnType('varchar');

${'document_count5_argument'} = new Argument('document_count', $args->{'document_count'});
${'document_count5_argument'}->ensureDefaultValue('0');
if(!${'document_count5_argument'}->isValid()) return ${'document_count5_argument'}->getErrorMessage();
if(${'document_count5_argument'} !== null) ${'document_count5_argument'}->setColumnType('number');

${'regdate6_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate6_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate6_argument'}->isValid()) return ${'regdate6_argument'}->getErrorMessage();
if(${'regdate6_argument'} !== null) ${'regdate6_argument'}->setColumnType('date');
if(isset($args->expand)) {
${'expand7_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand7_argument'}->isValid()) return ${'expand7_argument'}->getErrorMessage();
} else
${'expand7_argument'} = NULL;if(${'expand7_argument'} !== null) ${'expand7_argument'}->setColumnType('char');

${'parent_srl8_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl8_argument'}->checkFilter('number');
${'parent_srl8_argument'}->ensureDefaultValue('0');
if(!${'parent_srl8_argument'}->isValid()) return ${'parent_srl8_argument'}->getErrorMessage();
if(${'parent_srl8_argument'} !== null) ${'parent_srl8_argument'}->setColumnType('number');
if(isset($args->group_srls)) {
${'group_srls9_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls9_argument'}->isValid()) return ${'group_srls9_argument'}->getErrorMessage();
} else
${'group_srls9_argument'} = NULL;if(${'group_srls9_argument'} !== null) ${'group_srls9_argument'}->setColumnType('text');

${'last_update10_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update10_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update10_argument'}->isValid()) return ${'last_update10_argument'}->getErrorMessage();
if(${'last_update10_argument'} !== null) ${'last_update10_argument'}->setColumnType('date');

${'list_order11_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order11_argument'}->ensureDefaultValue('0');
if(!${'list_order11_argument'}->isValid()) return ${'list_order11_argument'}->getErrorMessage();
if(${'list_order11_argument'} !== null) ${'list_order11_argument'}->setColumnType('number');
if(isset($args->color)) {
${'color12_argument'} = new Argument('color', $args->{'color'});
if(!${'color12_argument'}->isValid()) return ${'color12_argument'}->getErrorMessage();
} else
${'color12_argument'} = NULL;if(${'color12_argument'} !== null) ${'color12_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`category_srl`', ${'category_srl1_argument'})
,new InsertExpression('`module_srl`', ${'module_srl2_argument'})
,new InsertExpression('`title`', ${'title3_argument'})
,new InsertExpression('`description`', ${'description4_argument'})
,new InsertExpression('`document_count`', ${'document_count5_argument'})
,new InsertExpression('`regdate`', ${'regdate6_argument'})
,new InsertExpression('`expand`', ${'expand7_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl8_argument'})
,new InsertExpression('`group_srls`', ${'group_srls9_argument'})
,new InsertExpression('`last_update`', ${'last_update10_argument'})
,new InsertExpression('`list_order`', ${'list_order11_argument'})
,new InsertExpression('`color`', ${'color12_argument'})
));
$query->setTables(array(
new Table('`xe_document_categories`', '`document_categories`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>