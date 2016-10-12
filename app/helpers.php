<?php
/**
 * Set active page
 *
 * @param string $uri
 * @return string
 */
function set_activea($uri)
{
    return Request::is($uri) ? 'active' : '';
}


function set_active($path, $active = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}