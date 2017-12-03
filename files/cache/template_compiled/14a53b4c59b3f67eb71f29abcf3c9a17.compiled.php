<?php if(!defined("__XE__"))exit;?><form action="./" method="get" class="boardListForm"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
    <fieldset>
        <legend>List of Articles</legend>
            <div class="thumbHeader">
                <div class="left">
                    <?php if($__Context->grant->manager){ ?><span><input type="checkbox" onclick="XE.checkboxToggleAll({ doClick:true }); return false;" /></span><?php  $__Context->no_line_class="";
} ?>
                    <?php if($__Context->module_info->use_category == "Y"){ ?>
                    <span class="jumpTo">
                        <select name="category" id="board_category">
                            <option value=""><?php echo $__Context->lang->category ?></option>
                            <?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?>
                            <option value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->category==$__Context->val->category_srl){ ?>selected="selected"<?php } ?>><?php echo str_repeat("&nbsp;&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> <?php if($__Context->val->document_count){ ?>(<?php echo $__Context->val->document_count ?>)<?php } ?></option>
                            <?php } ?>
                        </select>
                        <button type="button" name="go_button" id="go_button" onclick="doChangeCategory(); return false;">Go</button>
                    </span>
                    <?php } ?>
                </div>
                
                <div class="right">
                    <?php if($__Context->module_info->display_readed_count!='N'){ ?><span><a href="<?php echo getUrl('sort_index','readed_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->readed_count;
if($__Context->sort_index=='readed_count'){ ?><img src="/modules/board/skins/xe_2008/images/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></span><?php } ?>
                    <?php if($__Context->module_info->display_voted_count!='N'){ ?><span><a href="<?php echo getUrl('sort_index','voted_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->voted_count;
if($__Context->sort_index=='voted_count'){ ?><img src="/modules/board/skins/xe_2008/images/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></span><?php } ?>
                    <?php if($__Context->module_info->display_blamed_count!='N'){ ?><span><a href="<?php echo getUrl('sort_index','blamed_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->blamed_count;
if($__Context->sort_index=='blamed_count'){ ?><img src="/modules/board/skins/xe_2008/images/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></span><?php } ?>
                    <?php if($__Context->module_info->display_regdate != 'N'){ ?><span><a href="<?php echo getUrl('sort_index','regdate','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->date;
if($__Context->sort_index=='regdate'){ ?><img src="/modules/board/skins/xe_2008/images/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></span><?php } ?>
                    <?php if($__Context->module_info->display_last_update=='Y'){ ?><span><a href="<?php echo getUrl('sort_index','last_update','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->last_update;
if($__Context->sort_index=='last_update'){ ?><img src="/modules/board/skins/xe_2008/images/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></span><?php } ?>
                </div>
            </div>
          <?php if(!$__Context->document_list && !$__Context->notice_list){ ?>
              <table cellspacing="0" border="1" summary="List of Articles" class="boardList">
              <tr>
                  <td colspan="<?php echo $__Context->_col_count ?>">
                      <?php echo $__Context->lang->no_documents ?>
                  </td>
              </tr>
              </table>
          <?php }else{ ?>
            <?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no => $__Context->document){ ?>
            <table cellspacing="0" summary="" class="boardList">
            <tbody>
                <tr class="notice">
                <?php if($__Context->module_info->display_number!='N'){ ?><td class="notice"><?php echo $__Context->lang->notice ?></td><?php } ?>
                <?php if($__Context->grant->manager){ ?><td><input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" onclick="doAddDocumentCart(this)" <?php if($__Context->document->isCarted()){ ?>checked="checked"<?php } ?> /></td><?php } ?>
                <td class="title">
                    <?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?>
                    <strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong>
                    <?php } ?>
                    <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><?php echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></a>
                    <?php if($__Context->document->getCommentCount()){ ?>
                    <span class="replyAndTrackback" title="Replies"><img src="/modules/board/skins/xe_2008/images/<?php echo $__Context->module_info->colorset ?>/iconReply.gif" alt="" width="12" height="12" class="icon" /> <strong><?php echo $__Context->document->getCommentCount() ?></strong></span>
                    <?php } ?>
                    <?php if($__Context->document->getTrackbackCount()){ ?>
                    <span class="replyAndTrackback" title="Trackbacks"><img src="/modules/board/skins/xe_2008/images/<?php echo $__Context->module_info->colorset ?>/iconTrackback.gif" alt="" width="12" height="13" class="trackback icon" /> <strong><?php echo $__Context->document->getTrackbackCount() ?></strong></span>
                    <?php } ?>
                    <?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new) ?>
                </td>
                <?php if($__Context->module_info->display_author!='N'){ ?><td class="author"><div class="member_<?php echo $__Context->document->get('member_srl') ?>"><?php echo $__Context->document->getNickName() ?></div></td><?php } ?>
                <?php if($__Context->module_info->display_readed_count!='N'){ ?><td class="reading"><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'&nbsp;' ?></td><?php } ?>
                <?php if($__Context->module_info->display_voted_count!='N'){ ?><td class="recommend"><?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'&nbsp;' ?></td><?php } ?>
                <?php if($__Context->module_info->display_blamed_count!='N'){ ?><td class="recommend"><?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'&nbsp;' ?></td><?php } ?>
                <?php if($__Context->module_info->display_regdate!='N'){ ?><td class="date"><?php echo $__Context->document->getRegdate('Y-m-d') ?></td><?php } ?>
                <?php if($__Context->module_info->display_last_update=='Y'){ ?><td class="date"><?php echo zdate($__Context->document->get('last_update'),'Y-m-d H:i') ?></td><?php } ?>
                </tr>
                </tbody>
            </table>
            <?php } ?>
            <?php  $__Context->height = $__Context->module_info->thumbnail_height + 50;  ?>
            <?php if($__Context->module_info->use_category=='Y'){;
$__Context->height += 0;
} ?>
            <?php if($__Context->module_info->display_author!='N' || $__Context->module_info->display_regdate!='N'){;
$__Context->height += 20;
} ?>
            <?php if($__Context->module_info->display_readed_count !='N' || $__Context->module_info->display_voted_count!='N'){;
$__Context->height += 20;
} ?>
            <?php if($__Context->module_info->display_readed_count !='N' || $__Context->module_info->display_blamed_count!='N'){;
$__Context->height += 20;
} ?>
            <ul class="thumbList">
                <?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->document){ ?>
                <?php if(!$__Context->document->isNotice()){ ?>
                <li style="width:<?php echo $__Context->module_info->thumbnail_width+10 ?>px;height:<?php echo $__Context->height ?>px;">
                
                    <div class="thumb">
                        <?php if($__Context->document->thumbnailExists($__Context->module_info->thumbnail_width, $__Context->module_info->thumbnail_height, $__Context->module_info->thumbnail_type)){ ?>
                            <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>">
                                <img src="<?php echo $__Context->document->getThumbnail($__Context->module_info->thumbnail_width, $__Context->module_info->thumbnail_height, $__Context->module_info->thumbnail_type) ?>" alt=""/>
                                <?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?>
                                <strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong>
                                <?php } ?>
                            </a>
                        <?php }else{ ?>
                            <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>">
                                <img src="/modules/board/skins/xe_2008/images/common/blank.gif" alt="" width="<?php echo $__Context->module_info->thumbnail_width ?>" height="<?php echo $__Context->module_info->thumbnail_height ?>" />
                                <?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?>
                                <strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong>
                                <?php } ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="title">
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
                    </div>
                    <?php if($__Context->module_info->display_author!='N'){ ?><div class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getNickName() ?></a></div><?php } ?>
                    <?php if($__Context->module_info->display_regdate!='N'){ ?><div class="date"><?php echo $__Context->document->getRegdate('Y.m.d') ?></div><?php } ?>
                    <div class="reading">
                        <?php if($__Context->module_info->display_readed_count!='N'){;
echo $__Context->lang->readed_count ?> <span class="num"><?php echo $__Context->document->get('readed_count') ?></span><?php } ?>
                        <?php if($__Context->document->get('voted_count')!=0 && $__Context->module_info->display_voted_count!='N'){ ?>
                            <?php if($__Context->module_info->display_readed_count!='N'){ ?><br /><?php } ?>
                            <?php echo $__Context->lang->voted_count ?> <span class="num"><?php echo $__Context->document->get('voted_count') ?></span>
                        <?php } ?>
                        <?php if($__Context->document->get('blamed_count')!=0 && $__Context->module_info->display_blamed_count!='N'){ ?>
                            <?php if($__Context->module_info->display_readed_count!='N' || $__Context->module_info->display_blamed_count!='N'){ ?><br /><?php } ?>
                            <?php echo $__Context->lang->blamed_count ?> <span class="num"><?php echo $__Context->document->get('blamed_count') ?></span>
                        <?php } ?>
                    </div>
                </li>
                <?php } ?>
                <?php } ?>
            </ul>
        <?php } ?>
        
    </fieldset>
</form>
