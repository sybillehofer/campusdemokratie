<?php

function modify_archive_title( $title ) { 
    return str_replace('Kategorie: ', '', $title);
}
add_filter( 'get_the_archive_title', 'modify_archive_title', 10, 1 );