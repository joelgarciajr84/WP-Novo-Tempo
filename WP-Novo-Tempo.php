<?php

/*

    * Plugin Name: WP Novo Tempo
    * Plugin URL: https://github.com/joelgarciajr84/WP-Novo-Tempo
    * Description: Cria dois Widgets para exibição da Rádio e/ou  TV Novo Tempo em seu site WordPress -Esse plugin não é oficial da Rede Novo Tempo nem da IASD.
    * Author: Joel Garcia Jr
    * Version: 1.0
    * Text Domain: wp_nt_text
    * Author URL: joel.garciajr84@gmail.com

 */

#Arquivos necessarios

require_once dirname(__FILE__) . '/Widgets/widget-radio-nt.php';
require_once dirname(__FILE__) . '/Widgets/widget-tv-nt.php';

#Controle das Actions
add_action( 'widgets_init', 'wp_load_wp_radio_nt' );
add_action( 'widgets_init', 'wp_load_wp_tv_nt' );