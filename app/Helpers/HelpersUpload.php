<?php
function UploadImage($file,$type){
    $directory = $type. time();
    $imageName = $file->getClientOriginalName();
    $file->storeAs($directory .'/',$imageName,'public_path');
    return 'uploads/'.$directory.'/'.$imageName;
}
