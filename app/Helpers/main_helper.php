<?php

if(!function_exists('company')) {
    function company($key) {
        return \App\Models\Company::find(1)->{$key};
    }
}

?>