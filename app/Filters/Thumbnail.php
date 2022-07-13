<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Thumbnail
{
    /**
     * Store the specified resource to a specified disk.
     *
     * @param Request $request
     * @param String $directory
     *
     * @return false|string
     */
    public function storeThumbnail(Request $request, String $directory)
    {
        if (env('APP_ENV') == 'production')
            return $request->file('thumbnail')
                ->store('laravel-community/img/' . $directory, 'laravelcommunity');
        else
            return $request->file('thumbnail')
                ->store('img/categories', 'public');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $path
     * @return void
     */
    public function deleteThumbnail(String $path)
    {
        if (env('APP_ENV') == 'production')
            !Storage::disk('laravelcommunity')->exists($path) ?:
                Storage::disk('laravelcommunity')->delete($path);
        else
            !Storage::disk('public')->exists($path) ?:
                Storage::disk('public')->delete($path);
    }

}
