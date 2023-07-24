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
        $safeFileName = pathinfo($this->imageName, PATHINFO_BASENAME);

        if($this->imageError === UPLOAD_ERR_OK){
            $success =  move_uploaded_file(
                $this->imageTmpName,
                __DIR__ . '/../../../public/img/uploads/' . $safeFileName
            );
            $video->setFilePath($safeFileName);
            return $success;
        }
        return false;
    }

}
