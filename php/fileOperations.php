<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file  is used for handling uploaded images. 
***********************************************************/
function getUploadFile($productId)
{	
	
    if(count($_FILES['uploadFile']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['uploadFile']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['uploadFile']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['uploadFile']['name'][$i];

                //save the url and the file
                //$path =  "S:\Technicians Working Directory\Amy\productImg\\".$productId;
                $path =  "image/".$productId;
                if (!file_exists($path)) {
    				mkdir($path, 0777);
				}

                //$filePath =$path.'\\'.$_FILES['uploadFile']['name'][$i];
                $filePath =$path.'/'.$i.".jpg";
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath))
                {
                    $files[] = $shortname;

                }
              }
        }
    }

   return count($_FILES['uploadFile']['name']);
}




?>