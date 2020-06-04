<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Total;
class CheckVisited
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('total')){
            $total=Total::first();
            $total->total++;
            $total->save();
            $request->session()->put("total",$total->total);
        }

        return $next($request);
    }
}
