<?php
/*
Plugin Name: Un Widget nuevo
Plugin URI: http://miweb.com/misplugins/miplugin
Description: Un ejemplo de un widget
Version: 0.1
Author: Gabriel
Author URI: http://gabrielfranco.net
License: GPLv3
*/

class GF_un_widget extends WP_Widget {

  function GF_un_widget() 
  {
    // Constructor
    $widget_opciones = array('classname' => 'gf_un_widget_class',            // Clase del <li> en el HTML
                             'description' => 'Widget simple'  // Descripcion
    );

    $this -> WP_Widget( 'gf_un_widget_id',      // ID en el HTML
                        'Widget de ejemplo',    // Nombre 
                        $widget_opciones );     // Array de opciones
  }

  function form($instancia)
  {
    // Función que crea el formulario en el area de
    // administración

    // Array por defecto
    $array_inicial = array('cita' => '',
                           'autor' => 'Nadie');

    // Obtener los datos o utilizar los anteriores
    $datos = wp_parse_args( (array) $instancia, $array_inicial);

    // Obtiene los datos en variables para presentarlos
    $autor = $datos['autor'];
    $cita  = $datos['cita'];

    // El formulario (sin botón de envío, solo los datos)
    ?>
    <p>Autor: <input name="<?php echo $this->get_field_name('autor'); ?>" 
                    value="<?php echo esc_attr($autor) ?>"/>
    </p>
    <p>Cita: <textarea name="<?php echo $this->get_field_name('cita'); ?>"><?php echo esc_attr($cita); ?></textarea>
    </p>
    
    <?php
  }

  function update($nueva_instancia, $vieja_instancia)
  {
    // Método para guardar los cambios realizados
    
    // Aquí se puede tratar la información en el caso de que
    // sea necesario, antes de guardarla.
    $nueva_instancia['autor'] = strip_tags($nueva_instancia['autor']);
    $nueva_instancia['cita']  = strip_tags($nueva_instancia['cita']);

    // Devuelve la instancia actualizada y wordpress la guardará
    return $nueva_instancia;

  }

  function widget($args, $instancia)
  {
    // Función encargada de presentar el widget
    // en la web al lector

    // Extrae las variables para presentar el widget
    extract($args);

    echo $before_widget;
    $titulo_widget = apply_filters('widget_title', 'Cita famosa');
    $autor = $instancia['autor'];
    $cita  = $instancia['cita'];

    // Titulo del widget
    echo $before_title;
    echo $titulo_widget;
    echo $after_title;

    // Contenido del widget
    echo '<p>' . $cita  . '</p>';
    echo '<p style="float:right;margin-right:35px;"><b><i> -- ' . $autor . '</i></b></p>';

    echo $after_widget;
  }

}


/*
 * Registra la función que incluye el widget
 * en el hook destinado a los widget
 */
add_action('widgets_init', 'gf_registrar_mi_widget');


/*
 * Registra el widget en el sistema
 */
function gf_registrar_mi_widget() 
{
  register_widget( 'GF_un_widget' );
}


?>
