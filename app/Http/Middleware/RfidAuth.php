<?php

namespace Pico\Http\Middleware;

use Closure;
use Pico\User;

class RfidAuth
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
        // check if user exists with rfid_token
        if(null !== ($request->get('rfid_tag'))){

          if (User::where('rfid_tag', '=', $request->get('rfid_tag'))->exists()) {

          } else {
            //return redirect('first_login');
            $request->request->add(['message' => 'first login']);
          }
        } else {
          //return redirect('no_rfid_tag');
          $request->request->add(['message' => 'no rfid tag']);
        }

        return $next($request);




    }
}
