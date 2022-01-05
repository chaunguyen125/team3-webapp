<?php

Route::set('home', function() {
    // Index::CreateView('home');
    Index::index();
    
});
Route::set('episode-list', function() {
    EpisodeList::index();
});
Route::set('login', function() {
    Login::CreateView('login');
});

Route::set('my-playlist', function() {
    MyPlaylist::index();
    // MyPlaylist::CreateView('my-playlist');
});
Route::set('register', function() {
    Register::CreateView('register');
});

Route::set('logout', function(){
    Logout::CreateView('logout');
});

Route::set('update-user',function(){
    UpdateUser::index();
})
?>