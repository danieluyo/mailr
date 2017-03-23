<?php

Route::group(['prefix'=>'mailgun', 'namespace'=>'Webhooks\Mailgun'], function (){
    Route::any('delivered', 'DeliveredController@index')->name('webhook.mailgun.delivered');
});
