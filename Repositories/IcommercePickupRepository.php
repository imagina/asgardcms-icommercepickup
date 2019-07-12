<?php

namespace Modules\Icommercepickup\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface IcommercePickupRepository extends BaseRepository
{
    public function calculate($parameters,$conf);
}
