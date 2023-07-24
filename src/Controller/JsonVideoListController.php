<?php

namespace Alura\MVC\Controller;

use Alura\MVC\Repository\VideoRepository;

class JsonVideoListController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {

        echo "oi";
        exit();
        $videoList = $this->videoRepository->all();

        var_dump($videoList);

        exit();
        echo json_encode($videoList);
    }
}
