<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rank;
use App\Models\User;

class UserRank extends Model
{
    use HasFactory;
      protected $table ="user_ranks";
      public function user()
      {

           return $this->belongsTo(User::class, 'user_id');

      }
      public function rank()
      {
          return $this->belongsTo(Rank::class,'rank_id');
      }
}
