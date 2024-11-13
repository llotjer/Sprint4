<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model{
    
    use HasFactory;

    protected $fillable = ['name', 'AKA', 'type', 'location'];

    public function gamesAsHome(){

        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function gamesAsAway(){
        
        return $this->hasMany(Game::class, 'away_team_id');
    }
}
