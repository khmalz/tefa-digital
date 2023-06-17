<?php

namespace Database\Seeders;

use App\Models\Admin\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designs = [
            [
                'title' => 'Brosur',
                'category' => 'design',
                'image' => 'portfolios/design/brosur-1.jpg',
            ],
            [
                'title' => 'Brosur',
                'category' => 'design',
                'image' => 'portfolios/design/brosur-2.jpg',
            ],
            [
                'title' => 'Brosur',
                'category' => 'design',
                'image' => 'portfolios/design/brosur-3.jpg',
            ],
            [
                'title' => 'Brosur',
                'category' => 'design',
                'image' => 'portfolios/design/brosur-4.jpg',
            ],
            [
                'title' => 'Brosur',
                'category' => 'design',
                'image' => 'portfolios/design/brosur-5.jpg',
            ],
            [
                'title' => 'Logo',
                'category' => 'design',
                'image' => 'portfolios/design/logo-1.png',
            ],
            [
                'title' => 'Logo',
                'category' => 'design',
                'image' => 'portfolios/design/logo-2.png',
            ],
            [
                'title' => 'Logo',
                'category' => 'design',
                'image' => 'portfolios/design/logo-3.png',
            ],
            [
                'title' => 'Logo',
                'category' => 'design',
                'image' => 'portfolios/design/logo-4.png',
            ],
            [
                'title' => 'Logo',
                'category' => 'design',
                'image' => 'portfolios/design/logo-5.png',
            ],
        ];

        $photographies = [
            [
                'title' => 'Acara',
                'category' => 'photography',
                'image' => 'portfolios/photography/acara-1.jpg',
            ],
            [
                'title' => 'Acara',
                'category' => 'photography',
                'image' => 'portfolios/photography/acara-2.jpg',
            ],
            [
                'title' => 'Acara',
                'category' => 'photography',
                'image' => 'portfolios/photography/acara-3.jpg',
            ],
            [
                'title' => 'Acara',
                'category' => 'photography',
                'image' => 'portfolios/photography/acara-4.jpg',
            ],
            [
                'title' => 'Acara',
                'category' => 'photography',
                'image' => 'portfolios/photography/acara-5.jpg',
            ],
            [
                'title' => 'Pernikahan',
                'category' => 'photography',
                'image' => 'portfolios/photography/pernikahan-1.jpg',
            ],
            [
                'title' => 'Pernikahan',
                'category' => 'photography',
                'image' => 'portfolios/photography/pernikahan-2.jpg',
            ],
            [
                'title' => 'Pernikahan',
                'category' => 'photography',
                'image' => 'portfolios/photography/pernikahan-3.jpg',
            ],
            [
                'title' => 'Pernikahan',
                'category' => 'photography',
                'image' => 'portfolios/photography/pernikahan-4.jpg',
            ],
            [
                'title' => 'Produk',
                'category' => 'photography',
                'image' => 'portfolios/photography/produk-1.jpg',
            ],
            [
                'title' => 'Produk',
                'category' => 'photography',
                'image' => 'portfolios/photography/produk-2.jpg',
            ],
            [
                'title' => 'Produk',
                'category' => 'photography',
                'image' => 'portfolios/photography/produk-3.jpg',
            ],
            [
                'title' => 'Produk',
                'category' => 'photography',
                'image' => 'portfolios/photography/produk-4.jpg',
            ],
            [
                'title' => 'Produk',
                'category' => 'photography',
                'image' => 'portfolios/photography/produk-5.jpg',
            ],
        ];

        $videographies = [
            [
                'title' => 'Video',
                'category' => 'videography',
                'image' => 'portfolios/videography/1.jpeg',
            ],
            [
                'title' => 'Video',
                'category' => 'videography',
                'image' => 'portfolios/videography/2.jpeg',
            ],
            [
                'title' => 'Video',
                'category' => 'videography',
                'image' => 'portfolios/videography/3.jpeg',
            ],
            [
                'title' => 'Video',
                'category' => 'videography',
                'image' => 'portfolios/videography/4.jpeg',
            ],
            [
                'title' => 'Video',
                'category' => 'videography',
                'image' => 'portfolios/videography/5.jpeg',
            ],
            [
                'title' => 'Video',
                'category' => 'videography',
                'image' => 'portfolios/videography/6.jpeg',
            ],
        ];


        $printings = [
            [
                'title' => 'Printing',
                'category' => 'printing',
                'image' => 'portfolios/printing/printing-1.jpg',
            ],
            [
                'title' => 'Printing',
                'category' => 'printing',
                'image' => 'portfolios/printing/printing-2.jpg',
            ],
            [
                'title' => 'Printing',
                'category' => 'printing',
                'image' => 'portfolios/printing/printing-3.jpg',
            ],
        ];

        $allPortfolios = collect($designs)
            ->concat($photographies)
            ->concat($videographies)
            ->concat($printings);

        $allPortfolios->each(function ($portfolio) {
            Portfolio::create($portfolio);
        });
    }
}
