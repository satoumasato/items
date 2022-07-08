<?php
$names = [];
class NAME{
    public $name;

     function oll(){
        for($i = 0; $i < count($names); $i++){
            echo $names[$i].PHP_EOL;
            $this->main(12);
        }
    }

    private function main($case){
        switch($case){
            case 1;
            echo "いちです";
            break;
        }
    }
}


$member = new NAME();
$member->oll();
 ?>
