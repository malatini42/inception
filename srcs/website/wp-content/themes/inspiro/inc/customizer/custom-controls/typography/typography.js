/* global jQuery, inspiroCustomControl, InspiroFontFamilies */

/**
 * File typography.js
 *
 * Handles Typography of the site
 *
 * @see https://github.com/brainstormforce/astra/blob/master/inc/customizer/custom-controls/typography/typography.js
 */

( function ( $ ) {
	/* Internal shorthand */
	const api = wp.customize;

	/**
	 * Helper class for the main Customizer interface.
	 *
	 * @since 1.3.0
	 * @class InspiroTypography
	 */
	const InspiroTypography = {
		/**
		 * Initializes our custom logic for the Customizer.
		 *
		 * @since 1.3.0
		 * @function init
		 */
		init() {
			InspiroTypography._initFonts();
		},

		/**
		 * Initializes logic for font controls.
		 *
		 * @since 1.3.0
		 * @access private
		 * @function _initFonts
		 */
		_initFonts() {
			$( '.customize-control-inspiro-font-family select' ).each(
				function () {
					if (
						'undefined' !== typeof inspiroCustomControl.customizer
					) {
						const fonts =
							inspiroCustomControl.customizer.settings
								.google_fonts;
						const optionName = $( this ).data( 'name' );

						$( this ).html( fonts );

						// Set inherit option text defined in control parameters.
						$(
							"select[data-name='" +
								optionName +
								"'] option[value='inherit']"
						).text( $( this ).data( 'inherit' ) );

						const fontVal = $( this ).data( 'value' );

						$( this ).val( fontVal );
					}
				}
			);

			$( '.customize-control-inspiro-font-family select' ).each(
				InspiroTypography._initFont
			);
			// Added select2 for all font family & font variant.
			$(
				'.customize-control-inspiro-font-family select, .customize-control-inspiro-font-variant select'
			).selectWoo();

			$( '.customize-control-inspiro-font-variant select' ).on(
				'select2:unselecting',
				function ( e ) {
					const name = $( this ).data( 'name' ),
						variantSelect =
							$( this ).data( 'customize-setting-link' ) || name,
						unselectedValue = e.params.args.data.id || '';

					if ( unselectedValue ) {
						$( this )
							.find(
								'option[value="' + e.params.args.data.id + '"]'
							)
							.removeAttr( 'selected' );
						if ( null === $( this ).val() ) {
							api( variantSelect ).set( '' );
						}
					}
				}
			);
		},

		/**
		 * Initializes logic for a single font control.
		 *
		 * @since 1.3.0
		 * @access private
		 * @function _initFont
		 */
		_initFont() {
			const select = $( this ),
				name = select.data( 'name' ),
				link = select.data( 'customize-setting-link' ) || name,
				weight = select.data( 'connected-control' ),
				variant = select.data( 'connected-variant' );

			if (
				'undefined' !== typeof link &&
				'undefined' !== typeof weight
			) {
				api( link ).bind( InspiroTypography._fontSelectChange );
				InspiroTypography._setFontWeightOptions.apply( api( link ), [
					true,
				] );
			}

			if (
				'undefined' !== typeof link &&
				'undefined' !== typeof variant
			) {
				api( link ).bind( InspiroTypography._fontSelectChange );
				InspiroTypography._setFontVariantOptions.apply( api( link ), [
					true,
				] );
			}
		},

		/**
		 * Callback for when a font control changes.
		 *
		 * @since 1.3.0
		 * @access private
		 * @function _fontSelectChange
		 */
		_fontSelectChange() {
			const fontSelect = api
					.control( this.id )
					.container.find( 'select' ),
				variants = fontSelect.data( 'connected-variant' );

			InspiroTypography._setFontWeightOptions.apply( this, [ false ] );

			if ( 'undefined' !== typeof variants ) {
				InspiroTypography._setFontVariantOptions.apply( this, [
					false,
				] );
			}
		},

		/**
		 * Clean font name.
		 *
		 * Google Fonts are saved as {'Font Name', Category}. This function cleanes this up to retreive only the {Font Name}.
		 *
		 * @since  1.4.0
		 * @param  {string} fontValue Name of the font.
		 *
		 * @return {string}  Font name where commas and inverted commas are removed if the font is a Google Font.
		 */
		_cleanGoogleFonts( fontValue ) {
			// Bail if fontVAlue does not contain a comma.
			if ( ! fontValue.includes( ',' ) ) return fontValue;

			const splitFont = fontValue.split( ',' );
			const pattern = new RegExp( "'", 'gi' );

			// Check if the cleaned font exists in the Google fonts array.
			const googleFontValue = splitFont[ 0 ].replace( pattern, '' );
			if (
				'undefined' !==
				typeof InspiroFontFamilies.google[ googleFontValue ]
			) {
				fontValue = googleFontValue;
			}

			return fontValue;
		},

		/**
		 * Get font Weights.
		 *
		 * This function gets the font weights values respective to the selected fonts family{Font Name}.
		 *
		 * @since  1.4.0
		 * @param  {string} fontValue Name of the font.
		 *
		 * @return {string}  Available font weights for the selected fonts.
		 */
		_getWeightObject( fontValue ) {
			let weightObject = [ '400', '600' ];
			if ( fontValue === 'inherit' ) {
				weightObject = [
					'100',
					'200',
					'300',
					'400',
					'500',
					'600',
					'700',
					'800',
					'900',
				];
			} else if (
				'undefined' !== typeof InspiroFontFamilies.system[ fontValue ]
			) {
				weightObject = InspiroFontFamilies.system[ fontValue ].weights;
			} else if (
				'undefined' !== typeof InspiroFontFamilies.google[ fontValue ]
			) {
				weightObject = InspiroFontFamilies.google[ fontValue ][ 0 ];
				weightObject = Object.keys( weightObject ).map( function ( k ) {
					return weightObject[ k ];
				} );
			} else if (
				'undefined' !== typeof InspiroFontFamilies.custom[ fontValue ]
			) {
				weightObject = InspiroFontFamilies.custom[ fontValue ].weights;
			}

			return weightObject;
		},

		/**
		 * Sets the options for a font weight control when a
		 * font family control changes.
		 *
		 * @since 1.3.0
		 * @access private
		 * @function _setFontWeightOptions
		 * @param {boolean} init Whether or not we're initializing this font weight control.
		 */
		_setFontWeightOptions( init ) {
			const fontSelect = api
					.control( this.id )
					.container.find( 'select' ),
				weightKey = fontSelect.data( 'connected-control' ),
				weightSelect = api
					.control( weightKey )
					.container.find( 'select' ),
				currentWeightTitle = inspiroCustomControl.strings.inherit,
				inheritWeightObject = [ 'inherit' ],
				weightMap = inspiroCustomControl.font_weight;

			let selected = '',
				fontValue = this(),
				weightValue = init ? weightSelect.val() : '400',
				weightObject = [ '400', '600' ],
				weightOptions = '';

			if ( fontValue === 'inherit' ) {
				weightValue = init ? weightSelect.val() : 'inherit';
			}

			fontValue = InspiroTypography._cleanGoogleFonts( fontValue );
			weightObject = InspiroTypography._getWeightObject( fontValue );

			weightObject = $.merge( inheritWeightObject, weightObject );
			weightMap.inherit = currentWeightTitle;
			for ( let i = 0; i < weightObject.length; i++ ) {
				if (
					0 === i &&
					-1 === $.inArray( weightValue, weightObject )
				) {
					weightValue = weightObject[ 0 ];
					selected = ' selected="selected"';
				} else {
					selected =
						weightObject[ i ] === weightValue
							? ' selected="selected"'
							: '';
				}
				if ( ! weightObject[ i ].includes( 'italic' ) ) {
					weightOptions +=
						'<option value="' +
						weightObject[ i ] +
						'"' +
						selected +
						'>' +
						weightMap[ weightObject[ i ] ] +
						'</option>';
				}
			}

			weightSelect.html( weightOptions );

			if ( ! init ) {
				api( weightKey ).set( '' );
				api( weightKey ).set( weightValue );
			}
		},

		/**
		 * Sets the options for a font variant control when a
		 * font family control changes.
		 *
		 * @since 1.3.0
		 * @access private
		 * @function _setFontVariantOptions
		 * @param {boolean} init Whether or not we're initializing this font variant control.
		 */
		_setFontVariantOptions( init ) {
			let selected = '',
				fontValue = this(),
				weightValue = '',
				weightOptions = '';

			const fontSelect = api
					.control( this.id )
					.container.find( 'select' ),
				variants = fontSelect.data( 'connected-variant' ),
				variantSelect = api
					.control( variants )
					.container.find( 'select' ),
				variantSavedField = api
					.control( variants )
					.container.find( '.inspiro-font-variant-hidden-value' ),
				currentWeightTitle = variantSelect.data( 'inherit' ),
				weightMap = inspiroCustomControl.font_weight;

			const variantArray = variantSavedField.val().split( ',' );

			// Hide font variant for any ohter fonts then Google
			const selectedOptionGroup =
				fontSelect
					.find( 'option[value="' + fontSelect.val() + '"]' )
					.closest( 'optgroup' )
					.attr( 'label' ) || '';
			if ( 'Google' === selectedOptionGroup ) {
				variantSelect.parent().show();
			} else {
				variantSelect.parent().hide();
			}

			fontValue = InspiroTypography._cleanGoogleFonts( fontValue );
			const weightObject = InspiroTypography._getWeightObject(
				fontValue
			);

			weightMap.inherit = currentWeightTitle;

			for ( let i = 0; i < weightObject.length; i++ ) {
				for ( let e = 0; e < variantArray.length; e++ ) {
					if ( weightObject[ i ] === variantArray[ e ] ) {
						weightValue = weightObject[ i ];
						selected = ' selected="selected"';
					} else {
						selected =
							weightObject[ i ] === weightValue
								? ' selected="selected"'
								: '';
					}
				}
				weightOptions +=
					'<option value="' +
					weightObject[ i ] +
					'"' +
					selected +
					'>' +
					weightMap[ weightObject[ i ] ] +
					'</option>';
			}

			variantSelect.html( weightOptions );
			if ( ! init ) {
				api( variants ).set( '' );
			}
		},
	};

	$( function () {
		InspiroTypography.init();
	} );
} )( jQuery );
