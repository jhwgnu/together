<?php if(!defined("__XE__"))exit;?><form action="./" method="get" class="boardListForm"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
    <fieldset>
        <legend>List of Articles</legend>
        <table cellspacing="0" border="1" summary="List of Articles" class="boardList">
			<thead>
				<tr>
					
					<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key => $__Context->val){ ?>
						
						<?php if($__Context->val->idx == -1){ ?>
	
						
						<?php if($__Context->val->type == 'no'){ ?>
							<th scope="col"><?php echo $__Context->lang->no ?></th>
						<?php }elseif($__Context->val->type == 'title'){ ?>
							<th scope="col" class="title">
								<?php if($__Context->module_info->use_category == "Y"){ ?>
								<span class="jumpTo">
									<select name="category" id="board_category">
										<option value=""><?php echo $__Context->lang->category ?></option>
										<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?>
										<option value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->category==$__Context->val->category_srl){ ?>selected="selected"<?php } ?>><?php echo str_repeat("&nbsp;&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> <?php if($__Context->val->document_count){ ?>(<?php echo $__Context->val->document_count ?>)<?php } ?></option>
										<?php } ?>
									</select>
									<button type="button" name="go_button" id="go_button" onclick="doChangeCategory()">Go</button>
								</span>
								<?php } ?>
								<?php echo $__Context->lang->title ?>
							</th>
						<?php }elseif($__Context->val->type == 'regdate'){ ?>
							<th scope="col"><a href="<?php echo getUrl('sort_index','regdate','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->date;
if($__Context->sort_index=='regdate'){ ?><img src="/modules/board/skins/xe_2009/img/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></th>
						<?php }elseif($__Context->val->type == 'last_update'){ ?>
							<th scope="col"><a href="<?php echo getUrl('sort_index','last_update','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->last_update;
if($__Context->sort_index=='last_update'){ ?><img src="/modules/board/skins/xe_2009/img/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></th>
						<?php }elseif($__Context->val->type == 'nick_name'){ ?>
							<th scope="col"><?php echo $__Context->lang->writer ?></th>
						<?php }elseif($__Context->val->type == 'user_id'){ ?>
							<th scope="col"><?php echo $__Context->lang->user_id ?></th>
						<?php }elseif($__Context->val->type == 'user_name'){ ?>
							<th scope="col"><?php echo $__Context->lang->user_name ?></th>
						<?php }elseif($__Context->val->type == 'readed_count'){ ?>
							<th scope="col"><a href="<?php echo getUrl('sort_index','readed_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->readed_count;
if($__Context->sort_index=='readed_count'){ ?><img src="/modules/board/skins/xe_2009/img/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></th>
						<?php }elseif($__Context->val->type == 'voted_count'){ ?>
							<th scope="col"><a href="<?php echo getUrl('sort_index','voted_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->voted_count;
if($__Context->sort_index=='voted_count'){ ?><img src="/modules/board/skins/xe_2009/img/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></th>
						<?php }elseif($__Context->val->type == 'blamed_count'){ ?>
							<th scope="col"><a href="<?php echo getUrl('sort_index','blamed_count','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->blamed_count;
if($__Context->sort_index=='blamed_count'){ ?><img src="/modules/board/skins/xe_2009/img/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></th>
                        <?php }elseif($__Context->val->type == 'last_post'){ ?>
                            <th scope="col"><a href="<?php echo getUrl('sort_index','last_update','order_type',$__Context->order_type) ?>"><?php echo $__Context->lang->last_post;
if($__Context->sort_index=='last_update'){ ?><img src="/modules/board/skins/xe_2009/img/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></th>
						<?php } ?>
						
						<?php }else{ ?>
							<th scope="col"><a href="<?php echo getUrl('sort_index', $__Context->val->eid, 'order_type', $__Context->order_type) ?>"><?php echo $__Context->val->name;
if($__Context->sort_index == $__Context->val->eid){ ?><img src="/modules/board/skins/xe_2009/img/common/<?php echo $__Context->order_icon ?>" alt="sort" width="5" height="3" class="sort" /><?php } ?></a></th>
						<?php } ?>
					<?php } ?>
					<?php if($__Context->grant->manager){ ?><th scope="col"><input type="checkbox" onclick="XE.checkboxToggleAll({ doClick:true }); return false;" title="Check All" /></th><?php } ?>
				</tr>
			</thead>
	
			<tbody>
	
				<?php if(!$__Context->document_list && !$__Context->notice_list){ ?>
				<tr>
					<td colspan="<?php if($__Context->grant->manager){;
echo count($__Context->list_config)+1;
}else{;
echo count($__Context->list_config);
} ?>">
						<?php echo $__Context->lang->no_documents ?>
					</td>
				</tr>
				<?php }else{ ?>
			
				<?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no => $__Context->document){ ?>
				<tr class="notice">
					
					<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key => $__Context->val){ ?>
	
						
						<?php if($__Context->val->idx == -1){ ?>
	
							
							<?php if($__Context->val->type == 'no'){ ?>
								<td class="notice"><?php if($__Context->document_srl == $__Context->document->document_srl){ ?>&raquo;<?php }else{;
echo $__Context->lang->notice;
} ?></td>
							<?php }elseif($__Context->val->type == 'title'){ ?>
								<td class="title">
									
									<?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?>
									<strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong>
									<?php } ?>
	
									<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><?php echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></a>
									<?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new) ?>
									
									<?php if($__Context->document->getCommentCount()){ ?>
										<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#comment"><span class="replyNum" title="Replies">[<?php echo $__Context->document->getCommentCount() ?>]</span></a>
									<?php } ?>
	
									<?php if($__Context->document->getTrackbackCount()){ ?>
										<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>#trackback"><span class="trackbackNum" title="Trackbacks">[<?php echo $__Context->document->getTrackbackCount() ?>]</span></a>
									<?php } ?>
	
								</td>
							<?php }elseif($__Context->val->type == 'regdate'){ ?>
								<td class="date"><?php echo $__Context->document->getRegdate('Y-m-d') ?></td>
							<?php }elseif($__Context->val->type == 'last_update'){ ?>
								<td class="date"><?php echo zdate($__Context->document->get('last_update'),'Y-m-d H:i') ?></td>
							<?php }elseif($__Context->val->type == 'nick_name'){ ?>
								<td class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getNickName() ?></a></td>
							<?php }elseif($__Context->val->type == 'user_id'){ ?>
								<td class="author"><?php echo $__Context->document->getUserID() ?></a></td>
							<?php }elseif($__Context->val->type == 'user_name'){ ?>
								<td class="author"><?php echo $__Context->document->getUserName() ?></a></td>
							<?php }elseif($__Context->val->type == 'readed_count'){ ?>
								<td class="reading"><?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'&nbsp;' ?></td>
							<?php }elseif($__Context->val->type == 'voted_count'){ ?>
								<td class="recommend"><?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'&nbsp;' ?></td>
							<?php }elseif($__Context->val->type == 'blamed_count'){ ?>
								<td class="recommend"><?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'&nbsp;' ?></td>
							<?php }elseif($__Context->val->type == 'last_post'){ ?>
                                <td class="lastReply">
                                <?php if((int)($__Context->document->get('comment_count'))>0){ ?>
                                    <a href="<?php echo $__Context->document->getPermanentUrl() ?>#comment" class="replyAnchor"><?php echo zdate($__Context->document->get('last_update'),'Y-m-d') ?> <?php echo zdate($__Context->document->get('last_update'),'H:i') ?></a>
                                    <?php if($__Context->document->getLastUpdater()){ ?>
                                        <sub class="by">by</sub>
                                        <?php echo $__Context->document->getLastUpdater() ?>
                                    <?php } ?>
                                <?php }else{ ?>
                                    &nbsp;
                                <?php } ?>
                                </td>
							<?php } ?>
	
						
						<?php }else{ ?>
								<td><?php echo $__Context->document->getExtraValueHTML($__Context->val->idx) ?>&nbsp;</td>
						<?php } ?>
					<?php } ?>
					<?php if($__Context->grant->manager){ ?>
						<td class="check"><input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" title="Check this" onclick="doAddDocumentCart(this)" <?php if($__Context->document->isCarted()){ ?>checked="checked"<?php } ?> /></td>
					<?php } ?>
				</tr>
				<?php } ?>
	
			<?php } ?>
			</tbody>
        </table>
		<?php if(count($__Context->document_list)){ ?>
            <?php $__Context->_height = count($__Context->list_config)*18 ?>
            <?php if($__Context->list_config['thumbnail']){ ?> <?php $__Context->_height += $__Context->module_info->thumbnail_height;
} ?>
            <?php if($__Context->list_config['summary']){ ?> <?php $__Context->_height += 60;
} ?>
            <?php if($__Context->list_config['last_post']){ ?> <?php $__Context->_height += 30;
} ?>
		<ul class="boardList thumbList">
			<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->document){ ?>
			<?php if(!$__Context->document->isNotice()){ ?>
			<li style="width:<?php echo $__Context->module_info->thumbnail_width+18 ?>px;height:<?php echo $__Context->_height ?>px;">
			
                <?php $__Context->_meta_display = false ?>
                <?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key => $__Context->val){ ?>
                    
                    <?php if($__Context->val->idx == -1){ ?>
                        <?php if($__Context->val->type == 'no'){ ?>
                            <?php if($__Context->_meta_display){ ?></ul><?php $__Context->_meta_display = false;
} ?>
                            <p class="num"><?php if($__Context->document_srl == $__Context->document->document_srl){ ?>&raquo;<?php }else{;
echo $__Context->no;
} ?></p>
                        <?php }elseif($__Context->val->type == 'thumbnail'){ ?>
                            <?php if($__Context->_meta_display){ ?></ul><?php $__Context->_meta_display = false;
} ?>
                            <div class="thumb">
                                <?php if($__Context->document->thumbnailExists($__Context->module_info->thumbnail_width, $__Context->module_info->thumbnail_height, $__Context->module_info->thumbnail_type)){ ?>
                                    <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>"><img src="<?php echo $__Context->document->getThumbnail($__Context->module_info->thumbnail_width, $__Context->module_info->thumbnail_height, $__Context->module_info->thumbnail_type) ?>" alt=""/><?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?><strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong><?php } ?></a>
                                <?php }else{ ?>
                                    <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl,'listStyle',$__Context->listStyle, 'cpage','') ?>"><span class="noPhoto" style="width:<?php echo $__Context->module_info->thumbnail_width ?>px; height:<?php echo $__Context->module_info->thumbnail_height ?>px; line-height:<?php echo $__Context->module_info->thumbnail_height ?>px;">No Image</span><?php if($__Context->module_info->use_category == "Y" && $__Context->document->get('category_srl')){ ?><strong class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></strong><?php } ?></a>
                                <?php } ?>
                            </div>
                        <?php }elseif($__Context->val->type == 'title'){ ?>
                            <?php if($__Context->_meta_display){ ?></ul><?php $__Context->_meta_display = false;
} ?>
                            <div class="title">
                                <?php if($__Context->grant->manager){ ?>
                                    <input type="checkbox" name="cart" value="<?php echo $__Context->document->document_srl ?>" onclick="doAddDocumentCart(this)" <?php if($__Context->document->isCarted()){ ?>checked="checked"<?php } ?> /> 
                                <?php } ?>
                                <a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><?php echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></a>
								<?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new) ?>	
                                <?php if($__Context->document->getCommentCount()){ ?>
                                    <span class="replyNum" title="Replies">[<?php echo $__Context->document->getCommentCount() ?>]</span>
                                <?php } ?>
                                <?php if($__Context->document->getTrackbackCount()){ ?>
                                    <span class="trackbackNum" title="Trackbacks">[<?php echo $__Context->document->getTrackbackCount() ?>]</span>
                                <?php } ?>
                            </div>
                        <?php }elseif($__Context->val->type == 'summary'){ ?>
                            <?php if($__Context->_meta_display){ ?></ul><?php $__Context->_meta_display = false;
} ?>
                            <p class="summary"><a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><?php echo $__Context->document->getSummary(50) ?></a></p>
                        <?php }elseif($__Context->val->type == 'last_post' && $__Context->document->get('comment_count')>0){ ?>
                            <?php if($__Context->_meta_display){ ?></ul><?php $__Context->_meta_display = false;
} ?>
                            <div class="lastReply">
                                <a href="<?php echo $__Context->document->getPermanentUrl() ?>#comment" class="replyAnchor"><?php echo zdate($__Context->document->get('last_update'),'Y-m-d') ?> <?php echo zdate($__Context->document->get('last_update'),'H:i') ?></a>
                                <?php if($__Context->document->getLastUpdater()){ ?>
                                    <sub class="by">by</sub>
                                    <?php echo $__Context->document->getLastUpdater() ?>
                                <?php } ?>
                            </div>
                        <?php }else{ ?>
                            <?php if(!$__Context->_meta_display){ ?><ul class="meta"><?php $__Context->_meta_display = true;
} ?>
                            <?php if($__Context->val->type == 'regdate'){ ?>
                                <li class="date"><?php echo $__Context->document->getRegdate('Y-m-d') ?></li>
                            <?php }elseif($__Context->val->type == 'last_update'){ ?>
                                <li class="date"><?php echo zdate($__Context->document->get('last_update'),'Y-m-d H:i') ?></li>
                            <?php }elseif($__Context->val->type == 'nick_name'){ ?>
                                <li class="author"><a href="#popup_menu_area" class="member_<?php echo $__Context->document->get('member_srl') ?>" onclick="return false"><?php echo $__Context->document->getNickName() ?></a></li>
                            <?php }elseif($__Context->val->type == 'user_id'){ ?>
                                <li class="author"><?php echo $__Context->document->getUserID() ?></a></li>
                            <?php }elseif($__Context->val->type == 'user_name'){ ?>
                                <li class="author"><?php echo $__Context->document->getUserName() ?></a></li>
                            <?php }elseif($__Context->val->type == 'readed_count'){ ?>
                                <li class="reading"><?php echo $__Context->lang->readed_count ?> <?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></li>
                            <?php }elseif($__Context->val->type == 'voted_count'){ ?>
                                <li class="recommend"><?php echo $__Context->lang->voted_count ?> <?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):'0' ?></li>
                            <?php }elseif($__Context->val->type == 'blamed_count'){ ?>
                                <li class="recommend"><?php echo $__Context->lang->blamed_count ?> <?php echo $__Context->document->get('blamed_count')!=0?$__Context->document->get('blamed_count'):'0' ?></li>
                            <?php } ?>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php if($__Context->_meta_display){ ?></ul><?php $__Context->_meta_display = false;
} ?>
                        <p class="title"><span class="category"><?php echo $__Context->val->name ?></span> <?php echo $__Context->document->getExtraValueHTML($__Context->val->idx) ?>&nbsp;</p>
                    <?php } ?>
                <?php } ?>
                <?php if($__Context->_meta_display){ ?></ul><?php $__Context->_meta_display = false;
} ?>
			</li>
			<?php } ?>
			<?php } ?>
		</ul>
		
        <?php } ?>
        
    </fieldset>
</form>
