<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Create a new PostController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['show']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        return response(
            User::whereId($id)->get(['id', 'name'])->first(),
            Response::HTTP_ACCEPTED
        );
    }
}
