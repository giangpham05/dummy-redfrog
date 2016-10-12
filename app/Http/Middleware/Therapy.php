<?php
/**
 * Created by PhpStorm.
 * User: GIANGPHAM
 * Date: 11/10/2016
 * Time: 12:38 PM
 */

namespace App\Http\Middleware;
use Closure;

class Therapy
{

    public function handle($request, Closure $next)
    {

        if ( Auth::check() && Auth::user()->isTherapist() )
        {
            return $next($request);
        }

        return back();

    }
}