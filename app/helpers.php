<?php

function formatDate($date)
{
    return date(\App\Invoice::$dateFormatDefault, strtotime($date));
}