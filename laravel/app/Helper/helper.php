<?php
use Pusher\Pusher;

function sendNotify($channel,$event,$data){
    $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
    );
    $pusher = new Pusher(
        '6c3775f766196d272451',
        '05df2aaefed4a7378ff6',
        '797719',
        $options
    );

    $pusher->trigger($channel, $event, $data);
}

function adminUrl($path){
    return url("/admin/".$path);
}

function adminPath($path){
    return "/admin/"+$path;
}

function adminRedirect($path,$error=false,$with){
    if($error){
        return redirect("/admin/"+$path)->withErrors($with);
    }
    return redirect("/admin/"+$path)->with($with);
}
