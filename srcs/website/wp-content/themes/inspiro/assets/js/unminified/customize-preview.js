/* global inspiroCustomizePreview, jQuery */

/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

/**
 * Build <style> tag.
 *
 * @since 1.3.0
 *
 * @param {wp.customize} control The WordPress Customize API control.
 * @param {string} value The control value.
 * @param {string} cssProperty The CSS property.
 */
function inspiroBuildStyleTag(control, value, cssProperty) {
	let style = '';
	let selector = '';
	let hasMediaQuery = false;

	let fakeControl = control.replace('-' + cssProperty, '');
	fakeControl = 'typo-' + fakeControl;

	const mediaQuery = control + '-media';
	if (mediaQuery in inspiroCustomizePreview.selectors) {
		hasMediaQuery = true;
	}

	if (fakeControl in inspiroCustomizePreview.selectors) {
		if (hasMediaQuery) {
			selector += inspiroCustomizePreview.selectors[mediaQuery] + '{';
		}
		selector += inspiroCustomizePreview.selectors[fakeControl];

		if (cssProperty === 'font-size') {
			value += 'px';
		}

		// Build <style>.
		style =
			'<style id="' +
			control +
			'-' +
			cssProperty +
			'">' +
			selector +
			' { ' +
			cssProperty +
			': ' +
			value +
			' }' +
			(hasMediaQuery ? ' }' : '') +
			'</style>';
	}

	return style;
}

(function ($) {
	// General section
	wp.customize('color_general_h_tags', function (value) {
		value.bind(function (to) {
			if (to !== '') {
				// Apply the selected color to heading tags
				$('h1, h2, h3, h4, h5, h6').css({
					color: to,
				});
			} else {
				// Clear the color to revert to the default
				$('h1, h2, h3, h4, h5, h6').css({
					color: '', // This resets the color to default
				});
			}
		});
	});
	// deactivated at the moment
	// wp.customize('color_general_page_title', function (value) {
	// 	value.bind(function (to) {
	// 		if (to !== '') {
	// 			// Apply the selected color to heading tags
	// 			$('.page-title').css({
	// 				color: to,
	// 			});
	// 		} else {
	// 			// Clear the color to revert to the default
	// 			$('.page-title').css({
	// 				color: to,
	// 			});
	// 		}
	// 	});
	// });

	wp.customize('color_general_entry_excerpt_text', function (value) {
		value.bind(function (to) {
			if (to !== '') {
				// Apply the selected color to heading tags
				$('.entry-summary > p').css({
					color: to,
				});
			} else {
				// Clear the color to revert to the default
				$('.entry-summary > p').css({
					color: to,
				});
			}
		});
	});
	wp.customize('color_general_entry_content_text', function (value) {
		value.bind(function (to) {
			if (to !== '') {
				// Apply the selected color to heading tags
				$('.entry-content > p').css({
					color: to,
				});
			} else {
				// Clear the color to revert to the default
				$('.entry-content > p').css({
					color: to,
				});
			}
		});
	});

	// Header section
	// sticky header background color
	wp.customize('color-menu-background-scroll', function (value) {
		value.bind(function (to) {
			if (to === 'blank') { // restore to default
				$('.headroom--not-top .navbar').css({
					background: 'rgba(0,0,0,.9)',
				});
			} else {
				$('.headroom--not-top .navbar').css({
					background: to,
				});
			}
		});
	});
	// custom logo text content
	wp.customize('custom_logo_text', function (value) {
		value.bind(function (to) {
			$('.site-header .custom-logo-text').text(to);
		});
	});
	// custom logo text color
	wp.customize('color_header_custom_logo_text', function (value) {
		value.bind(function (to) {
			$('a.custom-logo-text').css('color', to);
		});
	});
	// wp.customize('color_header_custom_logo_hover_text', function (value) {
	// 	value.bind(function (tocolor_header_custom_logo_hover_text {
	// 		$('a.custom-logo-text').css('color', to);
	// 	});
	// });
	// header background
	// wp.customize( 'color_menu_background', function ( value ) {
	// 	// value.bind(function (to) {
	// 	// 	$('.navbar').css('background-color', to);
	// 	// });
	//
	// 	// seems this option to change header text color was for another option
	// 	value.bind( function ( to ) {
	// 		if ( 'blank' === to ) {
	// 			$( '.navbar' ).css( {
	// 				color: '#101010',
	// 			} );
	// 		} else {
	// 			$( '.navbar' ).css( {
	// 				color: to,
	// 			} );
	// 		}
	// 	} );
	// } );
	wp.customize('header_search_show', function (value) {
		value.bind(function (to) {
			if (to === true) {
				$('.sb-search').css('display', 'block');
			} else if (to === false) {
				$('.sb-search').css('display', 'none');
			}
		});
	});
	wp.customize('color_menu_hamburger_btn', function (value) {
		value.bind(function (to) {
			$('.navbar-toggle .icon-bar').css('background', to);
		});
	});

	// Hero section - Site title and description
	wp.customize('hero_enable', function (value) {
		value.bind(function (to) {
			if (to === true) {
				$('.custom-header').css('display', 'block');
				$(document.body).addClass('has-header-image');
			} else if (to === false) {
				$('.custom-header').css('display', 'none');
				$(document.body).removeClass('has-header-image');
			}
		});
	});
	wp.customize('header_site_title', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('header_site_description', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});
	wp.customize('header_button_title', function (value) {
		value.bind(function (to) {
			if (to === '') {
				$('.custom-header-button').css('display', 'none');
			} else {
				$('.custom-header-button')
					.css('display', 'inline-block')
					.text(to);
			}
		});
	});
	// work with overlay option
	wp.customize('overlay_show', function (value) {
		value.bind(function (to) {
			if (to === true) {
				$(
					'.has-header-image .custom-header-media, .has-header-video .custom-header-media'
				).removeClass('hide_overlay');
			} else if (to === false) {
				$(
					'.has-header-image .custom-header-media, .has-header-video .custom-header-media'
				).addClass('hide_overlay');
			}
		});
	});
	// hero text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.site-title, .site-description').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
				// Add class for different logo styles if title and description are hidden.
				$('body').addClass('title-tagline-hidden');
			} else {
				// Check if the text color has been removed and use default colors in theme stylesheet.
				if (!to.length) {
					$('#inspiro-custom-header-styles').remove();
				}
				$('.site-title, .site-description').css({
					clip: 'auto',
					position: 'relative',
				});
				$(
					'.site-branding-text, .site-branding-text a, .site-description, .site-description a'
				).css({
					color: to,
				});
				// Add class for different logo styles if title and description are visible.
				$('body').removeClass('title-tagline-hidden');
			}
		});
	});
	// hero button text color
	wp.customize('header_button_textcolor', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.custom-header-button').css({
					color: '#ffffff',
				});
			} else {
				$('.custom-header-button').css({
					color: to,
					borderColor: to,
				} );
			}
		});
	});
	// hero arrow color
	// improve in future
	// wp.customize('color_scroll_to_content_arrow', function (value) {
	// 	value.bind(function (to) {
	// 		if (to === 'blank') {
	// 			$('#scroll-to-content:before').css({
	// 				borderColor: '#ffffff',
	// 			});
	// 		} else {
	// 			$('#scroll-to-content:before').css({
	// 				borderColor: to,
	// 			} );
	// 		}
	// 	});
	// });

	// Sidebar widgets section
	wp.customize('color_sidebar_widgets_background', function (value) {
		value.bind(function (to) {
			$('.side-nav__scrollable-container').css('background', to);
		});
	});
	wp.customize('color_sidebar_widgets_text', function (value) {
		value.bind(function (to) {
			$('.side-nav__scrollable-container').css('color', to);
		});
	});
	wp.customize('color_sidebar_widgets_title', function (value) {
		value.bind(function (to) {
			$('.side-nav h2.wp-block-heading, .side-nav .widget .title').css('color', to);
		});
	});
	wp.customize('color_sidebar_widgets_link', function (value) {
		value.bind(function (to) {
			$(':root :where(.side-nav__wrap a:where(:not(.wp-element-button)))').css('color', to);
		});
	});


	// Footer background
	wp.customize('color_footer_background', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.site-footer').css({
					background: '#101010',
				});
			} else {
				$('.site-footer').css({
					background: to,
				});
			}
		});
	});
	// footer text color
	wp.customize('color_footer_text', function (value) {
		value.bind(function (to) {
			if (to === 'blank') {
				$('.site-footer').css({
					color: '#78787f',
				});
			} else {
				$('.site-footer').css({
					color: to,
				});
			}
		});
	});
	// copyright text
	wp.customize('color_footer_copyright_text', function (value) {
		value.bind(function (to) {
			$('.site-footer .copyright span:first-child').css('color', to);
		});
	});

	// Color scheme
	wp.customize('colorscheme', function (value) {
		value.bind(function (to) {
			// Update color body class.
			$('body')
				.removeClass('colors-light colors-dark colors-custom')
				.addClass('colors-' + to);
		});
	});

	// Custom color hex.
	wp.customize('colorscheme_hex', function (value) {
		value.bind(function (to) {
			// Update custom color CSS.
			const style = $('#custom-theme-colors');
			const hex = style.data('hex');
			let css = style.html();

			css = css.replaceAll(hex, to);
			style.html(css).data('hex', to);
		});
	});

	// Whether a header image is available.
	function hasHeaderImage() {
		const image = wp.customize('header_image')();
		return '' !== image && 'remove-header' !== image;
	}

	// Whether a header video is available.
	function hasHeaderVideo() {
		const externalVideo = wp.customize('external_header_video')(),
			video = wp.customize('header_video')();

		return '' !== externalVideo || (0 !== video && '' !== video);
	}

	// Toggle a body class if a custom header exists.
	$.each(
		['external_header_video', 'header_image', 'header_video'],
		function (index, settingId) {
			wp.customize(settingId, function (setting) {
				setting.bind(function () {
					if (hasHeaderImage()) {
						$(document.body).addClass('has-header-image');
					} else {
						$(document.body).removeClass('has-header-image');
					}

					if (!hasHeaderVideo()) {
						$(document.body).removeClass('has-header-video');
					}
				});
			});
		}
	);

	$.each(
		[
			'body-font-family',
			'logo-font-family',
			'headings-font-family',
			'slider-title-font-family',
			'slider-text-font-family',
			'slider-button-font-family',
			'mainmenu-font-family',
			'mobilemenu-font-family',
		],
		function (__, control) {
			/**
			 * Generate Font Family CSS
			 *
			 * @since 1.3.0
			 * @see https://github.com/brainstormforce/astra/blob/663761d3419f25640af9b59e64384bd07f810bc4/assets/js/unminified/customizer-preview.js#L369
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					if (newValue in inspiroCustomizePreview.systemFonts) {
						newValue = inspiroCustomizePreview.systemFonts[newValue].stack;
					}
					const cssProperty = 'font-family';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					let link = '';

					let fontName = newValue.split(',')[0];
					// Replace ' character with space, necessary to separate out font prop value.
					fontName = fontName.replace(/'/g, '');

					// Remove <style> first!
					$('style#' + control + '-' + cssProperty).remove();

					if (fontName in inspiroCustomizePreview.googleFonts) {
						fontName = fontName.split(' ').join('+');

						// Remove old.
						$('link#' + control).remove();
						link =
							'<link id="' +
							control +
							'" href="https://fonts.googleapis.com/css?family=' +
							fontName +
							'" rel="stylesheet">';
					}

					// Concat and append new <style> and <link>.
					$('head').append(style + link);
				});
			});
		}
	);

	$.each(
		[
			'body-font-weight',
			'logo-font-weight',
			'headings-font-weight',
			'slider-title-font-weight',
			'slider-text-font-weight',
			'slider-button-font-weight',
			'mainmenu-font-weight',
			'mobilemenu-font-weight',
		],
		function (__, control) {
			/**
			 * Generate Font Weight CSS
			 *
			 * @since 1.3.0
			 * @see https://github.com/brainstormforce/astra/blob/663761d3419f25640af9b59e64384bd07f810bc4/assets/js/unminified/customizer-preview.js#L409
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'font-weight';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					const fontControl = control.replace(
						'font-weight',
						'font-family'
					);
					let link = '';

					if (newValue) {
						let fontName =
							wp.customize._value[fontControl]._value;
						fontName = fontName.split(',');
						fontName = fontName[0].replace(/'/g, '');

						// Remove old.
						$('style#' + control + '-' + cssProperty).remove();

						if (fontName in inspiroCustomizePreview.googleFonts) {
							// Remove old.
							$('#' + fontControl).remove();

							if (newValue === 'inherit') {
								link =
									'<link id="' +
									fontControl +
									'" href="https://fonts.googleapis.com/css?family=' +
									fontName +
									'"  rel="stylesheet">';
							} else {
								link =
									'<link id="' +
									fontControl +
									'" href="https://fonts.googleapis.com/css?family=' +
									fontName +
									'%3A' +
									newValue +
									'"  rel="stylesheet">';
							}
						}

						// Concat and append new <style> and <link>.
						$('head').append(style + link);
					} else {
						// Remove old.
						$('style#' + control).remove();
					}
				});
			});
		}
	);

	$.each(
		[
			'body-font-size',
			'logo-font-size',
			'headings-font-size',
			'slider-title-font-size',
			'slider-text-font-size',
			'slider-button-font-size',
			'mainmenu-font-size',
			'mobilemenu-font-size',
		],
		function (__, control) {
			/**
			 * Generate Font Size CSS
			 *
			 * @since 1.3.0
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'font-size';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					// Remove old.
					$('style#' + control + '-' + cssProperty).remove();

					$('head').append(style);
				});
			});
		}
	);

	$.each(
		[
			'body-text-transform',
			'logo-text-transform',
			'headings-text-transform',
			'slider-title-text-transform',
			'slider-text-text-transform',
			'slider-button-text-transform',
			'mainmenu-text-transform',
			'mobilemenu-text-transform',
		],
		function (__, control) {
			/**
			 * Generate Text Transform CSS
			 *
			 * @since 1.3.0
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'text-transform';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					// Remove old.
					$('style#' + control + '-' + cssProperty).remove();

					$('head').append(style);
				});
			});
		}
	);

	$.each(
		[
			'body-line-height',
			'logo-line-height',
			'headings-line-height',
			'slider-title-line-height',
			'slider-text-line-height',
			'slider-button-line-height',
			'mainmenu-line-height',
			'mobilemenu-line-height',
		],
		function (__, control) {
			/**
			 * Generate Line Height CSS
			 *
			 * @since 1.3.0
			 */
			wp.customize(control, function (value) {
				value.bind(function (newValue) {
					const cssProperty = 'line-height';
					const style = inspiroBuildStyleTag(
						control,
						newValue,
						cssProperty
					);
					// Remove old.
					$('style#' + control + '-' + cssProperty).remove();
					$('head').append(style);
				});
			});
		}
	);
})(jQuery);
