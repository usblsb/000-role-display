<?php
/**
 * Plugin Name: 000 User Roles and Capabilities Display
 * Plugin URI: https://webyblog.es/
 * Description: Muestra una lista de roles de usuario y sus capacidades activas en WordPress mediante un shortcode [display_user_roles].
 * Version: 09-01-2024
 * Author: Juan Luis Martel
 * Author URI: https://webyblog.es/
 * License: GPL2
 */


// Evita la ejecución directa del script
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Función para añadir enlace de Ayuda en el plugin que muestra el fichero ayuda.html
add_filter('plugin_action_links', 'jlmr_agregar_enlace_ayuda_display_user_roles_and_capabilities', 10, 2);

function jlmr_agregar_enlace_ayuda_display_user_roles_and_capabilities($links, $file) {
    // Obtenemos el 'basename' del archivo actual
    $plugin_basename = plugin_basename(__FILE__);

    // Comprobamos si estamos en el plugin correcto antes de agregar el enlace
    if ($file == $plugin_basename) {
        // Construimos la URL del archivo de ayuda
        $ayuda_url = plugins_url('ayuda.html', __FILE__);

        // Añadimos el nuevo enlace de ayuda al array de enlaces
        $enlace_ayuda = '<a  rel="noopener noreferrer nofollow" href="' . esc_url($ayuda_url) . '" target="_blank">Ayuda</a>';
        array_push($links, $enlace_ayuda);
    }

    return $links;
}


/**
 * Shortcode para mostrar los roles de usuario y sus capacidades
 */
function jlmr_display_user_roles_and_capabilities() {
	ob_start(); // Iniciar buffer de salida

	// Obtener todos los roles de usuario
	$roles = wp_roles()->roles;

	// Iniciar HTML
	echo '<div class="jlmr-roles-display">';

	foreach ( $roles as $role_key => $role_info ) {
		echo '<div class="jlmr-role">';
		echo '<h2>' . esc_html( $role_info['name'] ) . ' (' . esc_html( $role_key ) . ')</h2>'; // Muestra el nombre y el slug del rol
		echo '<ul>';

		// Listar capacidades activas
		foreach ( $role_info['capabilities'] as $cap => $value ) {
			if ( $value ) { // Solo mostrar capacidades activas
				echo '<li>' . esc_html( $cap ) . '</li>';
			}
		}

		echo '</ul>';
		echo '</div>';
	}

	echo '</div>';

	return ob_get_clean(); // Devolver el contenido del buffer
}

// Registrar el shortcode
add_shortcode( 'display_user_roles', 'jlmr_display_user_roles_and_capabilities' );

