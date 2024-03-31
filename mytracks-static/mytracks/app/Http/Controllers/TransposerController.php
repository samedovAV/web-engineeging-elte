<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Validation\Rule;

class TransposerController extends Controller 
{
  public function transpose(Request $request) 
  {
    $view = view('transposer');
    
    if ($request->has(['key', 'distance'])) {

      // set up validator
      $validator = Validator::make($request->only(['key', 'distance']), [
        'key' => [
          'required', 
          Rule::in(['C','C#','D','D#','E','F','F#','G','G#','A','A#','H']),
        ],
        'distance'  => 'required|integer'
      ]);

      if ($validator->fails()) {

        // there are errors
        $errors = $validator->errors();
        $veb = new ViewErrorBag();
        $veb->put('default', $errors);
        $view->with('errors', $veb);

      } else {
        
        // valid
        $data = $validator->validated();
        $key = $data['key'];
        $distance = (int)$data['distance'];
        $transposer = new \App\Transposer();
        $newKey = $transposer->transpose($key, $distance);
        $view->with('newKey', $newKey);

      }
    }
    return $view;
  }
} 