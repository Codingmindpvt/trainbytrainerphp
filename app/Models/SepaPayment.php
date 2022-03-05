<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepaPayment extends Model
{
    use HasFactory;

    public $sub_total, $tax, $grand_total;

    protected $fillable = ['payment_id', 'amount', 'customer_id', 'user_id', 'city', 'country', 'line1', 'line2', 'postal_code', 'state', 'email', 'name', 'phone', 'bank_code', 'branch_code', 'fingerprint', 'last4', 'mandate', 'payment_type', 'payment_method'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
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

      public function order_list(){
          return $this->hasMany(OrderList::class, 'sepa_payment_id', 'id');
      }

}