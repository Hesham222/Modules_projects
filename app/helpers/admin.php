<?php

if (!function_exists('AdminLogged')) {
    function AdminLogged($guard = 'admin')
    {
        return auth($guard)->check();
    }
}
