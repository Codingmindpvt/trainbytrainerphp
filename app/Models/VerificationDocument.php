<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationDocument extends Model
{
    use HasFactory;

    protected $table='user_coach_verification_documents';

    /*****************************************/

    /* VERIFICATION DOCUMENT TYPE CONST */

    /* [C = Certificate, I = Insurance] */

    /****************************************/
    const TYPE_CERTIFICATE = 'C';

    const TYPE_INSURANCE = 'I';
}
