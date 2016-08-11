<?php

    /**
     * Plugin Name: Ejemplos de shortcodes
     * Plugin URI: https://github.com/Gabriel-fm/apuntes-wordpress
     * Description: Este plugin presenta
     * Version: 1.0
     * Author: Gabriel Franco
     * Author URI: http://gaseosa-electronica.com
     * License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
     */


    // Añade el shortcode [fecha_ahora] que se procesará con la función
    // fnc_fecha_ahora
    add_shortcode('fecha_ahora', 'fnc_fecha_ahora');

    // Función que devuelve la fecha y que sustituirá a [fecha_ahora]
    function fnc_fecha_ahora() {
        return date('l jS \d\e F Y h:i:s A');
    }

    // Añade el shortcode [fecha_u_hora] que admite un atributo
    add_shortcode('fecha_u_hora', 'fnc_fecha_u_hora');

    // Función para el shortcode 'fecha_u_hora'. Admite un atributo denominado
    // presentación cuyo valor será 1 o 0, se inicializa a 0 por si no se 
    // utiliza o se pasa incorrectamente ese atributo
    function fnc_fecha_u_hora( $attr = array('presentacion' => 0) ) {
       
        if ($attr['presentacion'] == 0)
            return date('d \d\e F \d\e Y');
        else
            return date('H:i:s');
    }


    // Shortcode del div para flotar a un lado
    add_shortcode('floater', 'fnc_floater');

    // Función del shortcode para crear un div flotante:
    function fnc_floater( $attr, $content) {

        $resultado = "<div style=\"width:150px," . 
                    "position:relative," .
                    "background-color:" . $attr['color'] . 
                    ",float:" . $attr['posicion'] . "\">";

        $resultado = $resultado . $content;

	$resultado = $resultado . "</div>";
	return $resultado;
    }


?>
