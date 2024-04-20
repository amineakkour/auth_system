<?php

namespace App\Services;

class Calcul
{
    public function sum(...$nums) {
      return array_sum($nums);
    }
}