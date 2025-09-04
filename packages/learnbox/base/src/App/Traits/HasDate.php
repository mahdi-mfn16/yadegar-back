<?php

namespace Yadegar\Base\App\Traits;

use Yadegar\Base\App\Helpers\Utility;

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
