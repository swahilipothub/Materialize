<!-- BEGIN MENU -->
jQuery('.materialize-menu-button-wrapper').on('touchstart click', function(e) {
'use strict';
	e.preventDefault();
		if(jQuery('.materialize-background-color').hasClass('materialize-background-color-active'))
		{
			/* hide main wrapper */
			jQuery('.materialize-main-wrapper').removeClass('materialize-main-wrapper-active');
			/* hide background color */
			jQuery('.materialize-background-color').removeClass('materialize-background-color-active');
			/* hide background image */
			jQuery('.materialize-background-image').removeClass('materialize-background-image-active');
			/* hide expanded menu button */
			jQuery('.materialize-menu-button-wrapper').removeClass('materialize-menu-active');
			/* hide menu */
			jQuery('.materialize-menu').removeClass('materialize-menu-active');
		} else {
			/* show main wrapper */
			jQuery('.materialize-main-wrapper').addClass('materialize-main-wrapper-active');
			/* show background color */
			jQuery('.materialize-background-color').addClass('materialize-background-color-active');
			/* show background image */
			jQuery('.materialize-background-image').addClass('materialize-background-image-active');
			/* show expanded menu button */
			jQuery('.materialize-menu-button-wrapper').addClass('materialize-menu-active');
			/* show menu */
			jQuery('.materialize-menu').addClass('materialize-menu-active');
		}
});
<!-- END MENU -->

<!-- BEGIN HIDE MENU WHEN ESC BUTTON PRESSED -->
jQuery(document).keyup(function(e) {
	if (e.keyCode == 27) { 

		/* hide main wrapper */
		jQuery('.materialize-main-wrapper').removeClass('materialize-main-wrapper-active');
		/* hide background color */
		jQuery('.materialize-background-color').removeClass('materialize-background-color-active');
		/* hide background image */
		jQuery('.materialize-background-image').removeClass('materialize-background-image-active');
		/* hide expanded menu button */
		jQuery('.materialize-menu-button-wrapper').removeClass('materialize-menu-active');
		/* hide menu */
		jQuery('.materialize-menu').removeClass('materialize-menu-active');

		return false;

	}
});
<!-- END HIDE MENU WHEN ESC BUTTON PRESSED -->

<!-- BEGIN SHOW SEARCH FORM -->
jQuery('.materialize-search-button, .materialize-search-button-right').on('touchstart click', function(e) {
'use strict';
	e.preventDefault();
		if(jQuery('.materialize-search-wrapper').hasClass('materialize-search-wrapper-active'))
		{
			/* hide search field */
			jQuery('.materialize-search-wrapper').removeClass('materialize-search-wrapper-active');
			jQuery('.materialize-search-wrapper #searchform #s').blur();
		} else {
			/* show search field */
			setTimeout(function(){
				jQuery('.materialize-search-wrapper').addClass('materialize-search-wrapper-active');
			},100);
			/* focus search field */
			jQuery('.materialize-search-wrapper #searchform #s').focus();
		}
});
<!-- END SHOW SEARCH FORM -->

<!-- BEGIN HIDE SEARCH FORM -->
jQuery('.materialize-search-close-icon').on('touchstart click', function(e) {
'use strict';
	e.preventDefault();		
		/* hide search field */
		jQuery('.materialize-search-wrapper').removeClass('materialize-search-wrapper-active');
		jQuery('.materialize-search-wrapper #searchform #s').blur();
});
<!-- END HIDE SEARCH FORM -->

<!-- BEGIN REMOVE MENU DESCRIPTION DIV IF NO DESCRIPTION ENTERED -->
jQuery(document).ready(function() {
'use strict';
	jQuery('.materialize-menu-item-description:empty').remove();
});
<!-- END REMOVE MENU DESCRIPTION DIV IF NO DESCRIPTION ENTERED -->