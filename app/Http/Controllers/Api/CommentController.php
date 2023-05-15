<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

 

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();
        
        $comment = Comment::create($validated);

        return $comment;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $comment = Comment::findorFail($id);
        $comment->update($validated);

        return $comment;
    }

}
