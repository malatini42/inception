<?php
/**
 * Custom icons for this theme.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

if ( ! class_exists( 'Inspiro_SVG_Icons' ) ) {
	/**
	 * SVG ICONS CLASS
	 * Retrieve the SVG code for the specified icon. Based on a solution in Twenty Nineteen.
	 */
	class Inspiro_SVG_Icons {
		/**
		 * GET SVG CODE
		 * Get the SVG code for the specified icon
		 *
		 * @param string $icon  Icon name.
		 * @param string $group Icon group.
		 * @param string $color Color.
		 */
		public static function get_svg( $icon, $group = 'ui', $color = '#1A1A1B' ) {
			if ( 'ui' === $group ) {
				$arr = self::$ui_icons;
			} else {
				$arr = array();
			}

			/**
			 * Filters Inspiro's array of icons.
			 *
			 * The dynamic portion of the hook name, `$group`, refers to
			 * the name of the group of icons, either "ui".
			 *
			 * @since Inspiro 1.0.0
			 *
			 * @param array $arr Array of icons.
			 */
			$arr = apply_filters( "inspiro_svg_icons_{$group}", $arr );

			/**
			 * Filters an SVG icon's color.
			 *
			 * @since Inspiro 1.0.0
			 *
			 * @param string $color The icon color.
			 * @param string $icon  The icon name.
			 * @param string $group The icon group.
			 */
			$color = apply_filters( 'inspiro_svg_icon_color', $color, $icon, $group );

			if ( array_key_exists( $icon, $arr ) ) {
				$repl = '<svg class="svg-icon svg-icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img" focusable="false" ';
				$svg  = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
				$svg  = str_replace( '#1A1A1B', $color, $svg );   // Replace the color.
				$svg  = str_replace( '#', '%23', $svg );          // Urlencode hashes.
				$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
				$svg  = preg_replace( '/>\s*</', '><', $svg );    // Remove whitespace between SVG tags.
				return $svg;
			}
			return null;
		}

		/**
		 * ICON STORAGE
		 * Store the code for all SVGs in an array.
		 *
		 * @var array
		 */
		public static $ui_icons = array(
			'angle-down'   => '<svg xmlns="https://www.w3.org/2000/svg" width="21" height="32" viewBox="0 0 21 32">
        <path class="path1" d="M19.196 13.143q0 0.232-0.179 0.411l-8.321 8.321q-0.179 0.179-0.411 0.179t-0.411-0.179l-8.321-8.321q-0.179-0.179-0.179-0.411t0.179-0.411l0.893-0.893q0.179-0.179 0.411-0.179t0.411 0.179l7.018 7.018 7.018-7.018q0.179-0.179 0.411-0.179t0.411 0.179l0.893 0.893q0.179 0.179 0.179 0.411z"></path>
        </svg>',
			'arrow-down'   => '<svg xmlns="https://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24">
        <polygon fill="#FFF" points="721.105 856 721.105 874.315 728.083 867.313 730.204 869.41 719.59 880 709 869.41 711.074 867.313 718.076 874.315 718.076 856" transform="translate(-709 -856)"/>
        </svg>',
			'arrow-right'  => '<svg xmlns="https://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19">
        <path fill="#1A1A1B" d="M678.4 460.8l-365.619 379.904c-13.722 13.824-13.722 36.198 0 50.125 13.722 13.824 35.891 13.824 49.613 0l400.896-404.89c13.722-13.875 13.722-36.301 0-50.125l-400.896-404.89c-13.722-13.875-35.891-13.824-49.613 0-13.722 13.773-13.722 36.198 0 50.125l365.619 379.75z"/>
        </svg>',
			'chevron-down' => '<svg xmlns="https://www.w3.org/2000/svg" width="20" height="12" viewBox="0 0 20 12">
        <polygon fill="#1A1A1B" fill-rule="evenodd" points="1319.899 365.778 1327.678 358 1329.799 360.121 1319.899 370.021 1310 360.121 1312.121 358" transform="translate(-1310 -358)"/>
        </svg>',
			'comment'      => '<svg xmlns="https://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19">
        <path d="M9.43016863,13.2235931 C9.58624731,13.094699 9.7823475,13.0241935 9.98476849,13.0241935 L15.0564516,13.0241935 C15.8581553,13.0241935 16.5080645,12.3742843 16.5080645,11.5725806 L16.5080645,3.44354839 C16.5080645,2.64184472 15.8581553,1.99193548 15.0564516,1.99193548 L3.44354839,1.99193548 C2.64184472,1.99193548 1.99193548,2.64184472 1.99193548,3.44354839 L1.99193548,11.5725806 C1.99193548,12.3742843 2.64184472,13.0241935 3.44354839,13.0241935 L5.76612903,13.0241935 C6.24715123,13.0241935 6.63709677,13.4141391 6.63709677,13.8951613 L6.63709677,15.5301903 L9.43016863,13.2235931 Z M3.44354839,14.766129 C1.67980032,14.766129 0.25,13.3363287 0.25,11.5725806 L0.25,3.44354839 C0.25,1.67980032 1.67980032,0.25 3.44354839,0.25 L15.0564516,0.25 C16.8201997,0.25 18.25,1.67980032 18.25,3.44354839 L18.25,11.5725806 C18.25,13.3363287 16.8201997,14.766129 15.0564516,14.766129 L10.2979143,14.766129 L6.32072889,18.0506004 C5.75274472,18.5196577 4.89516129,18.1156602 4.89516129,17.3790323 L4.89516129,14.766129 L3.44354839,14.766129 Z"/>
        </svg>',
			'cross'        => '<svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
        <polygon fill="#1A1A1B" fill-rule="evenodd" points="6.852 7.649 .399 1.195 1.445 .149 7.899 6.602 14.352 .149 15.399 1.195 8.945 7.649 15.399 14.102 14.352 15.149 7.899 8.695 1.445 15.149 .399 14.102"/>
        </svg>',
			'search'       => '<svg xmlns="https://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
        <path d="M38.710696,48.0601792 L43,52.3494831 L41.3494831,54 L37.0601792,49.710696 C35.2632422,51.1481185 32.9839107,52.0076499 30.5038249,52.0076499 C24.7027226,52.0076499 20,47.3049272 20,41.5038249 C20,35.7027226 24.7027226,31 30.5038249,31 C36.3049272,31 41.0076499,35.7027226 41.0076499,41.5038249 C41.0076499,43.9839107 40.1481185,46.2632422 38.710696,48.0601792 Z M36.3875844,47.1716785 C37.8030221,45.7026647 38.6734666,43.7048964 38.6734666,41.5038249 C38.6734666,36.9918565 35.0157934,33.3341833 30.5038249,33.3341833 C25.9918565,33.3341833 22.3341833,36.9918565 22.3341833,41.5038249 C22.3341833,46.0157934 25.9918565,49.6734666 30.5038249,49.6734666 C32.7048964,49.6734666 34.7026647,48.8030221 36.1716785,47.3875844 C36.2023931,47.347638 36.2360451,47.3092237 36.2726343,47.2726343 C36.3092237,47.2360451 36.347638,47.2023931 36.3875844,47.1716785 Z" transform="translate(-20 -31)"/>
        </svg>',
			'play'         => '<svg xmlns="https://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28">
        <path d="M21.625 14.484l-20.75 11.531c-0.484 0.266-0.875 0.031-0.875-0.516v-23c0-0.547 0.391-0.781 0.875-0.516l20.75 11.531c0.484 0.266 0.484 0.703 0 0.969z"></path>
        </svg>',
			'pause'        => '<svg xmlns="https://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">
        <path d="M24 3v22c0 0.547-0.453 1-1 1h-8c-0.547 0-1-0.453-1-1v-22c0-0.547 0.453-1 1-1h8c0.547 0 1 0.453 1 1zM10 3v22c0 0.547-0.453 1-1 1h-8c-0.547 0-1-0.453-1-1v-22c0-0.547 0.453-1 1-1h8c0.547 0 1 0.453 1 1z"></path>
        </svg>',
			'thumb-tack'   => '<svg xmlns="https://www.w3.org/2000/svg" width="21" height="32" viewBox="0 0 21 32">
        <path class="path1" d="M8.571 15.429v-8q0-0.25-0.161-0.411t-0.411-0.161-0.411 0.161-0.161 0.411v8q0 0.25 0.161 0.411t0.411 0.161 0.411-0.161 0.161-0.411zM20.571 21.714q0 0.464-0.339 0.804t-0.804 0.339h-7.661l-0.911 8.625q-0.036 0.214-0.188 0.366t-0.366 0.152h-0.018q-0.482 0-0.571-0.482l-1.357-8.661h-7.214q-0.464 0-0.804-0.339t-0.339-0.804q0-2.196 1.402-3.955t3.17-1.759v-9.143q-0.929 0-1.607-0.679t-0.679-1.607 0.679-1.607 1.607-0.679h11.429q0.929 0 1.607 0.679t0.679 1.607-0.679 1.607-1.607 0.679v9.143q1.768 0 3.17 1.759t1.402 3.955z"></path>
        </svg>',
		);

	}
}
