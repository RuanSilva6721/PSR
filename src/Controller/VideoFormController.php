<?php

declare(strict_types=1);

namespace ruan\psr\Controller;

use ruan\psr\Entity\Video;
use ruan\psr\Repository\VideoRepository;

class VideoFormController extends ControllerWithHtml implements Controller
{
    public function __construct(private VideoRepository $repository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var ?Video $video */
        $video = null;
        if ($id !== false && $id !== null) {
            $video = $this->repository->find($id);
        }

        echo $this->renderTemplate('video-form', [
            'video' => $video,
        ]);
    }
}
