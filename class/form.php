<?php
class form{

   

    function input($type,$name,$id,$class,$b=" "){
        return '
                <div id="'.$id.'" class="'.$class.'">
                <label  for="input" class="form-label">'.$name.'</label>
                <input accept="'. $b .'"  type="'.$type.'" name="'.$name.'"   class="form-control" >
                </div>';
    }
    function submit($name,$value,$id,$class){
        return '    <div id="'.$id.'" class="col-12 '.$class.'">
                            <input   id="'.$id.'" class="btn btn-primary " type="submit" name="'.$name.'" value="LOG-UP">
                    </div>
    ';


    }
    function option($value,$id,$class){
        return '
                    <option nom="op" value="'.$value.'">'.$value.'</option>
                
                
                    ';
    }


}

?>