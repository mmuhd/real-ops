<?php

namespace App\Http\Controllers\Tenant\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenants\StoreFlight;
use App\Http\Requests\Tenants\UpdateFlight;
use App\Models\Tenants\Event;
use App\Models\Tenants\Flight;
use App\Services\Tenants\FlightService;

class FlightController extends Controller
{
    /**
     * @var FlightService
     */
    protected $flightService;

    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    public function store(StoreFlight $request, Event $slug)
    {
        $this->flightService->storeFlight($request);
        return redirect()->route('tenants.office.events.flights.index', $slug);
    }

    public function destroy(Event $slug, Flight $callsign)
    {
        $this->flightService->destroyFlight($callsign);
        return redirect()->route('tenants.office.events.flights.index', $slug);
    }

    public function update(UpdateFlight $request, Event $slug, Flight $callsign)
    {
        $this->flightService->updateFlight($request, $callsign);
        return redirect()->route('tenants.office.events.flights.index', $slug);
    }
}