<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;
use Alura\MVC\Model\ImageUpload\ImageUploadModel;

class NewVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if ($url === false) {
            header('Location: /?sucesso=0');
            return;
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if ($titulo === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $video = new Video($url, $titulo);

        $imageFiles = $_FILES['image'];
        $imageUploadModel = new ImageUploadModel($imageFiles['name'], $imageFiles['error'], $imageFiles['tmp_name']);
        $isSave = $imageUploadModel->saveImage($video);

        if(!$isSave){
            $video->setFilePath(null);
        }

        $success = $this->videoRepository->add($video);
        if ($success === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}
