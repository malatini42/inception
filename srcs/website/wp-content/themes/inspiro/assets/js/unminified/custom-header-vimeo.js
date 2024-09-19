/* global Vimeo */

/**
 * Plugin Name: Custom Header Handler for Vimeo
 * Description: Adds support for Vimeo to the video headers feature introduced in WordPress 4.7.
 * Version: 1.0.0
 * Author: Brady Vercher
 * Author URI: https://www.cedaro.com/
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

( function ( window ) {
	window.wp = window.wp || false;

	if ( ! window.wp ) {
		return;
	}

	if ( ! window.wp.customHeader ) {
		return;
	}

	const VimeoHandler = window.wp.customHeader.BaseVideoHandler.extend( {
		test( settings ) {
			return 'video/x-vimeo' === settings.mimeType;
		},

		ready() {
			const handler = this;

			if ( 'Vimeo' in window ) {
				handler.loadVideo();
			} else {
				const tag = document.createElement( 'script' );
				tag.src = 'https://player.vimeo.com/api/player.js';
				tag.onload = function () {
					handler.loadVideo();
				};
				document.getElementsByTagName( 'head' )[ 0 ].appendChild( tag );
			}
		},

		loadVideo() {
			let player;
			const handler = this;

			// Track the paused state since the getPaused() method is asynchronous.
			this._paused = true;

			this.player = player = new Vimeo.Player( this.container, {
				autopause: false,
				autoplay: true,
				// Background isn't currently supported in Vimeo's player library:
				// https://github.com/vimeo/player.js/issues/39
				background: true,
				byline: false,
				height: this.settings.height,
				loop: true,
				portrait: false,
				title: false,
				url: this.settings.videoUrl,
				width: this.settings.width,
				id: this.settings.id,
			} );

			player.on( 'play', function () {
				handler._paused = false;
				handler.trigger( 'play' );
			} );

			player.on( 'pause', function () {
				handler._paused = true;
				handler.trigger( 'pause' );
			} );

			player.ready().then( function () {
				const poster = handler.container.getElementsByTagName(
					'img'
				)[ 0 ];

				if ( poster.src === handler.settings.posterUrl ) {
					// Remove poster
					handler.container.removeChild( poster );
				}

				handler.showControls();

				// Autoplay doesn't trigger a play event, so check the video
				// state when ready is triggered.
				player.getPaused().then( function ( paused ) {
					handler._paused = paused;

					if ( ! paused ) {
						handler.trigger( 'play' );
					}
				} );
			} );

			player.setVolume( 0 );
		},

		isPaused() {
			return this._paused;
		},

		pause() {
			this.player.pause();
		},

		play() {
			this.player.play();
		},
	} );

	// eslint-disable-next-line no-unused-vars
	const VimeoLegacyHandler = window.wp.customHeader.BaseVideoHandler.extend( {
		origin: 'https://player.vimeo.com',

		test( settings ) {
			return 'video/x-vimeo' === settings.mimeType;
		},

		ready() {
			const handler = this,
				videoId = this.settings.videoUrl.split( '/' ).pop(),
				iframe = document.createElement( 'iframe' );

			this._paused = true;
			handler.setVideo( iframe );

			iframe.id = 'wp-custom-header-video';
			iframe.src =
				'https://player.vimeo.com/video/' +
				videoId +
				'?api=1&autopause=0&autoplay=0&background=1&badge=0&byline=0&loop=1&player_id=' +
				iframe.id +
				'&portrait=0&title=0';
			this.iframe = iframe;

			// eslint-disable-next-line @wordpress/no-global-event-listener
			window.addEventListener( 'message', function ( e ) {
				let data;

				if ( handler.origin !== e.origin ) {
					return;
				}

				try {
					data = JSON.parse( e.data );
				} catch ( ex ) {
					return;
				}

				if ( 'wp-custom-header-video' !== data.player_id ) {
					return;
				}

				if ( 'ready' === data.event ) {
					handler.postMessage( 'addEventListener', 'pause' );
					handler.postMessage( 'addEventListener', 'play' );
					handler.postMessage( 'setVolume', 0 );
					handler.play();
					handler.showControls();
				} else if ( 'pause' === data.event ) {
					handler._paused = true;
					handler.trigger( data.event );
				} else if ( 'play' === data.event ) {
					handler._paused = false;
					handler.trigger( data.event );
				}
			} );
		},

		isPaused() {
			return this._paused;
		},

		pause() {
			this.postMessage( 'pause' );
		},

		play() {
			this.postMessage( 'play' );
		},

		postMessage( method, params ) {
			const data = JSON.stringify( {
				method,
				value: params,
			} );

			this.iframe.contentWindow.postMessage( data, this.origin );
		},
	} );

	window.wp.customHeader.handlers.vimeo = new VimeoHandler();
} )( window );
