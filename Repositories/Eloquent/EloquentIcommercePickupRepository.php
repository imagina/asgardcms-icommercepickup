<?php

namespace Modules\Icommercepickup\Repositories\Eloquent;

use Modules\Icommercepickup\Repositories\IcommercePickupRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentIcommercePickupRepository extends EloquentBaseRepository implements IcommercePickupRepository
{

    function calculate($parameters,$conf){
         
        $response["status"] = "success";
        
        // Items
        $response["items"] = null;

        // Price
        $response["price"] = 0;
        $response["priceshow"] = false;

        return $response;

    }
    
}
