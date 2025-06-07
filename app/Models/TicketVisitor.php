<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketVisitor extends Model
{
    use HasFactory;

    protected $table = 'ticket_visitor';

    protected $fillable = ['name', 'price', 'id_ticket'];
}
