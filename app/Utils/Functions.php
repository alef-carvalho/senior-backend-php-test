<?php

if(!function_exists('storage_cloud_url'))
{
    function storage_cloud_url($file)
    {
        return \Illuminate\Support\Facades\Storage::temporaryUrl($file, now()->addMinute());
    }
}

if(!function_exists('storage_url'))
{
    function storage_url($file)
    {
        return \Illuminate\Support\Facades\Storage::url($file);
    }
}