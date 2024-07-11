<?php

function status($status)
{
    if ($status == 'a') {
        return ['title' => 'Active', 'color' => 'success', 'icon' => 'fa fa-check'];
    } elseif ($status == 'p') {
        return ['title' => 'Passive', 'color' => 'danger', 'icon' => 'fa fa-times'];
    } elseif ($status == 'c') {
        return ['title' => 'Continue', 'color' => 'warning', 'icon' => 'fa fa-clock-o'];
    }
}
