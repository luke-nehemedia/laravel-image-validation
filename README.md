# laravel-image-validation
An Laravel 5 Serviceprovider for ImageValidationRules

A German Blog post about this ServiceProvider can be found [here](http://luke.nehemedia.de/2015/07/10/laravel-5-image-validation/ ).

## Requirements 
- Laravel >5.0
- [Intervention Image](http://image.intervention.io)

## Installation
1) Install [Intervention Image](http://image.intervention.io) (e.g. via composer) and register it's ServiceProvider and Alias in app/config.php
2) Download ImageValidationServiceProvider.php and copy into your App/Providers directory
3) Register the ServiceProvider
```php
$providers = [
    'App\Providers\ImageValidationServiceProvider',
    ...
];
``` 

## Example
I recommend highly to use Requests for form validation in Laravel 5. More details on using those Requests can be found in the [Laravel Documentation](http://laravel.com/docs/5.0/requests).

This example shows a request that validates an image to be quadratic with a with and height of minimum 500px.
```php
<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'grafik'     =>  'image|ratio_equal:1|height_larger:499|width_larger:499',
        ];
    }
}
``` 

## Documentation
The following rules are implemented:
- width_larger 
- width_smaller
- width_equal
- height_larger
- height_smaller
- height_equal
- ratio_larger
- ratio_smaller
- ratio_equal

## Feedback
Feel free to give feedback or ask for more validation rules.
