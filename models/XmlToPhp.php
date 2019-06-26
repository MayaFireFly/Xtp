<?php
namespace app\models;

use yii\base\Model;

class XmlToPhp extends Model{
    private $arrData;
    private $pathToXml;

    public function __construct($path) {
        parent::__construct();
        $this->pathToXml = $path;
        $this->arrData = json_decode(
                            json_encode(
                                simplexml_load_string(
                                    file_get_contents($this->pathToXml))), true);                                 
    }

    public function getArrData(){
        $data = $this->arrData;        
        foreach($data as $value){
            return $value;
        }               
    }

    public function getArrDataFromId($id){
        $data = $this->getArrData();        
        $result = [];        
        foreach($data as $value){
            if($value['categoryId'] === $id){
                array_push($result, $value);
            }            
        }
        return $result;        
    }
}