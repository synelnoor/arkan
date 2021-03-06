<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= [];
        $data['header'] = [
            ["name" => "Home", "link" => "home", "active" => true],
            ["name" => "FEATURES", "link" => "features", "active" => false],
            ["name" => "PRICINGS", "link" => "special", "active" => false],
            ["name" => "CLIENTS", "link" => "abouts", "active" => false],
            ["name" => "CONTACT US", "link" => "footer", "active" => false],
        ];

        $data['categories'] = [
            ["name" => "FAQ", "desc" => "footer", "price" => false, 'img' => ''],
            ["name" => "FAQ", "desc" => "footer", "price" => false, 'img' => ''],
            ["name" => "FAQ", "desc" => "footer", "price" => false, 'img' => ''],
        ];

        $data['product_spc'] = [
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/s1.png'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p2.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p3.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p4.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p5.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p6.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/s1.png'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p2.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p3.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p4.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p5.jpg'],
            ["name" => "Greens fava", "desc" => "Lorem ipsum dolor sit Pellentesque vel enim a", "price" => '12$', 'img' => 'images/p6.jpg'],
        ];

        $price_m = Barang::where('toko_id', 2)->get();
        $no = 1;
        foreach ($price_m as $key => $val) {
            $data['price_miayam'][ceil(count($price_m) / 2) <= $no ? 0 : 1][]=array(
                'name' => $val->nama_barang,
                'price' => $val->harga_jual,
                'toko' => $val->toko,
                'kategori'=>$val->kategori
            );
            $no++;
        }

        $no = 1;
        $price_s = Barang::where('toko_id', 1)->get();
        foreach ($price_s as $key => $val) {
            $data['price_saung'][ceil(count($price_s) / 2) <= $no ? 0 : 1][]=array(
                'name' => $val->nama_barang,
                'price' => $val->harga_jual,
                'toko' => $val->toko,
                'kategori'=>$val->kategori
            );
            $no++;
        }

        $data['about_us'] = "Cisadane adalah sebuah restoran yang ber tempat di ...";
        $data['footer']['facebook'] = 'https://www.facebook.com/pages/RM-Lesehan-Saung-Cisadane/594632560606701';
        $data['footer']['address'] = '3428 Magnolia Avenue Hackettstown, NJ 07840';
        $data['footer']['email'] = 'reservations@vegggie.com';
        $data['footer']['phone'] = '+48 202-555-0114';
        $data['footer']['latlng'] = '-6.347579,106.652969';

        return view('welcome')->with('data',$data);
    }
}
