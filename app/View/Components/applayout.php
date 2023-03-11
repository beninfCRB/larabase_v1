<?php

namespace App\View\Components;

use Illuminate\View\Component;

class applayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $route;

    public function __construct($title = null, $route = [])
    {
        $this->title = $title;
        $this->route = ['Masuk', 'Daftar', 'Verifikasi Email', 'Konfirmasi Kata Sandi', 'Atur Ulang Kata Sandi', 'Email', 'Aktivasi Akun'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.app');
    }
}
