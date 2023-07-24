<?php

namespace Alura\MVC\Model\ImageUpload;

use finfo;

class ImageUploadModel
{
    public function __construct(
        private string $imageName,
        private int $imageError,
        private string $imageTmpName
    )
    {  
    }
    
    public function saveImage($video): bool
    {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($this->imageTmpName);
        
        if(str_starts_with($mimeType, 'image/')){
            $safeFileName = uniqid('upload_') . '_' . pathinfo($this->imageName, PATHINFO_BASENAME);
            if($this->imageError === UPLOAD_ERR_OK){
                $success =  move_uploaded_file(
                    $this->imageTmpName,
                    __DIR__ . '/../../../public/img/uploads/' . $safeFileName
                );
                $video->setFilePath($safeFileName);
                return $success;
            }
        }

        return false;
    }

}
