<?php
global $sitepress, $WPML_String_Translation, $wpdb;
$string_settings = $WPML_String_Translation->get_strings_settings();
icl_st_reset_current_trasnslator_notifications();

if((!isset($sitepress_settings['existing_content_language_verified']) || !$sitepress_settings['existing_content_language_verified']) /*|| 2 > count($sitepress->get_active_languages())*/){
    return;
}

if ( filter_input( INPUT_GET, 'trop', FILTER_SANITIZE_NUMBER_INT ) > 0 ) {
    include dirname(__FILE__) . '/string-translation-translate-options.php';
    return;
} elseif ( filter_input( INPUT_GET, 'download_mo', FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ) {
    include dirname(__FILE__) . '/auto-download-mo.php';
    return;
}
$status_filter = filter_input( INPUT_GET, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE );
$status_filter_text = $status_filter;
$status_filter_lang = false;
if ( preg_match(
    "#" . ICL_STRING_TRANSLATION_WAITING_FOR_TRANSLATOR . "-(.+)#",
    $status_filter_text,
    $matches
)
) {
    $status_filter      = ICL_STRING_TRANSLATION_WAITING_FOR_TRANSLATOR;
    $status_filter_lang = $matches[1];
}else{
    $status_filter = filter_input( INPUT_GET, 'status', FILTER_SANITIZE_NUMBER_INT, FILTER_NULL_ON_FAILURE );
}
//$status_filter  = $status_filter !== false ? (int) $status_filter : null;
$context_filter = filter_input( INPUT_GET, 'context', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$search_filter  = filter_input( INPUT_GET, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$exact_match    = filter_input( INPUT_GET, 'em', FILTER_VALIDATE_BOOLEAN );

$icl_string_translations = icl_get_string_translations();

if(!empty($icl_string_translations)){
    $icl_strings_in_page = icl_get_strings_tracked_in_pages($icl_string_translations);
}
$active_languages = $sitepress->get_active_languages();
$icl_contexts = icl_st_get_contexts($status_filter);

$available_contexts = array();
if(!empty($icl_contexts)){
    foreach($icl_contexts as $c){
        if($c) $available_contexts[] = $c->context;
    }
}

$available_contexts = array_unique($available_contexts);

function _icl_string_translation_rtl_div($language) {
    if (in_array($language, array('ar','he','fa'))) {
        echo ' dir="rtl" style="text-align:right;direction:rtl;"';
    } else {
        echo ' dir="ltr" style="text-align:left;direction:ltr;"';
    }
}
function _icl_string_translation_rtl_textarea($language) {
    if (in_array($language, array('ar','he','fa'))) {
        echo ' dir="rtl" style="text-align:right;direction:rtl;width:100%"';
    } else {
        echo ' dir="ltr" style="text-align:left;direction:ltr;width:100%"';
    }
}

?>
<div class="wrap">

    <div id="icon-wpml" class="icon32"><br /></div>
    <h2><?php echo __('String translation', 'wpml-string-translation') ?></h2>

	<?php
		do_action( 'display_basket_notification', 'st_dashboard_top' );
	?>

    <?php if(isset($icl_st_po_strings) && !empty($icl_st_po_strings)): ?>

        <p><?php printf(__("These are the strings that we found in your .po file. Please carefully review them. Then, click on the 'add' or 'cancel' buttons at the %sbottom of this screen%s. You can exclude individual strings by clearing the check boxes next to them.", 'wpml-string-translation'), '<a href="#add_po_strings_confirm">', '</a>'); ?></p>

        <form method="post" action="<?php echo admin_url("admin.php?page=" . WPML_ST_FOLDER . "/menu/string-translation.php");?>">
        <?php wp_nonce_field('add_po_strings') ?>
        <?php $use_po_translations = filter_input(INPUT_POST, 'icl_st_po_translations', FILTER_VALIDATE_BOOLEAN); ?>
        <?php if ( $use_po_translations == true ): ?>
        <input type="hidden" name="action" value="icl_st_save_strings" />
        <input
            type="hidden"
            name="icl_st_po_language"
            value="<?php echo filter_input(INPUT_POST, 'icl_st_po_language', FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>"
        />
        <?php endif; ?>
            <?php
            $icl_st_domain = filter_input(INPUT_POST, 'icl_st_i_context_new', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $icl_st_domain = $icl_st_domain ? $icl_st_domain : filter_input(INPUT_POST, 'icl_st_i_context', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            ?>
        <input
            type="hidden"
            name="icl_st_domain_name"
            value="<?php echo $icl_st_domain ?>"
        />

        <table id="icl_po_strings" class="widefat" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="manage-column column-cb check-column"><input type="checkbox" checked="checked" name="" /></th>
                    <th><?php echo __('String', 'wpml-string-translation') ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col" class="manage-column column-cb check-column"><input type="checkbox" checked="checked" name="" /></th>
                    <th><?php echo __('String', 'wpml-string-translation') ?></th>
                </tr>
            </tfoot>
            <tbody>
                <?php $k = -1; foreach($icl_st_po_strings as $str): $k++; ?>
                    <tr>
                        <td><input class="icl_st_row_cb" type="checkbox" name="icl_strings_selected[]"
                            <?php if($str['exists'] || $use_po_translations !== true): ?>checked="checked"<?php endif;?> value="<?php echo $k ?>" /></td>
                        <td>
                            <input type="text" name="icl_strings[]" value="<?php echo esc_attr($str['string']) ?>" readonly="readonly" style="width:100%;" size="100" />
                            <?php if( $use_po_translations === true ):?>
                            <input type="text" name="icl_translations[]" value="<?php echo esc_attr($str['translation']) ?>" readonly="readonly" style="width:100%;<?php if($str['fuzzy']):?>;background-color:#ffecec<?php endif; ?>" size="100" />
                            <input type="hidden" name="icl_fuzzy[]" value="<?php echo $str['fuzzy'] ?>" />
                            <input type="hidden" name="icl_name[]" value="<?php echo $str['name'] ?>" />
                            <?php endif; ?>
                            <?php if($str['name'] != md5($str['string'])): ?>
                            <i><?php printf(__('Name: %s', 'wpml-string-translation'), $str['name']) ?></i><br />
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a name="add_po_strings_confirm"></a>
        <p><input class="button" type="button" value="<?php echo __('Cancel', 'wpml-string-translation'); ?>" onclick="location.href='admin.php?page=<?php echo $_GET['page'] ?>'" />
        &nbsp; <input class="button-primary" type="submit" value="<?php echo __('Add selected strings', 'wpml-string-translation'); ?>" />
        </p>
        </form>

    <?php else: ?>

        <p style="line-height:220%;">
        <?php echo __('Select which strings to display:', 'wpml-string-translation'); ?>
        <select name="icl_st_filter_status">
	        <?php
	        $selected = selected(false, $status_filter, false);
	        ?>
            <option value="" <?php echo $selected;?>>
	            <?php echo __('All strings', 'wpml-string-translation') ?>
            </option>
	        <?php
	        $selected = selected(ICL_TM_COMPLETE, $status_filter, false);
	        ?>
            <option value="<?php echo ICL_TM_COMPLETE ?>" <?php echo $selected;?>>
	            <?php echo $icl_st_string_translation_statuses[ICL_TM_COMPLETE] ?>
            </option>
	        <?php
	        if ( icl_st_is_translator() ) {

		        if ( $icl_st_pending = icl_st_get_pending_string_translations_stats() ) {
			        foreach ( $icl_st_pending as $lang => $count ) {
				        $lang_details = $sitepress->get_language_details( $lang );

				        $selected = '';
				        if ( isset( $status_filter_lang ) ) {
					        $selected = selected( $lang, $status_filter_lang, false );
				        }
				        ?>
				        <option value="<?php echo ICL_TM_WAITING_FOR_TRANSLATOR . '-' . $lang ?>" <?php echo $selected; ?>>
					        <?php printf( __( 'Pending %s translation (%d)', 'wpml-string-translation' ), $lang_details[ 'display_name' ], $count ) ?>
				        </option>
			        <?php
			        }
		        }
	        } else {
		        $selected = selected(ICL_TM_NOT_TRANSLATED, $status_filter, false);
		        ?>
		        <option value="<?php echo ICL_TM_NOT_TRANSLATED ?>" <?php echo $selected; ?>>
			        <?php echo __( 'Translation needed', 'wpml-string-translation' ) ?>
		        </option>
		        <?php
		        $selected = selected(ICL_TM_WAITING_FOR_TRANSLATOR, $status_filter, false);
		        ?>
		        <option value="<?php echo ICL_TM_WAITING_FOR_TRANSLATOR ?>" <?php echo $selected; ?>>
			        <?php echo __( 'Waiting for translator', 'wpml-string-translation' ) ?>
		        </option>
	        <?php
	        }
	        ?>

        </select>

        <?php if(!empty($icl_contexts)): ?>
        &nbsp;&nbsp;
        <span style="white-space:nowrap">
        <?php echo __('Select strings within context:', 'wpml-string-translation')?>
        <select name="icl_st_filter_context">
            <option value="" <?php if($context_filter === false ):?>selected="selected"<?php endif;?>><?php echo __('All contexts', 'wpml-string-translation') ?></option>
            <?php foreach($icl_contexts as $v):?>
            <option value="<?php echo esc_attr($v->context)?>" <?php if($context_filter == $v->context ):?>selected="selected"<?php endif;?>><?php echo $v->context . ' ('.$v->c.')'; ?></option>
            <?php endforeach; ?>
        </select>
        </span>
        <?php endif; ?>

        &nbsp;&nbsp;
        <span style="white-space:nowrap">
        <label>
        <?php echo __('Search for:', 'wpml-string-translation')?>
        <input type="text" id="icl_st_filter_search" value="<?php echo $search_filter ?>" />
        </label>
        
        <label>
        <input type="checkbox" id="icl_st_filter_search_em" value="1" <?php if($exact_match):?>checked="checked"<?php endif;?> />
        <?php echo __('Exact match', 'wpml-string-translation')?>
        </label>
        
        <input class="button" type="button" value="<?php _e('Search', 'wpml-string-translation')?>" id="icl_st_filter_search_sb" />
        </span>

        <?php if($search_filter): ?>
        <span style="white-space:nowrap">
        <?php printf(__('Showing only strings that contain %s', 'wpml-string-translation'), '<i>' . esc_html($search_filter). '</i>') ; ?>
        <input class="button" type="button" value="<?php _e('Exit search', 'wpml-string-translation')?>" id="icl_st_filter_search_remove" />
        </span>
        <?php endif; ?>

        </p>

        <table id="icl_string_translations" class="widefat" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="manage-column column-cb check-column"><input type="checkbox" /></th>
                    <th scope="col"><?php echo __('Context', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('Name', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('View', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('String', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('Status', 'wpml-string-translation') ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col" class="manage-column column-cb check-column"><input type="checkbox" /></th>
                    <th scope="col"><?php echo __('Context', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('Name', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('View', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('String', 'wpml-string-translation') ?></th>
                    <th scope="col"><?php echo __('Status', 'wpml-string-translation') ?></th>
                </tr>
            </tfoot>
            <tbody>
                <?php if(empty($icl_string_translations)):?>
                <tr>
                    <td colspan="6" align="center"><?php echo __('No strings found', 'wpml-string-translation')?></td>
                </tr>
                <?php else: ?>
                <?php foreach($icl_string_translations as $string_id=>$icl_string): ?>
                <tr valign="top">
                    <td><input class="icl_st_row_cb" type="checkbox" value="<?php echo $string_id ?>" /></td>
                    <td><?php echo esc_html($icl_string['context']); ?></td>
                    <td><?php echo esc_html(_icl_st_hide_random($icl_string['name'])); ?></td>
                    <td nowrap="nowrap">
                        <?php if(isset($icl_strings_in_page[ICL_STRING_TRANSLATION_STRING_TRACKING_TYPE_SOURCE][$string_id])): ?>
                            <a class="thickbox" title="<?php _e('view in source', 'wpml-string-translation') ?>"
                                href="admin.php?page=<?php echo WPML_ST_FOLDER ?>%2Fmenu%2Fstring-translation.php&amp;icl_action=view_string_in_source&amp;string_id=<?php
                                echo $string_id ?>&amp;width=810&amp;height=600"><img src="<?php echo WPML_ST_URL ?>/res/img/view-in-source.png" width="16" height="16"
                                alt="<?php _e('view in page', 'wpml-string-translation') ?>" /></a>
                        <?php endif; ?>
                        <?php if(isset($icl_strings_in_page[ICL_STRING_TRANSLATION_STRING_TRACKING_TYPE_PAGE][$string_id])): ?>
                            <a class="thickbox" title="<?php _e('view in page', 'wpml-string-translation') ?>"
                            href="admin.php?page=<?php echo WPML_ST_FOLDER ?>%2Fmenu%2Fstring-translation.php&icl_action=view_string_in_page&string_id=<?php
                            echo $string_id ?>&width=810&height=600"><img src="<?php echo WPML_ST_URL ?>/res/img/view-in-page.png" width="16" height="16"
                            alt="<?php _e('view in page', 'wpml-string-translation') ?>" /></a>
                        <?php endif; ?>
                    </td>
                    <td width="70%">
                        <div class="icl-st-original"<?php _icl_string_translation_rtl_div($string_settings['strings_language']); ?>>
                        <?php echo esc_html($icl_string['value']); ?>
                        </div>
                        <div style="float:right;">
                            <a href="#icl-st-toggle-translations"><?php echo __('translations','wpml-string-translation') ?></a>
                        </div>
                        <br clear="all" />
                        <div class="icl-st-inline">
                            <?php foreach($active_languages as $lang): if($lang['code'] === $string_settings['strings_language']) continue;  ?>

                            <?php
                                if(isset($icl_string['translations'][$lang['code']]) && $icl_string['translations'][$lang['code']]['status'] == ICL_TM_COMPLETE){
                                    $tr_complete_checked = 'checked="checked"';
                                }else{
                                    if(icl_st_is_translator()){
                                        global $current_user;
                                        wp_get_current_user();
                                        $user_lang_pairs = get_user_meta(get_current_user_id(), $wpdb->prefix.'language_pairs', true);
                                        if(empty($user_lang_pairs[$string_settings['strings_language']][$lang['code']])){
                                            continue;
                                        }
                                    }
                                    $tr_complete_checked = '';
                                }

								$form_disabled = '';
								$form_disabled_reason = '';
								
								if(icl_st_is_translator()){

									// Determine if string is being translated via Translation Proxy
									$translation_proxy_status = $wpdb->get_var($wpdb->prepare("
											SELECT c.status FROM {$wpdb->prefix}icl_core_status c 
												JOIN {$wpdb->prefix}icl_string_status s ON s.rid = c.rid
												WHERE s.string_translation_id = (SELECT id FROM {$wpdb->prefix}icl_string_translations WHERE string_id=%d AND language=%s) AND c.target=%s AND c.status = %d
												ORDER BY s.id DESC LIMIT 1
										", $icl_string['string_id'], $lang['code'], $lang['code'], ICL_TM_WAITING_FOR_TRANSLATOR));

									$can_translate = isset($icl_string['translations'][$lang['code']]);
									if ( ! $can_translate ) {
										$form_disabled_reason = __( "You can't translate this string because it hasn't been sent for translation in this language", 'wpml-string-translation' );
									}
									$translator_id = $can_translate ? $icl_string['translations'][$lang['code']]['translator_id'] : null;
									
									if ( $can_translate && $translator_id != 0 && $translator_id != get_current_user_id() ) {
										$can_translate = false;
										$form_disabled_reason = __( "You can't translate this string because it's assigned to another translator", 'wpml-string-translation' );
									}
									
									if ( $can_translate && ( $translator_id == 0 &&
												$icl_string['translations'][$lang['code']]['status'] == ICL_TM_WAITING_FOR_TRANSLATOR &&
												$translation_proxy_status )
										) {
										$can_translate = false;
										$form_disabled_reason = __( "You can't translate this string because it's assigned to another translator", 'wpml-string-translation' );
									}
									
									if ( ! $can_translate ) {
										$form_disabled = ' disabled="disabled" ';
									}

								}
                            ?>

                            <form class="icl_st_form" name="icl_st_form_<?php echo $lang['code'] . '_' . $string_id ?>" action="">
                            <?php wp_nonce_field('icl_st_save_translation_nonce', '_icl_nonce') ?>
                            <input type="hidden" name="icl_st_language" value="<?php echo $lang['code'] ?>" />
                            <input type="hidden" name="icl_st_string_id" value="<?php echo $string_id ?>" />

                            <table class="icl-st-table">
                                <tr>
                                    <td style="border:none">
                                        <?php echo $lang['display_name'] ?>
                                        <br />
                                        <img class="icl_ajx_loader" src="<?php echo WPML_ST_URL ?>/res/img/ajax-loader.gif" style="float:left;display:none;position:absolute;margin:5px" alt="" />
                                        <?php
                                        $rows = ceil(strlen($icl_string['value'])/80);
                                        $temp_line_array = preg_split( '/\n|\r/', $icl_string['value'] );
                                        $temp_num_lines = count($temp_line_array);
                                        $rows = $rows + $temp_num_lines;
                                        ?>
                                        <textarea<?php echo $form_disabled ?><?php _icl_string_translation_rtl_textarea($lang['code']); ?>rows="<?php echo $rows ?>" cols="40" name="icl_st_translation" <?php if(isset($icl_string['translations'][$lang['code']])): ?>id="icl_st_ta_<?php echo $icl_string['translations'][$lang['code']]['id'] ?>"<?php endif;?>><?php
                                            if(isset($icl_string['translations'][$lang['code']]) && !is_null($icl_string['translations'][$lang['code']]['value'])) echo $icl_string['translations'][$lang['code']]['value']; else echo $icl_string['value'];
                                            ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="border:none">
                                        <?php

                                        ?>
                                        <?php if(isset($icl_string['translations'][$lang['code']]['value']) && preg_match('#<([^>]*)>#im',$icl_string['translations'][$lang['code']]['value'])):?>
                                        <br clear="all" /><div style="text-align:left;display:none" class="icl_html_preview"></div>
                                        <a href="#" class="alignleft icl_htmlpreview_link">HTML preview</a>
                                        <?php endif; ?>
                                        <label><input<?php echo $form_disabled ?> type="checkbox" name="icl_st_translation_complete" value="1" <?php echo $tr_complete_checked ?> <?php if(isset($icl_string['translations'][$lang['code']])): ?>id="icl_st_cb_<?php echo $icl_string['translations'][$lang['code']]['id'] ?>"<?php endif;?> /> <?php echo __('Translation is complete','wpml-string-translation')?></label>&nbsp;
                                        <input<?php echo $form_disabled ?> type="submit" class="button-secondary action" value="<?php echo __('Save', 'wpml-string-translation')?>" />
										<?php if ( $form_disabled_reason ): ?>
											<br clear="all" />
											<p><?php echo $form_disabled_reason; ?></p>
										<?php endif; ?>
                                    </td>
                                </tr>
                                </table>
                                </form>

                            <?php endforeach;?>

                        </div>
                    </td>
                    <td nowrap="nowrap" id="icl_st_string_status_<?php echo $string_id ?>">
                    <span>
                    <?php
                    echo apply_filters( 'wpml_string_status_text',
                                        $icl_st_string_translation_statuses[ (int) $icl_string[ 'status' ] ],
                                        $string_id );
                    ?>
                    </span>
                    <input type="hidden" id="icl_st_wc_<?php echo $string_id ?>" value="<?php
                        echo $WPML_String_Translation->estimate_word_count($icl_string['value'], $string_settings['strings_language']) ?>" />
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php
    $get_show_results = filter_input( INPUT_GET, 'show_results', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
    $get_page         = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_URL );
    ?>
        <?php if($wp_query->found_posts > 10): ?>
            <div class="tablenav" style="width:70%;float:right;">
            <?php
            $paged            = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );
            $paged            = $paged && $get_show_results !== 'all' ? $paged : 1;
            $page_links = paginate_links( array(
                'base' => add_query_arg('paged', '%#%' ),
                'format' => '',
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'total' => $wp_query->max_num_pages,
                    'current' => $paged,
                'add_args' => isset($icl_translation_filter)?$icl_translation_filter:array()
                )
            );
            $query_url_params = '?page=' . $get_page;
            $query_url_params .= '&paged=';
            $query_url_params .= $paged;
            $query_url_params .= ( $context_filter !== null ? ( '&context=' . $context_filter ) : '' );
            $query_url_params .= ( $status_filter !== null ? ( '&status=' . $status_filter ) : '' );
            ?>
            <?php if( $get_show_results === 'all' ): ?>
            <div class="tablenav-pages">
            <a href="admin.php<?php echo $query_url_params ?>"><?php printf(__('Display %d results per page', 'wpml-string-translation'), $sitepress_settings['st']['strings_per_page']); ?></a>
            </div>
            <?php endif; ?>

            <div class="tablenav-pages">
                <?php if ( $page_links ): ?>
                <?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s', 'wpml-string-translation' ) . '</span>%s',
                    number_format_i18n( ( $paged - 1 ) * $wp_query->query_vars['posts_per_page'] + 1 ),
                    number_format_i18n( min( $paged * $wp_query->query_vars['posts_per_page'], $wp_query->found_posts ) ),
                    number_format_i18n( $wp_query->found_posts ),
                    $page_links
                    ); echo $page_links_text;
                ?>
                <?php endif; ?>
                <?php if( !$get_show_results ): ?>
                <?php echo __('Strings per page:', 'wpml-string-translation')?>
                <?php
                $spp_qsa = '';
                    $params = array_filter(
                        array(
                            '&context=' => $context_filter,
                            '&status=' => $status_filter,
                            '&search=' => $search_filter,
                            '&em=' => $exact_match
                        )
                    );
                    foreach ( $params as $key => $p ) {
                        $spp_qsa .= $key . $p;
                    }

                    $strings_per_page = $wp_query->query_vars['posts_per_page'];
                    ?>
                    <select name="icl_st_per_page"
                            onchange="location.href='admin.php?page=<?php echo $get_page ?><?php echo $spp_qsa ?>&amp;strings_per_page='+this.value">
                        <option value="10"<?php if ( $strings_per_page == 10 ) {
                            echo ' selected="selected"';
                        } ?>>10
                        </option>
                        <option value="20"<?php if ( $strings_per_page == 20 ) {
                            echo ' selected="selected"';
                        } ?>>20
                        </option>
                        <option value="50"<?php if ( $strings_per_page == 50 ) {
                            echo ' selected="selected"';
                        } ?>>50
                        </option>
                        <option value="100"<?php if ( $strings_per_page == 100 ) {
                            echo ' selected="selected"';
                        } ?>>100
                        </option>
                    </select>
                    &nbsp;
                    <a href="admin.php?page=<?php echo $_GET[ 'page' ] ?>&amp;show_results=all<?php if ( isset( $_GET[ 'context' ] ) ) {
                        echo '&amp;context=' . $_GET[ 'context' ];
                    } ?><?php if ( isset( $_GET[ 'status' ] ) ) {
                        echo '&amp;status=' . $_GET[ 'status' ];
                    } ?>"><?php echo __( 'Display all results', 'wpml-string-translation' ); ?></a>
                <?php endif; ?>
            </div>

            </div>
        <?php endif; ?>

        <?php if(current_user_can('manage_options')):  // the rest is only for admins. not for editors  ?>

        <span class="subsubsub">
            <input type="hidden" id="_icl_nonce_dstr" value="<?php echo wp_create_nonce('icl_st_delete_strings_nonce') ?>" />
            <input type="button" class="button-secondary" id="icl_st_delete_selected" value="<?php echo __('Delete selected strings', 'wpml-string-translation') ?>" disabled="disabled" />
            <span style="display:none"><?php echo __("Are you sure you want to delete these strings?\nTheir translations will be deleted too.",'wpml-string-translation') ?></span>
        </span>

        <br clear="all" />

        <br />

	<?php do_action( 'wpml_st_below_menu', $status_filter_lang, 10, 2 ) ?>

        <br style="clear:both;" />
        <div id="dashboard-widgets-wrap">
            <div id="dashboard-widgets" class="metabox-holder">

                <div class="postbox-container" style="width: 49%;">
                    <div id="normal-sortables-stsel" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_wpml_stsel_1" class="postbox">
                            <div class="handlediv" title="<?php echo __('Click to toggle', 'wpml-string-translation'); ?>">
                                <br/>
                            </div>
                            <h3 class="hndle">
                                <span><?php echo __('Track where string appear on the site', 'wpml-string-translation')?></span>
                            </h3>
                            <div class="inside">
                                <p class="sub"><?php echo __("WPML can keep track of where strings are used on the public pages. Activating this feature will enable the 'view in page' functionality and make translation easier.", 'wpml-string-translation')?></p>
                                <form id="icl_st_track_strings" name="icl_st_track_strings" action="">
                                    <?php wp_nonce_field('icl_st_track_strings_nonce', '_icl_nonce'); ?>
                                    <p class="icl_form_errors" style="display:none"></p>
                                    <ul>
                                        <li>
                                           	<input type="hidden" name="icl_st[track_strings]" value="0" />
                                            <label><input type="checkbox" id="icl_st_track_strings" name="icl_st[track_strings]" value="1" <?php
                                            if(!empty($string_settings['track_strings'])): ?>checked="checked"<?php endif ?> />
                                        <?php _e('Track where strings appear on the site', 'wpml-string-translation'); ?></label>
                                        <p><a href="https://wpml.org/?p=9073"><?php _e('Performance considerations', 'wpml-string-translation') ?>&nbsp;&raquo;</a></p>
                                        </li>
                                        <li>
                                            <?php

                                           $hl_color_default = '#FFFF00';
																					 $hl_color = !empty($string_settings['hl_color']) ? $string_settings['hl_color'] : $hl_color_default;
                                           $hl_color_label    = __( 'Highlight color for strings', 'wpml-string-translation' );
                                           $color_picker_args = array(
                                               'input_name_group' => 'icl_st',
                                               'input_name_id' => 'hl_color',
                                               'default' => $hl_color_default,
                                               'value' => $hl_color,
                                               'label' => $hl_color_label,
                                           );

                                           $wpml_color_picker = new WPML_Color_Picker($color_picker_args);

                                           echo $wpml_color_picker->get_current_language_color_selector_control();

                                           ?>
                                        </li>
                                    </ul>
                                    <p>
                                    <input class="button-secondary" type="submit" name="iclt_st_save" value="<?php _e('Apply', 'wpml-string-translation')?>" />
                                    <span class="icl_ajx_response" id="icl_ajx_response2" style="display:inline"></span>
                                    </p>
                                </form>

                            </div>
                        </div>

                        <div id="dashboard_wpml_stsel_1.5" class="postbox">
                            <div class="handlediv" title="<?php echo __('Click to toggle', 'wpml-string-translation'); ?>">
                                <br/>
                            </div>
                            <h3 class="hndle">
                                <span><?php echo __('Auto register strings for translation', 'wpml-string-translation')?></span>
                            </h3>
                            <div class="inside">
                                <p class="sub"><?php echo __('WPML can automatically register strings for translation. This allows you to translate user-generated content with minimal PHP code.', 'wpml-string-translation')?></p>
                                <form id="icl_st_ar_form" name="icl_st_ar_form" method="post" action="">
                                <?php wp_nonce_field('icl_st_ar_form_nonce', '_icl_nonce') ?>
                                    <p class="icl_form_errors" style="display:none"></p>
                                    <ul>
                                        <li>
                                        <label>
                                            <input type="radio" class="icl_auto_reg_type" name="icl_auto_reg_type" value="disable" <?php if($string_settings['icl_st_auto_reg'] == 'disable'):?>checked="checked"<?php endif?> />
                                            <?php echo __('Disable auto-register strings', 'wpml-string-translation') ?>
                                        </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" class="icl_auto_reg_type" name="icl_auto_reg_type" value="auto-admin" <?php if(!$string_settings['icl_st_auto_reg'] || $string_settings['icl_st_auto_reg'] == 'auto-admin'):?>checked="checked"<?php endif?> />
                                                <?php echo __('Auto-register strings only when logged in as an administrator', 'wpml-string-translation') ?>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" class="icl_auto_reg_type" name="icl_auto_reg_type" value="auto-always" <?php if($string_settings['icl_st_auto_reg'] == 'auto-always'):?>checked="checked"<?php endif?> />
                                                <?php echo __('Auto-register strings always', 'wpml-string-translation') ?>
                                            </label>

	                                        <p id="auto_register_notes" style="display: none;">
		                                        <?php
		                                        $auto_register_notes = __( 'Auto-registration takes server resources. Read the %susage instructions%s to learn how to use it correctly while you are developing the site.', 'wpml-string-translation' );
		                                        $auto_register_notes = sprintf( $auto_register_notes, '<a href="http://wpml.org/documentation/getting-started-guide/string-translation/#auto-register-fe" target="_blank">', '</a>' );
		                                        echo __( $auto_register_notes, 'wpml-string-translation' )
		                                        ?>
	                                        </p>
                                        </li>
                                    </ul>
                                    <p>
                                    <input class="button-secondary" type="submit" name="iclt_auto_reg_apply" value="<?php echo __('Apply', 'wpml-string-translation')?>" />
                                    <span class="icl_ajx_response" id="icl_ajx_response3" style="display:inline"></span>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="postbox-container" style="width: 49%;">
                    <div id="normal-sortables-poie" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_wpml_st_poie" class="postbox">
                            <div class="handlediv" title="<?php echo __('Click to toggle', 'wpml-string-translation'); ?>">
                                <br/>
                            </div>
                            <h3 class="hndle">
                                <span><?php echo __('Import / export .po', 'wpml-string-translation')?></span>
                            </h3>
                            <div class="inside">
                                <h5><?php echo __('Import', 'wpml-string-translation')?></h5>
                                <form id="icl_st_po_form" action="" name="icl_st_po_form" method="post" enctype="multipart/form-data">
                                    <?php wp_nonce_field('icl_po_form') ?>
                                    <p class="sub">
                                         <label for="icl_po_file"><?php echo __('.po file:', 'wpml-string-translation')?></label>
                                        <input id="icl_po_file" class="button primary" type="file" name="icl_po_file" />
                                    </p>
                                    <p class="sub" style="line-height:2.3em">
                                        <input type="checkbox" name="icl_st_po_translations" id="icl_st_po_translations" />
                                        <label for="icl_st_po_translations"><?php echo __('Also create translations according to the .po file', 'wpml-string-translation')?></label>
                                        <select name="icl_st_po_language" id="icl_st_po_language" style="display:none">
                                        <?php foreach($active_languages as $al): if($al['code']==$string_settings['strings_language']) continue; ?>
                                        <option value="<?php echo $al['code'] ?>"><?php echo $al['display_name'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </p>
                                    <p class="sub" style="line-height:2.3em"    >
                                        <?php echo __('Select what the strings are for:', 'wpml-string-translation');?>
                                        <?php if(!empty($available_contexts)): ?>

                                        &nbsp;&nbsp;
                                        <span>
                                        <select name="icl_st_i_context">
                                            <option value="">-------</option>
                                            <?php foreach($available_contexts as $v):?>
                                            <option value="<?php echo esc_attr($v)?>" <?php if($context_filter == $v ):?>selected="selected"<?php endif;?>><?php echo $v; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <a href="#" onclick="var __nxt = jQuery(this).parent().next(); jQuery(this).prev().val(''); jQuery(this).parent().fadeOut('fast',function(){__nxt.fadeIn('fast')});return false;"><?php echo __('new','wpml-string-translation')?></a>
                                        </span>
                                        <?php endif; ?>
                                        <span <?php if(!empty($available_contexts)):?>style="display:none"<?php endif ?>>
                                        <input type="text" name="icl_st_i_context_new" />
                                        <?php if(!empty($available_contexts)):?>
                                        <a href="#" onclick="var __prv = jQuery(this).parent().prev(); jQuery(this).prev().val(''); jQuery(this).parent().fadeOut('fast',function(){__prv.fadeIn('fast')});return false;"><?php echo __('select from existing','wpml-string-translation')?></a>
                                        <?php endif ?>
                                        </span>
                                    </p>

                                    <p>
                                    <input class="button" name="icl_po_upload" id="icl_po_upload" type="submit" value="<?php echo __('Submit', 'wpml-string-translation')?>" />
                                    <span id="icl_st_err_domain" class="icl_error_text" style="display:none"><?php echo __('Please enter a context!', 'wpml-string-translation')?></span>
                                    <span id="icl_st_err_po" class="icl_error_text" style="display:none"><?php echo __('Please select the .po file to upload!', 'wpml-string-translation')?></span>
                                    </p>

                                </form>
                                <?php if(!empty($icl_contexts)):?>
                                <h5><?php echo __('Export strings into .po/.pot file', 'wpml-string-translation')?></h5>
	                            <?php
	                            if ( version_compare( WPML_ST_VERSION, '2.2', '<=' ) ) {
	                            	?>
	                            	<div class="below-h2 error">
	                            		<?php echo __( 'PO export may be glitchy. We are working to fix it.', 'wpml-string-translation' ); ?>
	                            	</div>
	                            <?php
	                            }
	                            ?>
                                <form method="post" action="">
                                <?php wp_nonce_field('icl_po_export') ?>
                                <p>
                                    <?php echo __('Select context:', 'wpml-string-translation')?>
                                    <select name="icl_st_e_context" id="icl_st_e_context">
                                        <?php foreach($icl_contexts as $v):?>
                                        <option value="<?php echo esc_attr($v->context)?>" <?php if($context_filter == $v->context ):?>selected="selected"<?php endif;?>><?php echo $v->context . ' ('.$v->c.')'; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                               </p>
                               <p style="line-height:2.3em">
                                    <input type="checkbox" name="icl_st_pe_translations" id="icl_st_pe_translations" checked="checked" value="1" onchange="if(jQuery(this).attr('checked'))jQuery('#icl_st_e_language').fadeIn('fast'); else jQuery('#icl_st_e_language').fadeOut('fast')" />
                                    <label for="icl_st_pe_translations"><?php echo __('Also include translations', 'wpml-string-translation')?></label>
                                    <select name="icl_st_e_language" id="icl_st_e_language">
                                    <?php foreach($active_languages as $al): if($al['code']==$string_settings['strings_language']) continue; ?>
                                    <option value="<?php echo $al['code'] ?>"><?php echo $al['display_name'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </p>
                                <p><input type="submit" class="button-secondary" name="icl_st_pie_e" value="<?php echo __('Submit', 'wpml-string-translation')?>" /></p>
                                <?php endif ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="postbox-container" style="width: 49%;">
                    <div id="normal-sortables-moreoptions" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_wpml_st_poie" class="postbox">
                            <div class="handlediv" title="<?php echo __('Click to toggle', 'wpml-string-translation'); ?>">
                                <br/>
                            </div>
                            <h3 class="hndle">
                                <span><?php echo __('More options', 'wpml-string-translation')?></span>
                            </h3>
                            <div class="inside">
                                <form id="icl_st_more_options" name="icl_st_more_options" method="post">
                                <?php wp_nonce_field('icl_st_more_options_nonce', '_icl_nonce') ?>
                                <div>
                                    <?php
                                    $editable_roles = get_editable_roles();
                                    if(!isset($string_settings['translated-users'])) $string_settings['translated-users'] = array();

                                    $tnames = array();
                                    foreach($editable_roles as $role => $details){
                                        if(in_array($role, $string_settings['translated-users'])){
                                            $tnames[] = translate_user_role($details['name'] );
                                        }
                                    }

                                    $tustr = '<span id="icl_st_tusers_list">';
                                    if(!empty($tnames)){
                                        $tustr .= join(', ' , array_map('translate_user_role', $tnames));
                                    }else{
                                        $tustr = __('none', 'wpml-string-translation');
                                    }
                                    $tustr .= '</span>';
                                    $tustr .= '&nbsp;&nbsp;<a href="#" onclick="jQuery(\'#icl_st_tusers\').slideToggle();return false;">' . __('edit', 'wpml-string-translation') . '</a>';

                                    ?>
                                    <?php printf(__('Translating users of types: %s', 'wpml-string-translation'), $tustr); ?>


                                    <div id="icl_st_tusers" style="padding:6px;display: none;">
                                    <?php
                                    foreach ( $editable_roles as $role => $details ) {
                                        $name = translate_user_role($details['name'] );
                                        $checked = in_array($role, (array)$string_settings['translated-users']) ? ' checked="checked"' : '';
                                        ?>
                                        <label><input type="checkbox" name="users[<?php echo $role ?>]" value="1"<?php echo $checked ?>/>&nbsp;<span><?php echo $name ?></span></label>&nbsp;
                                        <?php
                                    }
                                    ?>
                                    </div>

                                </div>

                                <p class="submit">
                                    <input class="button-secondary" type="submit" value="<?php esc_attr_e('Apply', 'wpml-string-translation') ?>" />
                                    <span class="icl_ajx_response" id="icl_ajx_response4" style="display:inline"></span>
                                </p>

                                </form>



                            </div>
                    </div>
                </div>

            </div>
        </div>

        <br clear="all" /><br />

        <a href="admin.php?page=<?php echo WPML_ST_FOLDER ?>/menu/string-translation.php&amp;trop=1"><?php _e('Translate texts in admin screens &raquo;', 'wpml-string-translation'); ?></a>

    <?php endif; //if(current_user_can('manage_options') ?>

    <?php endif; ?>

    <?php do_action('icl_menu_footer'); ?>

</div>
