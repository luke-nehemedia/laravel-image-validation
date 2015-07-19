<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\Facades\Image;
use Validator;

/**
 *  Image Validation Serviceprovider
 *
 *  This Serviceprovider hosts a set of basic image validation rules to use in Laravel's
 *  validation service or in Requests.
 *
 *  @author Lucas Bares <luke@nehemedia.de>
 *  @uses Intervention\Image\ImageServiceProvider
 *
 */
class ImageValidationServiceProvider extends ServiceProvider
{
    /**
     * Defines the validation rules
     *
     * @return void
     */
    public function boot()
    {
        // Image Width
        Validator::extend('width_larger', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return ($img->width() > $parameters[0]);
        });

        Validator::extend('width_equal', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return ($img->width() == $parameters[0]);
        });

        Validator::extend('width_smaller', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return ($img->width() < $parameters[0]);
        });

        // Image Height
        Validator::extend('height_larger', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return ($img->height() > $parameters[0]);
        });

        Validator::extend('height', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return ($img->height() == $parameters[0]);
        });

        Validator::extend('height_smaller', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return ($img->height() < $parameters[0]);
        });

        // Image Ratio
        Validator::extend('ratio_smaller', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return (round($img->width()/$img->height(),2) < $parameters[0]);
        });

        Validator::extend('ratio_equal', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return (round($img->width()/$img->height(),2) == $parameters[0]);
        });

        Validator::extend('ratio_larger', function($attribute, $value, $parameters) {
            $img = Image::make($value);
            return (round($img->width()/$img->height(),2) > $parameters[0]);
        });
    }

    public function register()
    {
        //
    }
}
