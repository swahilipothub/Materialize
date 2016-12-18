jQuery(document).ready(function ($) {
'use strict';
	/* add sub-menu arrow */
	$('.materialize-drawer ul li ul').before($('<span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><polygon id="arrow-24-icon" points="206.422,462 134.559,390.477 268.395,256 134.559,121.521 206.422,50 411.441,256 "/></svg></span>'));

	/* accordion */
	$(".menu > li > span, .sub-menu > li > span").on('touchstart click', function(e) {
	e.preventDefault();
		if (false == $(this).next().is(':visible')) {
			$(this).parent().siblings().find(".sub-menu").slideUp(300);
			$(this).siblings().find(".sub-menu").slideUp(300);
			$(this).parent().siblings().find("span").removeClass("materialize-submenu-active");
		}
		$(this).next().slideToggle(300);
		$(this).toggleClass("materialize-submenu-active");
	})
	
	/* sub-menu arrow animation */
	$(".menu > li > span").on('touchstart click', function(e) {
	e.preventDefault();
		if($(".sub-menu > li > span").hasClass('materialize-submenu-active'))
			{
				$(".sub-menu > li > span").removeClass("materialize-submenu-active");
			}
	})

	/* accordion */
	$(".menu > li.menu-item-has-children > a, .sub-menu > li.menu-item-has-children > a").on('touchstart click', function(e) {
	e.preventDefault();
		if (false == $(this).next().next().is(':visible')) {
			$(this).parent().siblings().find(".sub-menu").slideUp(300);
			$(this).siblings().find(".sub-menu").slideUp(300);
			$(this).parent().siblings().find("span").removeClass("materialize-submenu-active");
		}
		$(this).next().next().slideToggle(300);
		$(this).next().toggleClass("materialize-submenu-active");
	})

	/* hover */
	$(".menu > li.menu-item-has-children > a, .sub-menu > li.menu-item-has-children > a").hover(
		function() {
			$(this).parent().addClass("full-item-svg-hover");
		},
		function() {
			$(this).parent().removeClass("full-item-svg-hover");
	});
	$(".menu > li > span, .sub-menu > li > span").hover(
		function() {
			$(this).parent().addClass("full-item-svg-hover");
		},
		function() {
			$(this).parent().removeClass("full-item-svg-hover");
	});
	
	/* sub-menu arrow animation */
	$(".menu > li.menu-item-has-children > a").on('touchstart click', function(e) {
	e.preventDefault();
		if($(".sub-menu > li > span").hasClass('materialize-submenu-active'))
			{
				$(".sub-menu > li > span").removeClass("materialize-submenu-active");
			}
	})
	
	/* close sub-menus when menu button clicked */
	$(".materialize-menu-button-wrapper").on('touchstart click', function(e) {
		if($(".menu > li > span, .sub-menu > li > span").hasClass('materialize-submenu-active'))
			{
				$(".menu > li").find(".sub-menu").slideUp(300);
				$(".menu > li > span, .sub-menu > li > span").removeClass("materialize-submenu-active");
			}
	})
	
});