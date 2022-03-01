<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'questions', 'answer', 'type', 'status', 'created_at', 'updated_at'];
    const STATUS_ACTIVE = 'A';

    const STATUS_SUSPENDED = 'S';
    public static function getStatusOptions()
    {
        return
            [
                self::STATUS_ACTIVE =>  'Active',
                self::STATUS_SUSPENDED =>  'Suspended',
            ];
    }

    public static function getStatusbadges()
    {
        return
            [
                self::STATUS_ACTIVE =>  'success',
                self::STATUS_SUSPENDED =>  'danger'
            ];
    }

    public function getStatus()
    {
        $list = self::getStatusOptions();
        $badges = self::getStatusbadges();
        return isset($list[$this->status]) ? "<span class='label label-" . $badges[$this->status] . "'>" . $list[$this->status] . "</span>" : "Not Defined";
    }
}
