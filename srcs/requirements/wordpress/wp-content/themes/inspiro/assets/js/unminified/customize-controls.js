/* global jQuery */

/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hex control and informs the preview
 * when users open or close the front page sections section.
 */

(function (api, $) {
	api.bind('ready', function () {
		// Only show the color hex control when there's a custom color scheme.
		api('colorscheme', function (setting) {
			api.control('colorscheme_hex', function (control) {
				const visibility = function () {
					if ('custom' === setting.get()) {
						control.container.slideDown(180);
					} else {
						control.container.slideUp(180);
					}
				};

				visibility();
				setting.bind(visibility);
			});
		});

		/**
		 * Display checkbox field for Full Height video iframe on mobile when input has value.
		 *
		 * @since 1.4.0
		 */
		api('external_header_video', function (setting) {
			api.control(
				'external_header_video_full_height',
				function (control) {
					const visibility = function () {
						if ('' !== setting.get()) {
							control.container.slideDown(180);
						} else {
							control.container.slideUp(180);
						}
					};
					visibility();
					setting.bind(visibility);
				}
			);
		});

		/**
		 * Hide external video settings if self-hosted video is uploaded.
		 *
		 * @since 1.4.0
		 */
		api('header_video', function (setting) {
			const videoSettingControls = [
				'external_header_video',
				'external_header_video_full_height',
			];
			$.each(videoSettingControls, function (_, controlId) {
				api.control(controlId, function (control) {
					const visibility = function () {
						if (parseInt(setting.get()) > 0) {
							control.container.slideUp(180);
						} else {
							control.container.slideDown(180);
						}
					};
					visibility();
					setting.bind(visibility);
				});
			});
		});


		/**
		 * Work with copyright TinyMCE editor settings
		 *
		 * @since 1.4.0
		 */
		// Use the TinyMCE editor initialization event
		$(document).on('tinymce-editor-init', function (event, editor) {
			// TODO: needs improvements with error checking, different methods for Text and Visual content editor
			// setup data
			const controlId = 'footer_copyright_editor';
			const settingId = 'footer_copyright_text_setting';

			// check id
			if (editor.id === controlId) {

				// Add a listener for the 'input' event for real-time changes
				// logic for Visual edit type
				editor.on('change', function (e) {
					let content = editor.getContent();

					// Set the value of the setting in the Customizer
					api(settingId).set(content);

					// Trigger a live preview update with the new content
					api.previewer.refresh();
				});

				// logic for Text edit type
				document.getElementById(controlId).addEventListener('input', function () {

					let content = document.getElementById('footer_copyright_editor').value

					// Set the value of the setting in the Customizer
					api(settingId).set(content);

					// Trigger a live preview update with the new content
					api.previewer.refresh();
				});
			}
		});
	}); // end api bind

	// Extends our custom "upgrade-pro" section.
	api.sectionConstructor['upgrade-pro'] = api.Section.extend({
		// No events for this type of section.
		attachEvents() {
		},

		// Always make the section active.
		isContextuallyActive() {
			return true;
		},
	});

	api.controlConstructor['inspiro-range'] = api.Control.extend({
		ready() {
			const control = this,
				$input = this.container.find('.inspiro-control-range-value'),
				$slider = this.container.find('.inspiro-control-range');

			$slider.on('input change keyup', function () {
				$input.val($(this).val()).trigger('change');
			});

			if (control.setting() === '') {
				$slider.val(parseFloat($slider.attr('min')));
			}

			$input.on('change keyup', function () {
				const value = $(this).val();
				control.setting.set(value);
				if (value) {
					$slider.val(parseFloat(value));
				} else {
					$slider.val(parseFloat($slider.attr('min')));
				}
			});

			// Update the slider if the setting changes.
			control.setting.bind(function (value) {
				$slider.val(parseFloat(value));
			});
		},
	});

	api.controlConstructor['inspiro-alpha-color-picker'] = api.Control.extend({
		ready: function () {
			var control = this,
				$container = control.container.find('.zoom-color-picker-container'),
				$input = $('input.zoom-alpha-color-picker', $container);

			$input.alphaColorPicker();
		}
	});


	// Accordion UI Control class
	// todo: script changes, improvements
	api.neveHeadingAccordion = {
		init: function () {
			this.handleToggle();
		},
		handleToggle: function () {
			$('.header-accordion-section-ui-wrapper.accordion .inspiro-accordion-header-ui').on('click', function () {
				var accordion = $(this).closest('.accordion');
				$(accordion).toggleClass('expanded');
				return false;
			});
		},
	};

	$(document).ready(
		function () {
			api.neveHeadingAccordion.init();
		}
	);

})(wp.customize, jQuery);
