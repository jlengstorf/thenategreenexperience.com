<?php

namespace NGE\Custom\OptIn;

function get_markup( $class = '', $button_text = 'Sign Up' ) {
  if (empty($button_text)) {
    $button_text = 'Sign Up';
  }

  ob_start();
?>
<script src="https://app.convertkit.com/assets/CKJS4.js?v=21" async></script>
<div class="opt-in <?= $class ?>">
  <form id="ck_subscribe_form" class="opt-in__form ck_subscribe_form" method="POST"
        action="https://app.convertkit.com/landing_pages/72762/subscribe"
        data-remote="true">
    <div class="opt-in__error ck_errorArea">
      <div id="ck_error_msg" style="display:none">
        <p>There was an error submitting your subscription. Please try again.</p>
      </div>
    </div>
    <div class="opt-in__input-group">
      <label for="ck_firstNameField" class="opt-in__label ck_label name">
        First Name
      </label>
      <input type="text" id="ck_firstNameField" name="first_name"
             class="opt-in__input opt-in__input--text ck_first_name"
             placeholder="First Name" required>
    </div>
    <div class="opt-in__input-group">
      <label for="ck_emailField" class="opt-in__label ck_label email">
        Email Address
      </label>
      <input type="email" id="ck_emailField" name="email"
             class="opt-in__input opt-in__input--email ck_email_address"
             placeholder="Email Address" required>
    </div>
    <button class="subscribe_button ck_subscribe_button button fields opt-in__submit"
            id="ck_subscribe_button"><?= $button_text ?></button>
    <input type="hidden"
           value="{&quot;form_style&quot;:&quot;naked&quot;,&quot;embed_style&quot;:&quot;inline&quot;,&quot;embed_trigger&quot;:&quot;scroll_percentage&quot;,&quot;scroll_percentage&quot;:&quot;70&quot;,&quot;delay_seconds&quot;:&quot;10&quot;,&quot;display_position&quot;:&quot;br&quot;,&quot;display_devices&quot;:&quot;all&quot;,&quot;days_no_show&quot;:&quot;15&quot;,&quot;converted_behavior&quot;:&quot;show&quot;}" id="ck_form_options">
    <input type="hidden" name="id" value="72762" id="landing_page_id">
  </form>
  <div class="opt-in__privacy">
    <p class="opt-in__privacy-text">
      I’ll never share your info. Because I’m not a dick.
    </p>
  </div>
</div>
<?php
  return ob_get_clean();
}
