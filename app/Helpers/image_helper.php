<?php 

function src($fileName,$type="full"){
    $path = './uploads/iamges/manipulated/';

    if($type != 'full')
        $path .= $type .'/';
        
    return $path . $fileName;
}

?>