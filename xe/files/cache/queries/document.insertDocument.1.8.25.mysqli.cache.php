<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertDocument");
$query->setAction("insert");
$query->setPriority("LOW");

${'document_srl207_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl207_argument'}->checkFilter('number');
${'document_srl207_argument'}->checkNotNull();
if(!${'document_srl207_argument'}->isValid()) return ${'document_srl207_argument'}->getErrorMessage();
if(${'document_srl207_argument'} !== null) ${'document_srl207_argument'}->setColumnType('number');

${'module_srl208_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl208_argument'}->checkFilter('number');
${'module_srl208_argument'}->ensureDefaultValue('0');
if(!${'module_srl208_argument'}->isValid()) return ${'module_srl208_argument'}->getErrorMessage();
if(${'module_srl208_argument'} !== null) ${'module_srl208_argument'}->setColumnType('number');

${'category_srl209_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl209_argument'}->checkFilter('number');
${'category_srl209_argument'}->ensureDefaultValue('0');
if(!${'category_srl209_argument'}->isValid()) return ${'category_srl209_argument'}->getErrorMessage();
if(${'category_srl209_argument'} !== null) ${'category_srl209_argument'}->setColumnType('number');

${'lang_code210_argument'} = new Argument('lang_code', $args->{'lang_code'});
${'lang_code210_argument'}->ensureDefaultValue('');
if(!${'lang_code210_argument'}->isValid()) return ${'lang_code210_argument'}->getErrorMessage();
if(${'lang_code210_argument'} !== null) ${'lang_code210_argument'}->setColumnType('varchar');

${'is_notice211_argument'} = new Argument('is_notice', $args->{'is_notice'});
${'is_notice211_argument'}->ensureDefaultValue('N');
${'is_notice211_argument'}->checkNotNull();
if(!${'is_notice211_argument'}->isValid()) return ${'is_notice211_argument'}->getErrorMessage();
if(${'is_notice211_argument'} !== null) ${'is_notice211_argument'}->setColumnType('char');

${'title212_argument'} = new Argument('title', $args->{'title'});
${'title212_argument'}->checkNotNull();
if(!${'title212_argument'}->isValid()) return ${'title212_argument'}->getErrorMessage();
if(${'title212_argument'} !== null) ${'title212_argument'}->setColumnType('varchar');

${'title_bold213_argument'} = new Argument('title_bold', $args->{'title_bold'});
${'title_bold213_argument'}->ensureDefaultValue('N');
if(!${'title_bold213_argument'}->isValid()) return ${'title_bold213_argument'}->getErrorMessage();
if(${'title_bold213_argument'} !== null) ${'title_bold213_argument'}->setColumnType('char');

${'title_color214_argument'} = new Argument('title_color', $args->{'title_color'});
${'title_color214_argument'}->ensureDefaultValue('N');
if(!${'title_color214_argument'}->isValid()) return ${'title_color214_argument'}->getErrorMessage();
if(${'title_color214_argument'} !== null) ${'title_color214_argument'}->setColumnType('varchar');

${'content215_argument'} = new Argument('content', $args->{'content'});
${'content215_argument'}->checkNotNull();
if(!${'content215_argument'}->isValid()) return ${'content215_argument'}->getErrorMessage();
if(${'content215_argument'} !== null) ${'content215_argument'}->setColumnType('bigtext');

${'readed_count216_argument'} = new Argument('readed_count', $args->{'readed_count'});
${'readed_count216_argument'}->ensureDefaultValue('0');
if(!${'readed_count216_argument'}->isValid()) return ${'readed_count216_argument'}->getErrorMessage();
if(${'readed_count216_argument'} !== null) ${'readed_count216_argument'}->setColumnType('number');

${'blamed_count217_argument'} = new Argument('blamed_count', $args->{'blamed_count'});
${'blamed_count217_argument'}->ensureDefaultValue('0');
if(!${'blamed_count217_argument'}->isValid()) return ${'blamed_count217_argument'}->getErrorMessage();
if(${'blamed_count217_argument'} !== null) ${'blamed_count217_argument'}->setColumnType('number');

${'voted_count218_argument'} = new Argument('voted_count', $args->{'voted_count'});
${'voted_count218_argument'}->ensureDefaultValue('0');
if(!${'voted_count218_argument'}->isValid()) return ${'voted_count218_argument'}->getErrorMessage();
if(${'voted_count218_argument'} !== null) ${'voted_count218_argument'}->setColumnType('number');

${'comment_count219_argument'} = new Argument('comment_count', $args->{'comment_count'});
${'comment_count219_argument'}->ensureDefaultValue('0');
if(!${'comment_count219_argument'}->isValid()) return ${'comment_count219_argument'}->getErrorMessage();
if(${'comment_count219_argument'} !== null) ${'comment_count219_argument'}->setColumnType('number');

${'trackback_count220_argument'} = new Argument('trackback_count', $args->{'trackback_count'});
${'trackback_count220_argument'}->ensureDefaultValue('0');
if(!${'trackback_count220_argument'}->isValid()) return ${'trackback_count220_argument'}->getErrorMessage();
if(${'trackback_count220_argument'} !== null) ${'trackback_count220_argument'}->setColumnType('number');

${'uploaded_count221_argument'} = new Argument('uploaded_count', $args->{'uploaded_count'});
${'uploaded_count221_argument'}->ensureDefaultValue('0');
if(!${'uploaded_count221_argument'}->isValid()) return ${'uploaded_count221_argument'}->getErrorMessage();
if(${'uploaded_count221_argument'} !== null) ${'uploaded_count221_argument'}->setColumnType('number');
if(isset($args->password)) {
${'password222_argument'} = new Argument('password', $args->{'password'});
if(!${'password222_argument'}->isValid()) return ${'password222_argument'}->getErrorMessage();
} else
${'password222_argument'} = NULL;if(${'password222_argument'} !== null) ${'password222_argument'}->setColumnType('varchar');

${'nick_name223_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name223_argument'}->checkNotNull();
if(!${'nick_name223_argument'}->isValid()) return ${'nick_name223_argument'}->getErrorMessage();
if(${'nick_name223_argument'} !== null) ${'nick_name223_argument'}->setColumnType('varchar');

${'member_srl224_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl224_argument'}->checkFilter('number');
${'member_srl224_argument'}->ensureDefaultValue('0');
if(!${'member_srl224_argument'}->isValid()) return ${'member_srl224_argument'}->getErrorMessage();
if(${'member_srl224_argument'} !== null) ${'member_srl224_argument'}->setColumnType('number');

${'user_id225_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id225_argument'}->ensureDefaultValue('');
if(!${'user_id225_argument'}->isValid()) return ${'user_id225_argument'}->getErrorMessage();
if(${'user_id225_argument'} !== null) ${'user_id225_argument'}->setColumnType('varchar');

${'user_name226_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name226_argument'}->ensureDefaultValue('');
if(!${'user_name226_argument'}->isValid()) return ${'user_name226_argument'}->getErrorMessage();
if(${'user_name226_argument'} !== null) ${'user_name226_argument'}->setColumnType('varchar');
if(isset($args->email_address)) {
${'email_address227_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address227_argument'}->checkFilter('email');
if(!${'email_address227_argument'}->isValid()) return ${'email_address227_argument'}->getErrorMessage();
} else
${'email_address227_argument'} = NULL;if(${'email_address227_argument'} !== null) ${'email_address227_argument'}->setColumnType('varchar');

${'homepage228_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage228_argument'}->checkFilter('homepage');
${'homepage228_argument'}->ensureDefaultValue('');
if(!${'homepage228_argument'}->isValid()) return ${'homepage228_argument'}->getErrorMessage();
if(${'homepage228_argument'} !== null) ${'homepage228_argument'}->setColumnType('varchar');
if(isset($args->tags)) {
${'tags229_argument'} = new Argument('tags', $args->{'tags'});
if(!${'tags229_argument'}->isValid()) return ${'tags229_argument'}->getErrorMessage();
} else
${'tags229_argument'} = NULL;if(${'tags229_argument'} !== null) ${'tags229_argument'}->setColumnType('text');
if(isset($args->extra_vars)) {
${'extra_vars230_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars230_argument'}->isValid()) return ${'extra_vars230_argument'}->getErrorMessage();
} else
${'extra_vars230_argument'} = NULL;if(${'extra_vars230_argument'} !== null) ${'extra_vars230_argument'}->setColumnType('text');

${'regdate231_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate231_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate231_argument'}->isValid()) return ${'regdate231_argument'}->getErrorMessage();
if(${'regdate231_argument'} !== null) ${'regdate231_argument'}->setColumnType('date');

${'last_update232_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update232_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update232_argument'}->isValid()) return ${'last_update232_argument'}->getErrorMessage();
if(${'last_update232_argument'} !== null) ${'last_update232_argument'}->setColumnType('date');
if(isset($args->last_updater)) {
${'last_updater233_argument'} = new Argument('last_updater', $args->{'last_updater'});
if(!${'last_updater233_argument'}->isValid()) return ${'last_updater233_argument'}->getErrorMessage();
} else
${'last_updater233_argument'} = NULL;if(${'last_updater233_argument'} !== null) ${'last_updater233_argument'}->setColumnType('varchar');

${'ipaddress234_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress234_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress234_argument'}->isValid()) return ${'ipaddress234_argument'}->getErrorMessage();
if(${'ipaddress234_argument'} !== null) ${'ipaddress234_argument'}->setColumnType('varchar');

${'list_order235_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order235_argument'}->ensureDefaultValue('0');
if(!${'list_order235_argument'}->isValid()) return ${'list_order235_argument'}->getErrorMessage();
if(${'list_order235_argument'} !== null) ${'list_order235_argument'}->setColumnType('number');

${'update_order236_argument'} = new Argument('update_order', $args->{'update_order'});
${'update_order236_argument'}->ensureDefaultValue('0');
if(!${'update_order236_argument'}->isValid()) return ${'update_order236_argument'}->getErrorMessage();
if(${'update_order236_argument'} !== null) ${'update_order236_argument'}->setColumnType('number');

${'allow_trackback237_argument'} = new Argument('allow_trackback', $args->{'allow_trackback'});
${'allow_trackback237_argument'}->ensureDefaultValue('Y');
if(!${'allow_trackback237_argument'}->isValid()) return ${'allow_trackback237_argument'}->getErrorMessage();
if(${'allow_trackback237_argument'} !== null) ${'allow_trackback237_argument'}->setColumnType('char');

${'notify_message238_argument'} = new Argument('notify_message', $args->{'notify_message'});
${'notify_message238_argument'}->ensureDefaultValue('N');
if(!${'notify_message238_argument'}->isValid()) return ${'notify_message238_argument'}->getErrorMessage();
if(${'notify_message238_argument'} !== null) ${'notify_message238_argument'}->setColumnType('char');

${'status239_argument'} = new Argument('status', $args->{'status'});
${'status239_argument'}->ensureDefaultValue('PUBLIC');
if(!${'status239_argument'}->isValid()) return ${'status239_argument'}->getErrorMessage();
if(${'status239_argument'} !== null) ${'status239_argument'}->setColumnType('varchar');

${'commentStatus240_argument'} = new Argument('commentStatus', $args->{'commentStatus'});
${'commentStatus240_argument'}->ensureDefaultValue('ALLOW');
if(!${'commentStatus240_argument'}->isValid()) return ${'commentStatus240_argument'}->getErrorMessage();
if(${'commentStatus240_argument'} !== null) ${'commentStatus240_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`document_srl`', ${'document_srl207_argument'})
,new InsertExpression('`module_srl`', ${'module_srl208_argument'})
,new InsertExpression('`category_srl`', ${'category_srl209_argument'})
,new InsertExpression('`lang_code`', ${'lang_code210_argument'})
,new InsertExpression('`is_notice`', ${'is_notice211_argument'})
,new InsertExpression('`title`', ${'title212_argument'})
,new InsertExpression('`title_bold`', ${'title_bold213_argument'})
,new InsertExpression('`title_color`', ${'title_color214_argument'})
,new InsertExpression('`content`', ${'content215_argument'})
,new InsertExpression('`readed_count`', ${'readed_count216_argument'})
,new InsertExpression('`blamed_count`', ${'blamed_count217_argument'})
,new InsertExpression('`voted_count`', ${'voted_count218_argument'})
,new InsertExpression('`comment_count`', ${'comment_count219_argument'})
,new InsertExpression('`trackback_count`', ${'trackback_count220_argument'})
,new InsertExpression('`uploaded_count`', ${'uploaded_count221_argument'})
,new InsertExpression('`password`', ${'password222_argument'})
,new InsertExpression('`nick_name`', ${'nick_name223_argument'})
,new InsertExpression('`member_srl`', ${'member_srl224_argument'})
,new InsertExpression('`user_id`', ${'user_id225_argument'})
,new InsertExpression('`user_name`', ${'user_name226_argument'})
,new InsertExpression('`email_address`', ${'email_address227_argument'})
,new InsertExpression('`homepage`', ${'homepage228_argument'})
,new InsertExpression('`tags`', ${'tags229_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars230_argument'})
,new InsertExpression('`regdate`', ${'regdate231_argument'})
,new InsertExpression('`last_update`', ${'last_update232_argument'})
,new InsertExpression('`last_updater`', ${'last_updater233_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress234_argument'})
,new InsertExpression('`list_order`', ${'list_order235_argument'})
,new InsertExpression('`update_order`', ${'update_order236_argument'})
,new InsertExpression('`allow_trackback`', ${'allow_trackback237_argument'})
,new InsertExpression('`notify_message`', ${'notify_message238_argument'})
,new InsertExpression('`status`', ${'status239_argument'})
,new InsertExpression('`comment_status`', ${'commentStatus240_argument'})
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>