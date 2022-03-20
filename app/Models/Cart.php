<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $sub_total, $tax, $grand_total;

     //const

     const TYPE_PROGRAM = 'P';

     const TYPE_CLASS = 'C';

    public static function getTypeOptions()
    {
    return
     [
          self::TYPE_PROGRAM =>  'Program',
          self::TYPE_CLASS =>  'Class',
     ];
    }

    public static function getTypebadges()
    {
    return
     [  
          self::TYPE_PROGRAM =>  'success',
          self::TYPE_CLASS =>  'info'
     ]; 
    }

     public function getType()
     {
          $list=self::getTypeOptions();
          $badges = self::getTypebadges();
          return isset($list[$this->type]) ? "<span class='label label-".$badges[$this->type]."'>".$list[$this->type]."</span>" : "Not Defined";
     }

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function program(){
        return $this->hasOne('App\Models\CoachProgram','id','program_id');
    }

    public function getCoachName($id){
         $data = User::where('id',$id)->first();
         return $data['first_name']." ".$data['last_name'];
    }


    public function getSubTotal($sum){

      return $this->sub_total = number_format((float)($sum), 2, '.', '');
    }

    public function getTaxAmount(){

       return $this->tax = number_format((float)(( 5 * $this->sub_total) / 100), 2, '.', '');
    }

    public function getGrandTotal(){

          return $this->grand_total = number_format((float)($this->sub_total + $this->tax), 2, '.', '');
    }


}
