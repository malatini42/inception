/* global jQuery */

( function ( $ ) {
	// Variables and DOM Caching.
	const $body = $( 'body' );
	const $customHeader = $body.find( '.custom-header' );
	// eslint-disable-next-line no-unused-vars
	const $branding = $customHeader.find( '.site-branding' );
	const $navigation = $body.find( '#site-navigation' );
	const $menuScrollDown = $body.find( '#scroll-to-content' );
	const $siteContent = $body.find( '#content' );
	const $sidebar = $body.find( '#secondary' );
	const $entryContent = $body.find( '.entry-content' );
	// eslint-disable-next-line no-unused-vars
	const $formatQuote = $body.find( '.format-quote blockquote' );
	const hasCustomHeaderMedia =
		$body.hasClass( 'has-header-image' ) ||
		$body.hasClass( 'has-header-video' );
	// eslint-disable-next-line no-unused-vars
	const isFrontPage =
		$body.hasClass( 'inspiro-front-page' ) || $body.hasClass( 'home blog' );
	let menuTop = 0,
		resizeTimer,
		navigationHeight,
		navigationOuterHeight;

	// Set properties of navigation.
	function setNavProps() {
		navigationHeight = $navigation.height();
		navigationOuterHeight = $navigation.outerHeight();

		// If Admin bar is present on page, update navigationOuterHeight value.
		if ( $( '#wpadminbar' ).length ) {
			navigationOuterHeight += $( '#wpadminbar' ).outerHeight();
		}
	}

	// Set margins of custom header.
	function adjustHeaderSpacing() {
		if ( $( window ).outerWidth() >= 1 ) {
			if ( ! hasCustomHeaderMedia ) {
				$customHeader.css( 'padding-top', navigationOuterHeight );
				$siteContent.css( 'padding-top', navigationOuterHeight );
			}
		} else {
			$customHeader.css( 'padding-top', '0' );
            $siteContent.css( 'padding-top', navigationOuterHeight );
			// $siteContent.css( 'padding-top', '2.5em' );
		}
	}

	// Add 'below-entry-meta' class to elements.
	function belowEntryMetaClass( param ) {
		if ( ! $sidebar.length ) {
			return;
		}

		if (
			! $body.hasClass( 'has-sidebar' ) ||
			$body.hasClass( 'search' ) ||
			$body.hasClass( 'single-attachment' ) ||
			$body.hasClass( 'error404' ) ||
			$body.hasClass( 'inspiro-front-page' )
		) {
			return;
		}

		const sidebarPos = $sidebar.offset();
		const sidebarPosBottom = sidebarPos.top + ( $sidebar.height() + 28 );

		$entryContent.find( param ).each( function () {
			const $element = $( this ),
				elementPos = $element.offset(),
				elementPosTop = elementPos.top;

			// Add 'below-entry-meta' to elements below the entry meta.
			if ( elementPosTop > sidebarPosBottom ) {
				$element.addClass( 'below-entry-meta' );
			} else {
				$element.removeClass( 'below-entry-meta' );
			}
		} );
	}

	/**
	 * Test if an iOS device.
	 */
	function checkiOS() {
		return (
			// eslint-disable-next-line no-undef
			/iPad|iPhone|iPod/.test( navigator.userAgent ) && ! window.MSStream
		);
	}

	/*
	 * Test if background-attachment: fixed is supported.
	 * @link http://stackoverflow.com/questions/14115080/detect-support-for-background-attachment-fixed
	 */
	function supportsFixedBackground() {
		const el = document.createElement( 'div' );
		let isSupported;

		try {
			if ( ! ( 'backgroundAttachment' in el.style ) || checkiOS() ) {
				return false;
			}
			el.style.backgroundAttachment = 'fixed';
			isSupported = 'fixed' === el.style.backgroundAttachment;
			return isSupported;
		} catch ( e ) {
			return false;
		}
	}

	// Fire on document ready.
	$( document ).ready( function () {
		$body.addClass( 'inspiro-page-ready' );

		// If navigation menu is present on page, setNavProps.
		if ( $navigation.length ) {
			setNavProps();
		}

		// If 'Scroll Down' arrow in present on page, calculate scroll offset and bind an event handler to the click event.
		if ( $menuScrollDown.length ) {
			if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
				menuTop -= 32;
			}
			if ( $navigation.length ) {
				menuTop -= 24; // top & bottom padding space when headroom is pinned
			} else {
				navigationHeight = 0;
			}

			$menuScrollDown.on( 'click', function ( e ) {
				e.preventDefault();
				$( window ).scrollTo( '#content', {
					duration: 600,
					offset: { top: menuTop - navigationHeight },
				} );
			} );
		}

		inspiroResponsiveEmbeds();
		adjustHeaderSpacing();
		belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );

		if ( true === supportsFixedBackground() ) {
			document.documentElement.className += ' background-fixed';
		}
	} );

	// If navigation menu is present on page, adjust it on screen resize.
	if ( $navigation.length ) {
		// We want to make sure the navigation is where it should be on resize.
		$( window ).on( 'resize', function () {
			setNavProps();
			adjustHeaderSpacing();
		} );
	}

	$( window ).on( 'resize', function () {
		inspiroResponsiveEmbeds();

		clearTimeout( resizeTimer );
		resizeTimer = setTimeout( function () {
			belowEntryMetaClass(
				'blockquote.alignleft, blockquote.alignright'
			);
		}, 300 );
	} );

	$( window ).on( 'load', function () {
		$body.addClass( 'inspiro-page-loaded' );
	} );

	// Add header video class after the video is loaded.
	$( document ).on( 'wp-custom-header-video-loaded', function () {
		$body.addClass( 'has-header-video' );
		$( '#wp-custom-header-video' ).attr( 'autoplay', true );
		$( '#wp-custom-header-video' ).attr( 'playsinline', true );
	} );
} )( jQuery );

/**
 * Make embeds responsive so they don't overflow their container.
 * Add max-width & max-height to <iframe> elements, depending on their width & height props.
 *
 * @see Twenty Twenty-One file responsive-embeds.js.
 * @since 1.3.2
 *
 * @return {void}
 */
function inspiroResponsiveEmbeds() {
	let proportion, parentWidth;
	let iframeInitialWidth, iframeInitialHeight;
	const bodyElement = document.querySelectorAll( 'body' )[ 0 ];

	// Loop iframe elements.
	document.querySelectorAll( 'iframe' ).forEach( function ( iframe ) {
		// Skip custom video header.
		if ( 'wp-custom-header' === iframe.parentElement.id ) {
			if (
				bodyElement.classList.contains( 'full-height-iframe-video' )
			) {
				if ( ! iframe.hasAttribute( 'data-initial-width' ) ) {
					iframe.setAttribute( 'data-initial-width', iframe.width );
				}
				if ( ! iframe.hasAttribute( 'data-initial-height' ) ) {
					iframe.setAttribute( 'data-initial-height', iframe.height );
				}

				iframeInitialWidth = iframe.getAttribute(
					'data-initial-width'
				);
				iframeInitialHeight = iframe.getAttribute(
					'data-initial-height'
				);

				if ( window.innerWidth < 1200 ) {
					iframe.width = window.innerHeight + window.innerWidth;
					iframe.height = window.innerWidth;
				} else {
					iframe.width = iframeInitialWidth;
					iframe.height = iframeInitialHeight;
				}
			}
			return;
		}

		// Only continue if the iframe has a width & height defined.
		if ( iframe.width && iframe.height ) {
			// Calculate the proportion/ratio based on the width & height.
			proportion =
				parseFloat( iframe.width ) / parseFloat( iframe.height );
			// Get the parent element's width.
			parentWidth = parseFloat(
				window
					.getComputedStyle( iframe.parentElement, null )
					.width.replace( 'px', '' )
			);
			// Set the max-width & height.
			iframe.style.maxWidth = '100%';
			iframe.style.maxHeight =
				Math.round( parentWidth / proportion ).toString() + 'px';
		}
	} );
}
