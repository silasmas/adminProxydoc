<?php

namespace App\Http\Controllers;

use App\Models\serviceAbonnement;
use App\Http\Requests\StoreserviceAbonnementRequest;
use App\Http\Requests\UpdateserviceAbonnementRequest;

class ServiceAbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreserviceAbonnementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceAbonnementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\serviceAbonnement  $serviceAbonnement
     * @return \Illuminate\Http\Response
     */
    public function show(serviceAbonnement $serviceAbonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\serviceAbonnement  $serviceAbonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(serviceAbonnement $serviceAbonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceAbonnementRequest  $request
     * @param  \App\Models\serviceAbonnement  $serviceAbonnement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserviceAbonnementRequest $request, serviceAbonnement $serviceAbonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\serviceAbonnement  $serviceAbonnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(serviceAbonnement $serviceAbonnement)
    {
        //
    }
}
