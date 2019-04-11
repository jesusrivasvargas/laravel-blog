<?php

Route::get('/',  'HomeController@welcome')->name('welcome'); 
Auth::routes();
Route::get('/changePassword','Auth\ChangePassword@showChangePasswordForm');
Route::post('/changePassword','Auth\ChangePassword@changePassword')->name('changePassword');
Route::get('/home', 'HomeController@index')->name('home');
Route::resources([
    'budgets' => 'BudgetController',
    'categories' => 'CategoryController',
    'comments' => 'CommentController',
    'followers' => 'FollowerController',
    'messages' => 'MessageController',
    'posts' => 'PostController',
    'profiles' => 'ProfileController',
    'requirements' => 'RequirementController',
    'subcategories' => 'SubcategoryController',
]);
Route::post('avatar/store', 'ProfileController@avatarStore')->name('avatar.store');