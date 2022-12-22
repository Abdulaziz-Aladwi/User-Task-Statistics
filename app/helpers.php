<?php

if (! function_exists('activeAdminTab')) {
    function activeAdminTab(?string $segment) {
        return request()->segment(2) == $segment ? 'active' : '';
    }
}