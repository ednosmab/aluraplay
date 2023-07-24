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
        $fileTempName = pathinfo($this->imageName, PATHINFO_BASENAME);

        if($this->imageError === UPLOAD_ERR_OK){
            $success =  move_uploaded_file(
                $this->imageTmpName,
                __DIR__ . '/../../../public/img/uploads/' . $fileTempName
            );
            $video->setFilePath($fileTempName);
            return $success;
        }
        return false;
    }

}
