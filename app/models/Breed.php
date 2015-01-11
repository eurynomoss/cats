<?php

class Breed extends Eloquent {
    public $timestamps = false;
    public function Cats(){
        return $this->hasMany('Cat');
    }

}