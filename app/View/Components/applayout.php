<?php

namespace App\View\Components;

use App\Traits\Method;
use Illuminate\View\Component;

class applayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    use Method;
    public $title;
    public $route;
    public $check1;
    public $check2;

    public function __construct($title = null, $route = [])
    {
        $this->title = $title;
        $this->route = ['Masuk', 'Daftar', 'Verifikasi Email', 'Konfirmasi Kata Sandi', 'Atur Ulang Kata Sandi', 'Email', 'Aktivasi Akun'];
        $this->check1 = $this->check_value();
        $this->check2 = $this->check_subcriteria();
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
