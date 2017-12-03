<?php if(!defined("__XE__"))exit;?><!-- display list -->
    <form action="./" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
    
    <div class="boardSubMenu">
        <?php if($__Context->module_info->use_category == "Y"){ ?>
        <div class="fl">
            <?php if($__Context->grant->manager){ ?><input type="checkbox" onclick="XE.checkboxToggleAll({ doClick:true }); return false;" /><?php } ?>
        
                <select name="category" id="board_category">
                    <option value=""><?php echo $__Context->lang->category ?></option>
                    <?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?>
                    <option value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->category==$__Context->val->category_srl){ ?>selected="selected"<?php } ?>><?php echo str_repeat("&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> <?php if($__Context->val->document_count){ ?>(<?php echo $__Context->val->document_count ?>)<?php } ?></option>
                    <?php } ?>
                </select>
                <input type="button" name="go_button" id="go_button" value="GO" onclick="doChangeCategory()" />
        </div>
        <?php } ?>
        <div class="fr">
			<a href="<?php echo getUrl('sort_index','readed_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->readed_count;
if($__Context->sort_index=='readed_count'){ ?> <img src="/modules/board/skins/xe_2007/images/common/<?php echo $__Context->order_icon ?>" alt="" width="5" height="3" class="sort" /><?php } ?></a>
			<a href="<?php echo getUrl('sort_index','voted_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->voted_count;
if($__Context->sort_index=='voted_count'){ ?> <img src="/modules/board/skins/xe_2007/images/common/<?php echo $__Context->order_icon ?>" alt="" width="5" height="3" class="sort" /><?php } ?></a>
			<a href="<?php echo getUrl('sort_index','blamed_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->blamed_count;
if($__Context->sort_index=='blamed_count'){ ?> <img src="/modules/board/skins/xe_2007/images/common/<?php echo $__Context->order_icon ?>" alt="" width="5" height="3" class="sort" /><?php } ?></a>
        	<a href="<?php echo getUrl('sort_index','regdate','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->date;
if($__Context->sort_index=='regdate'){ ?> <img src="/modules/board/skins/xe_2007/images/common/<?php echo $__Context->order_icon ?>" alt="" width="5" height="3" class="sort" /><?php } ?></a>
        	<a href="<?php echo getUrl('sort_index','last_update','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->last_update;
if($__Context->sort_index=='last_update'){ ?> <img src="/modules/board/skins/xe_2007/images/common/<?php echo $__Context->order_icon ?>" alt="" width="5" height="3" class="sort" /><?php } ?></a>
        </div>
		<div class="clear"></div>
    </div>
    <?php  $__Context->_col_count = 1;  ?>
        <?php if(!$__Context->document_list && !$__Context->notice_list){ ?>
            <table cellspacing="0" summary="" class="boardList">
            <tr class="bg0 tCenter">
                <td class="title no_line">
                    <?php echo $__Context->lang->no_documents ?>
                </td>
            </tr>
            </table>
        <?php }else{ ?>
            
            <?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no => $__Context->document){ ?>
                <table cellspacing="0" summary="" class="boardList boardListNoTopBorder">
                <?php if($__Context->grant->manager){ ?><col width="30" /><?php  $__Context->_col_count++;
} ?>
				<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){ ?>
                <?php if($__Context->val->type == 'no'){ ?><col width="80" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'title'){ ?><col /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'nick_name'){ ?><col width="120" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'user_id'){ ?><col width="120" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'user_name'){ ?><col width="120" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'readed_count'){ ?><col width="70" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'voted_count'){ ?><col width="70" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'blamed_count'){ ?><col width="70" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'regdate'){ ?><col width="90" /><?php  $__Context->_col_count++ ?>
                <?php }elseif($__Context->val->type == 'last_update'){ ?><col width="90" /><?php  $__Context->_col_count++ ?>
				<?php } ?>
				<?php } ?>
                <tbody>
                    <tr class="notice">
                        <?php if($__Context->grant->manager){ ?><td class="checkbox"><input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" onclick="doAddDocumentCart(this)" <?php if($__Context->document->isCarted()){ ?>checked="checked"<?php } ?> /></td><?php } ?>
						<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key=>$__Context->val){ ?>
                        <?php if($__Context->val->type == 'no'){ ?><td class="notice"><?php echo $__Context->lang->notice ?></td>
                		<?php }elseif($__Context->val->type == 'title'){ ?>
						<td class="title">
                            <?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?>
                            <strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong>
                            <?php } ?>
                            <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><?php echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></a>
                            
                            <?php if($__Context->document->getCommentCount()){ ?>
                                <span class="replyAndTrackback" title="Replies"><img src="/modules/board/skins/xe_2007/images/<?php echo $__Context->module_info->colorset ?>/iconReply.gif" alt="" width="12" height="12" class="icon" /> <strong><?php echo $__Context->document->getCommentCount() ?></strong></span>
                            <?php } ?>
                            <?php if($__Context->document->getTrackbackCount()){ ?>
                                <span class="replyAndTrackback" title="Trackbacks"><img src="/modules/board/skins/xe_2007/images/<?php echo $__Context->module_info->colorset ?>/iconTrackback.gif" alt="" width="12" height="13" class="trackback icon" /> <strong><?php echo $__Context->document->getTrackbackCount() ?></strong></span>
                            <?php } ?>
                            <?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new) ?>
                        </td>
                        <?php }elseif($__Context->val->type == 'nick_name'){ ?><td class="author"><div class="member_<?php echo $__Context->document->get('member_srl') ?>"><?php echo $__Context->document->getNickName() ?></div></td>
                        <?php }elseif($__Context->val->type == 'user_id'){ ?><td class="author"><div class="member_<?php echo $__Context->document->get('member_srl') ?>"><?php echo $__Context->document->getUserID() ?></div></td>
                        <?php }elseif($__Context->val->type == 'user_name'){ ?><td class="author"><div class="member_<?php echo $__Context->document->get('member_srl') ?>"><?php echo $__Context->document->getUserName() ?></div></td>
                        <?php }elseif($__Context->val->type == 'readed_count'){ ?><td class="reading"><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'&nbsp;' ?></td>
                        <?php }elseif($__Context->val->type == 'voted_count'){ ?><td class="recommend"><?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'&nbsp;' ?></td>
                        <?php }elseif($__Context->val->type == 'blamed_count'){ ?><td class="recommend"><?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'&nbsp;' ?></td>
                        <?php }elseif($__Context->val->type == 'regdate'){ ?><td class="date"><?php echo $__Context->document->getRegdate('Y-m-d') ?></td>
                        <?php }elseif($__Context->val->type == 'last_update'){ ?><td class="date"><?php echo zdate($__Context->document->get('last_update'),'Y-m-d H:i') ?></td>
						<?php } ?>
						<?php } ?>
                    </tr>
                </tbody>
                </table>
            <?php } ?>
            
            <?php  $__Context->height = $__Context->module_info->thumbnail_height + 50;  ?>
            <?php if($__Context->module_info->use_category=='Y'){;
$__Context->height += 20;
} ?>
            <?php if($__Context->list_config['nick_name'] || $__Context->list_config['user_id'] || $__Context->list_config['user_name'] || $__Context->list_config['regdate']){;
$__Context->height += 25;
} ?>
            <?php if($__Context->list_config['readed_count'] || $__Context->list_config['voted_count'] || $__Context->list_config['blamed_count']){;
$__Context->height += 25;
} ?>
            <div class="thumbnailBox">
                <?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->document){ ?>
                <?php if(!$__Context->document->isNotice()){ ?>
                <div class="cell" style="width:<?php echo $__Context->module_info->thumbnail_width+30 ?>px;height:<?php echo $__Context->height ?>px;">
                    <?php if($__Context->document->thumbnailExists($__Context->module_info->thumbnail_width, $__Context->module_info->thumbnail_height, $__Context->module_info->thumbnail_type)){ ?>
                        <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>"><img src="<?php echo $__Context->document->getThumbnail($__Context->module_info->thumbnail_width, $__Context->module_info->thumbnail_height, $__Context->module_info->thumbnail_type) ?>" border="0" alt="" class="thumb"/></a>
                    <?php }else{ ?>
                        <img src="/modules/board/skins/xe_2007/images/common/blank.gif" border="0" alt="" class="thumb" width="<?php echo $__Context->module_info->thumbnail_width ?>" height="<?php echo $__Context->module_info->thumbnail_height ?>" />
                    <?php } ?>
                    <div class="title">
                        <?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?>
                        <strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong><br />
                        <?php } ?>
                        <?php if($__Context->grant->manager){ ?>
                            <input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" onclick="doAddDocumentCart(this)" <?php if($__Context->document->isCarted()){ ?>checked="checked"<?php } ?> /> 
                        <?php } ?>
                        <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><?php echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></a>
                        <?php if($__Context->document->getCommentCount()){ ?>
                            <span class="replyAndTrackback" title="Replies">(<strong><?php echo $__Context->document->getCommentCount() ?></strong>)</span>
                        <?php } ?>
                        <?php if($__Context->document->getTrackbackCount()){ ?>
                            <span class="replyAndTrackback" title="Trackbacks">[<strong><?php echo $__Context->document->getTrackbackCount() ?></strong>]</span>
                        <?php } ?>
                        <div class="nameAndDate">
                            <?php if($__Context->list_config['nick_name']){ ?><div class="author"><div class="member_<?php echo $__Context->document->get('member_srl') ?>"><?php echo $__Context->document->getNickName() ?></div></div><?php } ?>
                            <?php if($__Context->list_config['user_id']){ ?><div class="author"><div class="member_<?php echo $__Context->document->get('member_srl') ?>"><?php echo $__Context->document->getUserID() ?></div></div><?php } ?>
                            <?php if($__Context->list_config['user_name']){ ?><div class="author"><div class="member_<?php echo $__Context->document->get('member_srl') ?>"><?php echo $__Context->document->getUserName() ?></div></div><?php } ?>
                            <?php if($__Context->list_config['regdate']){ ?><div class="date"><?php echo $__Context->document->getRegdate('Y.m.d') ?></div><?php } ?>
                        </div>
                    </div>
                    <div class="readAndRecommend">
                        <?php if($__Context->list_config['readed_count']){;
echo $__Context->lang->readed_count ?> <span class="num"><?php echo $__Context->document->get('readed_count') ?></span><?php } ?>
                        <?php if($__Context->document->get('voted_count')!=0 && $__Context->list_config['voted_count']){ ?>
                            <?php if($__Context->list_config['readed_count']){ ?><br /><?php } ?>
                            <?php echo $__Context->lang->voted_count ?> <strong class="num"><?php echo $__Context->document->get('voted_count') ?></strong>
                        <?php } ?>
                        <?php if($__Context->document->get('blamed_count')!=0 && $__Context->list_config['blamed_count']){ ?>
                            <?php if($__Context->list_config['readed_count'] || $__Context->list_config['voted_count']){ ?><br /><?php } ?>
                            <?php echo $__Context->lang->blamed_count ?> <strong class="num"><?php echo $__Context->document->get('blamed_count') ?></strong>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                
            </div>
        <?php } ?>
    </form>
