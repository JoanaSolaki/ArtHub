<?php

trait Response
{
    public function render ($view, $data = null) {
        if ($data != null) {
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
        }

        require_once __DIR__ . '/../Views/' . $view . ".php";
    }
}
