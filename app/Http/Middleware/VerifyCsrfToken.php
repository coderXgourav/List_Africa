<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
      '/logout','admin/add-category','admin/dashboard/status','admin/update-category','admin/dashboard/category-delete','admin/save-listing','admin/dashboard/listing-status','admin/update-listing','admin/dashboard/listing-delete','admin/dashboard/listing-delete','user/register','user/login','user/logout','user/save-listing','user/dashboard/listing-delete','user/update-listing','listing/rating-submit','show-answers','admin/dashboard/password_change','user/password_change','/upload'
    ];
}
