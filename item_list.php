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
        global $id_num;
        global $items;
        echo "1, 商品一覧表示".PHP_EOL;
        echo "2, 商品登録".PHP_EOL;
        echo "3, 商品削除".PHP_EOL;
        echo "4, 商品CSV出力".PHP_EOL;
        echo "5, 終了".PHP_EOL;
        echo "メニューの番号を入力してください".PHP_EOL;

        $select_menu = trim(fgets(STDIN));
        $checked_menu = check_menu($select_menu);
        if($checked_menu === false){
            echo "入力した数字は無効です";
            return ITEM::main();
        }
        switch($select_menu){
            case ITEM::INDEX;
            echo "商品の一覧を表示".PHP_EOL;
            index($items);
            break;
            case ITEM::REGISTER;
            echo "商品登録します".PHP_EOL;
            register($id_num);
            break;
            case ITEM::DELETE;
            echo "商品を削除します".PHP_EOL;
            break;
            case ITEM::OUTPUTCSV;
            echo "CSVに出力します".PHP_EOL;
            break;
            case ITEM::EXIT;
            echo "プログラムを終了".PHP_EOL;
            break;
        }






}



}
     function register($id_num){
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
        global $id_num;
        $items[] = $item;
        $id_num++;
        return ITEM::main();
    }

    function index($items){
        echo "商品一覧".PHP_EOL;
        for($i=0; $i < count($items); $i++){
            echo $items[$i]->name.PHP_EOL;
        }

    }



ITEM::main();





 ?>
