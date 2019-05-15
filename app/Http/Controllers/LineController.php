<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Line;
use App\User;


use Log;


class LineController extends Controller
{
    public function create(Request $request, int $id)
    {
    	$line = new Line();
        $line->data = $request->linedata;
        $line->id_historial = $id;
        Log::info('Linedata que traemos:' .$request->linedata);
        $line->save();

    	return redirect('/'); 
    }

    public function update(Request $request, int $id, User $user)
    {
        
    	$line = new Line();
        $line->data = $request->linedata;
        $line->id_historial = $id;
        Log::info('Linedata que traemos:' .$request->linedata);
        $line->save();

    	return redirect('/'); 
    }

}
