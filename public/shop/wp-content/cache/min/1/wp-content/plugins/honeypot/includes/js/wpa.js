var wpa_field_name,wpa_unique_id,wpa_add_test,wpa_hidden_field;jQuery(document).ready(function(){wpa_field_name=wpa_field_info.wpa_field_name;wpa_unique_id=wpa_field_info.wpa_field_value;wpa_add_test=wpa_field_info.wpa_add_test;wpa_hidden_field="<span class='wpa_hidden_field' style='display:none;height:0;width:0;'><input type='text' name='"+wpa_field_name+"' value='"+wpa_unique_id+"' /></span>";wpa_add_honeypot_field();if(typeof wpae_add_honeypot_field=='function'){wpae_add_honeypot_field()}
if(wpa_add_test=='yes'){wpa_add_test_block()}});function wpa_act_as_spam(){actiontype=jQuery('span.wpa-button').data('actiontype');if(actiontype=='remove'){wpa_remove_honeypot_field();jQuery('span.wpa-button').data('actiontype','add');jQuery('span.wpa-button').html('Acting as Spam Bot')}else{wpa_add_honeypot_field();jQuery('span.wpa-button').data('actiontype','remove');jQuery('span.wpa-button').html('Act as Spam Bot')}}
function wpa_add_honeypot_field(){jQuery('.bbp-topic-form form').append(wpa_hidden_field);jQuery('.bbp-reply-form form').append(wpa_hidden_field);jQuery('form#commentform').append(wpa_hidden_field);jQuery('form#ast-commentform').append(wpa_hidden_field);jQuery('form#fl-comment-form').append(wpa_hidden_field);jQuery('form.wpcf7-form').append(wpa_hidden_field);jQuery('form.wpforms-form').append(wpa_hidden_field);jQuery('.gform_wrapper form').append(wpa_hidden_field);jQuery('.frm_forms form').append(wpa_hidden_field);jQuery('.caldera-grid form').append(wpa_hidden_field);jQuery('.wp-block-toolset-cred-form form').append(wpa_hidden_field);jQuery('form.et_pb_contact_form').append(wpa_hidden_field);jQuery('form.elementor-form').append(wpa_hidden_field);jQuery('form.form-contribution').append(wpa_hidden_field);jQuery('form.frm-fluent-form').append(wpa_hidden_field);jQuery('.ff_conv_app').append(wpa_hidden_field);if(typeof fluent_forms_global_var_1!=='undefined'){fluent_forms_global_var_1.extra_inputs[wpa_field_name]=wpa_unique_id}
jQuery(wpa_hidden_field).insertAfter('input.wpa_initiator')}
function wpa_add_test_block(){checkingTest='<div class="wpa-test-msg"><strong>WP Armour ( Only visible to site administrators. Not visible to other users. )</strong><br />This form has a honeypot trap enabled. If you want to act as spam bot for testing purposes, please click the button below.<br/><span class="wpa-button" onclick="wpa_act_as_spam()" data-actiontype="remove">Act as Spam Bot</span></div>';jQuery('.wpa-test-msg').remove();jQuery('span.wpa_hidden_field').after(checkingTest)}
function wpa_remove_honeypot_field(){jQuery('.wpa_hidden_field').remove();if(typeof fluent_forms_global_var_1!=='undefined'){delete fluent_forms_global_var_1.extra_inputs[wpa_field_name]}}