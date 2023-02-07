<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventMemberRequest;
use App\Http\Requests\UpdateEventMemberRequest;
use App\Models\EventMember;

class EventMemberController extends Controller
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
     * @param  \App\Http\Requests\StoreEventMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function show(EventMember $eventMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function edit(EventMember $eventMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventMemberRequest  $request
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventMemberRequest $request, EventMember $eventMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventMember $eventMember)
    {
        //
    }
}
