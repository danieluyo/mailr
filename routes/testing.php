<?php

Route::group(['prefix'=>'mailgun', 'namespace'=>'Testing'], function(){
    Route::get('crear-lista/{nombreLista}', 'MailgunController@createList')->name('test.mailgun.listaCrear');
    Route::get('agregar-a-lista/{nombreLista}/{correo}', 'MailgunController@putMemberInList')->name('test.mailgun.putToList');
    Route::get('envia', 'MailgunController@envia')->name('test.mailgun.envia');
});