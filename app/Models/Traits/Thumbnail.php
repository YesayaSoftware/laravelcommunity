<?php


namespace App\Models\Traits;


trait Thumbnail
{
    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (env('APP_ENV') == 'production')
            return $this->cloudUrl();
        else
            return $this->defaultLocalUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultLocalUrl(): string
    {
        return config('filesystems.disks.laravelcommunity.endpoint_url') . $this->thumbnail;
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function cloudUrl(): string
    {
        return config('filesystems.disks.laravelcommunity.endpoint_url') . $this->thumbnail;
    }
}
