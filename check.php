<?php

function check_menu($check_menu){
    switch($check_menu){
        case ITEM::INDEX;
        return true;
        break;

        case ITEM::REGISTER;
        return true;
        break;

        case ITEM::DELETE;
        return true;
        break;

        case ITEM::OUTPUTCSV;
        return true;
        break;

        case ITEM::EXIT;
        return true;
        break;
    }
    return false;
}


function name_check($name){
    if($name === ""){
        return false;
    }
    return true;
}

function check_delete($items,$check_id){

    for($i = 0; $i <count($items); $i++){
        if($items[$i]->id == $check_id){
            return true;
        }
        echo "入力したidの商品がありません".PHP_EOL;
    }
    return false;
}



 ?>
