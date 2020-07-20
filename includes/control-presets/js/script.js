/* global wp */

/**
 * Script fort the customizer tabs control interactions.
 *
 * @since    1.1.43
 * @package Hestia
 *
 * @author    ThemeIsle
 */

( function( $, api ) {
    'use strict';
    api.controlConstructor['presets'] = api.Control.extend( {
        ready: function() {
            var control = this;
            var presets_data = _wpCustomizeSettings.controls[$(this).attr('id')].presetsdata;
            $('input').change(
                function() {
                    var value = $(this).val();
                    var options = presets_data[value].colors;
                    Object.keys(options).forEach(option => wp.customize(option).set(options[option]));
                }
            );
        }
    } );


} )( jQuery, wp.customize );