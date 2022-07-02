<?php
require("check.php");
$id_num = 1;
$items = [];


class ITEM{

    const INDEX = "1";
    const REGISTER = "2";
    const DELETE = "3";
    const OUTPUTCSV = "4";
    const EXIT = "5";

    public $id;
    public $name;
    function __construct($id_num,$name){
        $this->id = $id_num;
        $this->name = $name;
    }
    static function main(){

        echo "1, 商品一覧表示".PHP_EOL;
        echo "2, 商品登録".PHP_EOL;
        echo "3, 商品削除".PHP_EOL;
        echo "4, 商品CSV出力".PHP_EOL;
        echo "5, 終了".PHP_EOL;
        echo "メニューの番号を入力してください".PHP_EOL;
        $select_menu = trim(fgets(STDIN));
        $checked_menu = check_menu($select_menu);


    }



}
     function create_item($id_num){
        echo "商品の新規登録します".PHP_EOL;
        echo "商品のidは".$id_num."です".PHP_EOL;
        echo "名前を入力".PHP_EOL;
        $name = trim(fgets(STDIN));
        $checked_name = name_check($name);

        if($checked_name === false){
            echo "未入力です".PHP_EOL;
            return ITEM::main();
        }
        $item = new ITEM($id_num,$name);
        global $items;
        $items[] = $item;
        global $id_num;
        $id_num++;
    }



ITEM::main();





 ?>
