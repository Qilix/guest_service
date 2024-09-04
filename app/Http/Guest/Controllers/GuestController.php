<?php

namespace App\Http\Guest\Controllers;

use App\Http\Common\Controllers\Controller;
use App\Http\Guest\DTOs\GuestCreateDTO;
use App\Http\Guest\DTOs\GuestUpdateDTO;
use App\Http\Guest\Requests\GuestRequest;
use App\Http\Guest\Services\GuestServices;
use App\Models\Guest;

class GuestController extends Controller
{
    protected GuestServices $service;
    public function __construct(GuestServices $service){
        $this->service = $service;
    }
    public function index()
    {
        return $this->service->index();
    }
    public function store(GuestRequest $request)
    {
        try {
            $guest = $this->service->store(new GuestCreateDTO(...$request->all()));
        }catch(\Exception $e){
            return response(['error' => $e->getMessage()], 500);
        }
        return response(['message' => __('Success store.'), 'data' => $guest]);
    }

    public function show(Guest $guest)
    {
        return $this->service->show($guest);
    }

    public function update(GuestRequest $request, Guest $guest)
    {
        try{
        $guest = $this->service->update(new GuestUpdateDTO(...$request->all()), $guest);
        }catch(\Exception $e){
            return response(['error' => $e->getMessage()], 500);
        }
        return response(['message' => __('Success update.'), 'data' => $guest]);
    }

    public function destroy(Guest $guest)
    {
        $this->service->destroy($guest);

        return response(['message' => __('Success deleted.')]);
    }

}
