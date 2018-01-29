<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
	protected $table = "ordenes";
	
	protected $fillable = [
				"carrito_id", "line1", "line2", 
				"city", "postal_code", "country_code", 
				"state", "recipient_name", "email", 
				"status", "guide_number", "total"
	];

    public function scopeLatest($query){
        return $query->orderID()->mes();
    }

    public function scopeOrderID($query){
        return $query->orderBy("id", "desc");
    }

    public function scopeMes($query){
        return $query->whereMonth("created_at", "=", date("m"));
    }
    // relaciones
    public function carrito(){
        return $this->belongsTo('App\Carrito', 'carrito_id');
    }

    public static function respuestaPaypal($response, $carrito){
    	$payer = $response->payer;

    	$orden = (array) $payer->payer_info->shipping_address;

    	$orden = $orden[key($orden)];

    	$orden["email"] = $payer->payer_info->email;
    	$orden["total"] = $carrito->totalUSD();
    	$orden["carrito_id"] = $carrito->id;

    	return Orden::create($orden);
    }

    public static function totalMes(){
        return Orden::mes()->sum("total");
    }

    public static function totalMesCount(){
        return Orden::mes()->count();
    }
}
