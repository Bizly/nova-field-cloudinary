<?php

use Cloudinary\Asset\Media;
use Illuminate\Support\Str;

if (!function_exists('cloudinary_fetch')) {
    /**
     * Get an optimised public url for an image by it's public id
     *
     * @param string $path
     * @param array $options
     * @param string $disk
     * @return string
     */
    function cloudinary_fetch(string $path, array $options = [], string $disk = 'cloudinary')
    {
        if (is_array($path)) {
            return Media::fromParams($path['public_id'], $path['options']);
        }

        return Media::fromParams($path);
    }
}

if (!function_exists('cloudinary_image')) {
    /**
     * Get an optimised public url for an image by it's public id
     *
     * @param string $path
     * @param array $options
     * @param string $disk
     * @return string
     */
    function cloudinary_image(string $path, array $options = [], string $disk = 'cloudinary')
    {
        $options = array_merge(['resource_type' => 'image'], $options);

        return cloudinary_fetch($path, $options, $disk);
    }
}

if (!function_exists('cloudinary_audio')) {
    /**
     * Get an optimised public url for an audio file by it's public id
     *
     * @param string $path
     * @param array $options
     * @param string $disk
     * @return string
     */
    function cloudinary_audio(string $path, array $options = [], string $disk = 'cloudinary')
    {
        $options = array_merge(['resource_type' => 'video'], $options);

        return cloudinary_fetch($path, $options, $disk);
    }
}

if (!function_exists('cloudinary_video')) {
    /**
     * Get an optimised public url for a video file by it's public id
     *
     * @param string $path
     * @param array $options
     * @param string $disk
     * @return string
     */
    function cloudinary_video(string $path, array $options = [], string $disk = 'cloudinary')
    {
        $options = array_merge(['resource_type' => 'video'], $options);

        return cloudinary_fetch($path, $options, $disk);
    }
}

if (!function_exists('cloudinary_file')) {
    /**
     * Get an optimised public url for a file by it's public id
     *
     * @param string $path
     * @param array $options
     * @param string $disk
     * @return string
     */
    function cloudinary_file(string $path, array $options = [], string $disk = 'cloudinary')
    {
        $options = array_except($options, ['resource_type']);

        return cloudinary_fetch($path, $options, $disk);
    }
}
