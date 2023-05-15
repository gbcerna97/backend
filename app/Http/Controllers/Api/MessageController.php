<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Messages;
use App\Http\Requests\MessagesRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Messages::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(MessagesRequest $request)
    {
        $validated = $request->validated();
        
        $message = Messages::create($validated);

        return $message;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(MessagesRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $message = Messages::findorFail($id);
        $message->update($validated);

        return $message;
    }

}
