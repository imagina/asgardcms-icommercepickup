<?php

namespace Modules\Icommercepickup\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Icommerce\Entities\ShippingMethod;

class IcommercepickupDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $options['init'] = "Modules\Icommercepickup\Http\Controllers\Api\IcommercePickupApiController";

        $titleTrans = 'icommercepickup::icommercepickups.single';
        $descriptionTrans = 'icommercepickup::icommercepickups.description';

        foreach (['en', 'es'] as $locale) {

            if($locale=='en'){
                $params = array(
                    'title' => trans($titleTrans),
                    'description' => trans($descriptionTrans),
                    'name' => config('asgard.icommercepickup.config.shippingName'),
                    'status' => 0,
                    'options' => $options
                );

                $shippingMethod = ShippingMethod::create($params);
                
            }else{

                $title = trans($titleTrans,[],$locale);
                $description = trans($descriptionTrans,[],$locale);

                $shippingMethod->translateOrNew($locale)->title = $title;
                $shippingMethod->translateOrNew($locale)->description = $description;

                $shippingMethod->save();
            }

        }// Foreach
    }
}
