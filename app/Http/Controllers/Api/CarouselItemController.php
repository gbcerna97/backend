<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarouselItem;
use App\Http\Requests\CarouselItemRequest;

class CarouselItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarouselItem::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselItemRequest $request)
    {

        $validated = $request->validated();
        
        $carouselItem = CarouselItem::create($validated);

        return $carouselItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carouselItem = CarouselItem::where('carousel_item_id', $id)->firstorFail();

        return $carouselItem;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselItemRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $carouselItem = CarouselItem::findtorFail($id)->update($validated);

        return $carouselItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carouselItem = CarouselItem::findorFail($id);
        $carouselItem->delete();
        return $carouselItem;
    }
}
