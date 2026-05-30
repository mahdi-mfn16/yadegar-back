<?php

namespace Yadegar\Memory\App\Services;

use Yadegar\Base\App\Services\BaseService;
use Yadegar\Memory\App\Repositories\Interfaces\FolderRepositoryInterface;

class FolderService extends BaseService
{
    public function __construct(FolderRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}