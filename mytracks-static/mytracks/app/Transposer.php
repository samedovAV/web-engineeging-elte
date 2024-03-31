<?php

namespace App;

class Transposer {
  public function transpose(string $key, int $distance): string {
    $keys = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','H'];
    $pos = array_search($key, $keys);
    $newPos = ($pos + $distance) % 12;
    return $keys[$newPos];        
  }
} 