<?php

    // Comprobar que se quiere realizar una desinstalación
    if( !defined( ‘WP_UNINSTALL_PLUGIN’ ) )
    exit ();

    // Realizar cualquier borrado o elminiación necesriooremove any additional options and custom tables
    // Borando (por ejemplo) los datos de la tabla de opciones
    delete_option( 'miplugin_opciones' );
?>


