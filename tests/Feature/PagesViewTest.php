<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesViewTest extends TestCase
{
    public function test_home_pages ()
    {
      $this->get('home')
           ->assertStatus(200)
           ->assertViewIs('pages.beranda')
           ->assertSee('Beranda');
    }

    public function test_sejarah_pages ()
    {
      $this->get('profil/sejarah')
           ->assertStatus(200)
           ->assertViewIs('pages.sejarah')
           ->assertSeeText('Sejarah');
    }

    public function test_visiMisi_pages ()
    {
      $this->get('profil/visi-misi')
           ->assertStatus(200)
           ->assertViewIs('pages.visi-misi')
           ->assertSeeText('Visi Misi');
    }

    public function test_program_keahlian_pages ()
    {
      $this->get('profil/programKeahlian')
            ->assertStatus(200)
            ->assertViewIs('pages.programKeahlian')
            ->assertSeeText('Program Keahlian');
    }

    public function test_galeri_pages ()
    {
      $this->get('galeri')
           ->assertStatus(200)
           ->assertViewIs('pages.galeri')
           ->assertSee('Galeri');
    }

    public function test_ppdb_pages ()
    {
      $this->get('ppdb')
           ->assertStatus(200)
           ->assertViewIs('pages.ppdb')
           ->assertSee('PPDB');
    }

    public function test_blog_pages ()
    {
      $this->get('blog')
           ->assertStatus(200)
           ->assertViewIs('pages.blog')
           ->assertSee('Blog');
    }

    public function test_kontak_pages ()
    {
      $this->get('kontak')
           ->assertStatus(200)
           ->assertViewIs('pages.kontak')
           ->assertSee('Kontak');
    }

    public function test_list_guru_pages ()
    {
      $this->get('pengajar')
           ->assertStatus(200)
           ->assertViewIs('pages.daftarGuru')
           ->assertSee('Pengajar');
    }
}
