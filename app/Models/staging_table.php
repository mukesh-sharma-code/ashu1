<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staging_table extends Model
{
    use HasFactory;
    protected $table = "staging_table";
    protected $fillable = [
        'Source',
        'Subject',
        'OrderDate',
        'Price',
        'Earning',
        'Email',
        'Item',
        'Claim',
        'Name',
        'OrderID',
        'To',
        'Decision',
        'Granted/Denied',
        'Date',
        'Subtotal',
        'Discount',
        'GiftCard',
        'Refund_Value',
        'Total_Refund'
    ];
    public $timestamps = false;
}
