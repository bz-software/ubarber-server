<?php
namespace app\helpers;

use Yii;

class Formatter {
    public static function realParaFloat($valor){
        if(empty($valor)){
            return null;
        }else{
            return (float) number_format(str_replace(",",".",str_replace(".","",$valor)), 2, '.', '');
        }
    }

    public static function floatParaReal($valor){
        return number_format($valor,2,",",".");
    }

}
