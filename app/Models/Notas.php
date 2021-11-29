<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notas extends Model
{
    use HasFactory;

    public function getItemsAttribute(){
        return DB::table("ventas")->where("nota_id","=",$this->id)
        ->leftJoin("prendas","prenda_id","=","prendas.id")
        ->get();
    }


}
