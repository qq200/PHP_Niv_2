<?php
////////////////////DESPRE MAPA///////////////
$folder_name=date("Y-m"); //generam denumirea mapii automat
    if(!file_exists("photos/$folder_name")){
        mkdir("photos/$folder_name"); //creaza mapa noua
}
////////////////////UPLOAD/////////////////
if(count($_FILES)>0) {  
    if( $_FILES["photo"]["type"]!="image/jpeg"){//daca formatul nu corespunde
        print "You can upload ONLY JPEG images";
    }else{
        $file_name=time(); // numele failului in secunde din 1970
        move_uploaded_file($_FILES["photo"]["tmp_name"], //de unde luam
        "photos/$folder_name/$file_name.jpg");                //unde mutam/salvam
    }
}
//////////////////LIST PHOTO///////////////
$files=scandir("photos/$folder_name");
unset($files[0],$files[1]);
// var_dump($files);
$files=array_reverse($files);
foreach($files as $key=>$file){
    if($key<=4){
        $dd=date('Y-m-d', $file_name);
        print"<img width='100' src='photos/$folder_name/$file'/>
        <span>$dd</span><br/>";
    }   
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="photo"> 
    <button>Upload</button>
</form>