<?php
require("check.php");
/*idのNo*/
$id_num = 1;
/*ATEMクラスのオブジェクトを格納する配列*/
$items = [];


class ITEM{
    /*メニュー画面の遷移*/
    const INDEX = "1";
    const REGISTER = "2";
    const DELETE = "3";
    const OUTPUTCSV = "4";
    const EXIT = "5";

    /*csvのpass*/
    const PASS = "csv/item_list_";

    public $id;
    public $name;
    public $jancode;
    function __construct($id_num,$name,$jancode){
        /*インスタンスがnewされたときにidが自動で１から振られるようにしました*/
        $this->id = $id_num;
        $this->name = $name;
        $this->jancode = $jancode;
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
            case self::INDEX;
            echo "商品の一覧を表示".PHP_EOL;
            index($items);
            break;
            case self::REGISTER;
            echo "商品登録します".PHP_EOL;
            register($id_num);
            break;
            case self::DELETE;
            echo "商品を削除します".PHP_EOL;
            delete($items);
            break;
            case self::OUTPUTCSV;
            echo "CSVに出力します".PHP_EOL;
            output_csv($items);
            break;
            case self::EXIT;
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
        echo "JANコードを生成します".PHP_EOL;
        $jancode = uniqid().sprintf('%03d',$id_num);
        $item = new ITEM($id_num,$name,$jancode);
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
        var_dump($items);

        ITEM::main();
    }

     function delete($items){
        global $items;
        echo "削除する商品のidを入力してください".PHP_EOL;
        $check_id = trim(fgets(STDIN));
        $checked_delete_id = check_delete($items,$check_id);
        var_dump($checked_delete_id);
        if($checked_delete_id=== false){
            echo "idが存在しません".PHP_EOL;
            return ITEM::main();
        }

        for($i = 0; $i < count($items); $i++){
            if($items[$i]->id == $check_id){
                echo "削除します".PHP_EOL;
                unset($items[$i]);
                $items = array_merge($items);
                var_dump($items);
            }
        }
        return ITEM::main();
    }

    function output_csv($items){
        date_default_timezone_set('Asia/Tokyo');
        $fp = fopen(ITEM::PASS.date('YmdHis',time()).".csv","w");
        for($i = 0; $i < count($items); $i++){
	        $line = sprintf("%s,%s,%s",$items[$i]->id,$items[$i]->name,$items[$i]->jancode);
	        fwrite($fp, $line . "\n");
        }
        fclose($fp);
        return ITEM::main();

    }

ITEM::main();





 ?>
