<?php

declare(strict_types=1);

namespace ruan\psr\Controller;

use ruan\psr\Repository\VideoRepository;

class VideoListController extends ControllerWithHtml implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();
        echo $this->renderTemplate(
            'video-list',
            ['videoList' => $videoList]
        );
    }
}
