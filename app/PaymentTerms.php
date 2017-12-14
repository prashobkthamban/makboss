<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTerms extends Model
{
	protected $table = 'mkb_payment_terms';

	protected $fillable = ['payment_terms_name'];
}
