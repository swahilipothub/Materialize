<!-- BEGIN HIDE MENU WHEN MENU ITEM CLICKED -->
jQuery('.materialize-drawer ul li a').not('.materialize-drawer ul li.menu-item-has-children > a').on('click', function(e) {
'use strict';
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
		}
});
<!-- END HIDE MENU WHEN MENU ITEM CLICKED -->