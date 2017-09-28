/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .container.navbar-header a  ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .container.navbar-header a' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .container.navbar-header a' ).css( {
					'color': to
				} );
			}
		} );
	} );
    
    wp.customize( 'numero_trial_button', function( value ) {
        value.bind( function( to ) {
            $( '#free-trial-block a' ).text( to );
            } );
    } );
    
    wp.customize( 'numero_trial_button_url', function( value ) {
        value.bind( function( to ) {
            $( '#free-trial-block href' ).text( to );
            } );
    } );
    
} )( jQuery );
