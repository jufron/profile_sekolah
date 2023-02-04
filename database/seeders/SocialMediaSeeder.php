<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-facebook"></i>',
        'nama'  => 'facebook'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-instagram"></i>',
        'nama'  => 'instagramm'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-twitter"></i>',
        'nama'  => 'twiter'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-linkedin"></i>',
        'nama'  => 'linkedin'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-youtube"></i>',
        'nama'  => 'youtube'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-tiktok"></i>',
        'nama'  => 'tik tok'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-github"></i>',
        'nama'  => 'github'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-pinterest"></i>',
        'nama'  => 'pinterest'
      ]);
      SocialMedia::create([
        'logo'  => '<i class="fa-brands fa-snapchat"></i>',
        'nama'  => 'snapchat'
      ]);
    }
}
