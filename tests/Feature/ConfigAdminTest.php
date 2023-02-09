<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ConfigAdminTest extends TestCase
{
  public function test_call_name ()
  {
    $name = Config::has('superAdmin.admin-name');
    $this->assertTrue($name);
    $this->assertEquals('super administrator', config('superAdmin.admin-name'));
    // config excist
    if (!config('superAdmin.admin-name')) {
      $this->fail('config admin name tidak ditemukan');
    }

  }

  public function test_call_email ()
  {
    $email = Config::has('superAdmin.admin-email');
    $this->assertTrue($email);
    $this->assertEquals('superadministrator@smkuyelindo.com', config('superAdmin.admin-email'));
    if (!config('superAdmin.admin-email')) {
      $this->fail('config admin email tidak ditemukan');
    }
  }

  public function test_check_excist_password ()
  {
    $password = Config::has('superAdmin.admin-email');
    $this->assertTrue($password);
  }
}
