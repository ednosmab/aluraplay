<?php

namespace Alura\Mvc\Model\ImageUpload;

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
        if($this->imageError === UPLOAD_ERR_OK){
            $success =  move_uploaded_file(
                $this->imageTmpName,
                __DIR__ . '/../../../public/img/uploads/' . $this->imageName
            );
            $video->setFilePath($this->imageName);
            return $success;
        }
        return false;
    }

}
