<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        return view('pages.author', [
            'seoKey' => 'author',
            'tPrefix' => 'pages/author',
            'profileImage' => asset('assets/author/profile/oleksandr-stanov.jpg'),
            'icons' => [
                'telegram' => asset('assets/author/icon/telegram.svg'),
                'whatsapp' => asset('assets/author/icon/whatsapp.svg'),
            ],
            'links' => [
                'telegram' => 'https://t.me/AleksandrStanov',
                'whatsapp' => 'https://wa.me/491735141827',
            ],
        ]);
    }
}
