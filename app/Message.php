<?php

namespace Pico;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['body', 'user_id', 'rfid_tag', 'read'];
    //
}
