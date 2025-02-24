<?php

namespace Learnbox\Base\App\Traits;

use Learnbox\Base\App\Helpers\Utility;

trait HasDate
{
    public function getCreatedAt()
    {
        return Utility::convertDate($this->created_at);
    }

    public function getUpdatedAt()
    {
        return Utility::convertDate($this->updated_at);
    }
}
