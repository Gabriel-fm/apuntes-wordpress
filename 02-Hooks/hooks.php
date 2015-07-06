<?php
/*
Plugin Name: Texto extra en footer
Plugin URI: http://gaseosa-electronica.com/hooks-en-wordpress
Description: Añade un texto extra en el footer de la plantilla
Version: 0.1
Author: Gabriel
Author URI: http://gaseosa-electronica.com
License: GPLv3
*/

	function add_footer_text()
	{
	  echo 'Texto extra añadido por el footer. Usando la plataforma ' .
	       '<a href="http://www.wordpress.com">Wordpress</a>';
	}

	add_action('wp_footer', add_footer_text);

       // Función que modifica el título
       function cambia_titulo($title, $sep) {

        $titulo = "Titulo " . $sep . " " . $title;
        return $titulo;

       }

       // Añadimos la función creada al filtro deseado
       // Sólo usaremos dos parametros
       add_filter('wp_title', 'cambia_titulo', 10, 2);

?>
