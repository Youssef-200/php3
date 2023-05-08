<?php
class style{
    
    /**
     * this function is for margin
     * @param string $type this is var
     * @param string $name this is var
     * @param string $dir  this is var 
     * @param string $val  this is var
     * 
     */
    
    function margin($type,$name,$dir,$val){
        if($type=='id'){
            return '#'.$name.'{
                margin-'.$dir.':'.$val.'%;
            }';

        }elseif($type=='class'){
            return '.'.$name.'{
                margin-'.$dir.':'.$val.'%;
            }';
        }else{
            return $name.'{
                margin-'.$dir.':'.$val.'%;
            }';;
        }
    }    
    /**
     * backColor
     * cette fonction defini la couleur du 
     *
     * @param  string $type id || class
     * @param  string $name nom d'id || nom de class || nom d'element
     * @param  string $val  code couleur
     * @return string
     */

    function backColor($type,$name,$val){
        if($type=='id'){
            return '#'.$name.'{
                background-color:'.$val.';
               
            }';

        }elseif($type=='class'){
            return '.'.$name.'{
                background-color:'.$val.';
            }';
        }else{
            return $name.'{
                background-color:'.$val.';
            }';
        }

    }    
    /**
     * fsize
     *
     * @param  string $type
     * @param  string $name
     * @param  string $val
     * @return string
     */
    function fsize($type,$name,$val){
        return "";

    }
}


?>