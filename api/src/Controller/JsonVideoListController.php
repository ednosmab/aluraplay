<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Entity\Video;
use Alura\MVC\Repository\VideoRepository;

class JsonVideoListController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {

        $videoList = array_map(function(Video $video): array{
            return [
                'url' => $video->url,
                'title' => $video->title,
                'file_path' => '/img/uploads/'.$video->getFilePath(),
            ];
        }, $this->videoRepository->all());

        echo json_encode($videoList);
    }
}
