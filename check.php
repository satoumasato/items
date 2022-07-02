<?php
function check_menu($check_menu){
    switch($check_menu){
        case ITEM::INDEX;
        echo "商品一覧です";
        break;
        case ITEM::REGISTER;
        echo "商品登録をします";
        break;
        case ITEM::DELETE;
        echo "商品の情報を削除します";
        break;
        default:
    echo 'どれでもありません。';

}
}
function name_check($name){
    if($name === ""){
        return false;
    }
    return true;
}

 ?>
