<?php

    $id_number=1;

function createId(){
    global $id_number;
    return $id_number++;
};