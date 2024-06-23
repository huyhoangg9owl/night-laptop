<?php
function base_url() 
{
    return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://' . $_SERVER['SERVER_NAME'];
};
