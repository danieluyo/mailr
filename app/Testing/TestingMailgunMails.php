<?php

namespace App\Testing;

use Illuminate\Database\Eloquent\Model;

class TestingMailgunMails extends Model
{
    protected $table = 'testing_mailgun_mails';
    protected $fillable = [
        'data'
    ];
}
