<?php

function check_requests_input($exclude_inputs, $inputs, $columns, $route, $message, $alert_type) {
    foreach($exclude_inputs as $i) {
        $exclude_inputs[$i] = 0;
    }
        
    foreach(array_keys($inputs) as $i) {
        if(!array_key_exists($i, $exclude_inputs)) {
            if(!array_key_exists($i, $columns)) {
                return redirect()->route($route)->with(['message' => $message, 'alert' => $alert_type]);
            }
        }
    }
}
