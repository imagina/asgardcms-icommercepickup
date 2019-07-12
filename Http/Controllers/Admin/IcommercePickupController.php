<?php

namespace Modules\Icommercepickup\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icommercepickup\Entities\IcommercePickup;
use Modules\Icommercepickup\Http\Requests\CreateIcommercePickupRequest;
use Modules\Icommercepickup\Http\Requests\UpdateIcommercePickupRequest;
use Modules\Icommercepickup\Repositories\IcommercePickupRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class IcommercePickupController extends AdminBaseController
{
    /**
     * @var IcommercePickupRepository
     */
    private $icommercepickup;

    public function __construct(IcommercePickupRepository $icommercepickup)
    {
        parent::__construct();

        $this->icommercepickup = $icommercepickup;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$icommercepickups = $this->icommercepickup->all();

        return view('icommercepickup::admin.icommercepickups.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icommercepickup::admin.icommercepickups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateIcommercePickupRequest $request
     * @return Response
     */
    public function store(CreateIcommercePickupRequest $request)
    {
        $this->icommercepickup->create($request->all());

        return redirect()->route('admin.icommercepickup.icommercepickup.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icommercepickup::icommercepickups.title.icommercepickups')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  IcommercePickup $icommercepickup
     * @return Response
     */
    public function edit(IcommercePickup $icommercepickup)
    {
        return view('icommercepickup::admin.icommercepickups.edit', compact('icommercepickup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IcommercePickup $icommercepickup
     * @param  UpdateIcommercePickupRequest $request
     * @return Response
     */
    public function update(IcommercePickup $icommercepickup, UpdateIcommercePickupRequest $request)
    {
        $this->icommercepickup->update($icommercepickup, $request->all());

        return redirect()->route('admin.icommercepickup.icommercepickup.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icommercepickup::icommercepickups.title.icommercepickups')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  IcommercePickup $icommercepickup
     * @return Response
     */
    public function destroy(IcommercePickup $icommercepickup)
    {
        $this->icommercepickup->destroy($icommercepickup);

        return redirect()->route('admin.icommercepickup.icommercepickup.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icommercepickup::icommercepickups.title.icommercepickups')]));
    }
}
