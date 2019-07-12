<?php

namespace Modules\Icommercepickup\Repositories\Cache;

use Modules\Icommercepickup\Repositories\IcommercePickupRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheIcommercePickupDecorator extends BaseCacheDecorator implements IcommercePickupRepository
{
    public function __construct(IcommercePickupRepository $icommercepickup)
    {
        parent::__construct();
        $this->entityName = 'icommercepickup.icommercepickups';
        $this->repository = $icommercepickup;
    }

    /**
   * List or resources
   *
   * @return mixed
   */
    public function calculate($parameters,$conf)
    {
      return $this->remember(function () use ($parameters,$conf) {
          return $this->repository->calculate($parameters,$conf);
      });
    }

}
