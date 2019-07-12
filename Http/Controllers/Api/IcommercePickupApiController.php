<?php

namespace Modules\Icommercepickup\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Repositories
use Modules\Icommercepickup\Repositories\IcommercePickupRepository;
use Modules\Icommerce\Repositories\ShippingMethodRepository;

class IcommercePickupApiController extends BaseApiController
{

    private $icommercepickup;
    private $shippingMethod;
   
    public function __construct(
        IcommercePickupRepository $icommercepickup,
        ShippingMethodRepository $shippingMethod
    ){
        $this->icommercepickup = $icommercepickup;
        $this->shippingMethod = $shippingMethod;
    }
    
     /**
     * Init data
     * @param Requests request
     * @param Requests array products - items (object)
     * @param Requests array products - total
     * @return mixed
     */
    public function init(Request $request){

        try {

            // Configuration
            $shippingName = config('asgard.icommercepickup.config.shippingName');
            $attribute = array('name' => $shippingName);
            $shippingMethod = $this->shippingMethod->findByAttributes($attribute);

            $response = $this->icommercepickup->calculate($request->all(),$shippingMethod->options);

          } catch (\Exception $e) {
            //Message Error
            $status = 500;
            $response = [
              'errors' => $e->getMessage()
            ];
        }

        return response()->json($response, $status ?? 200);

    }
    
    

}