<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Noise-Cancelling Headphones',
                'sku' => 'PROD-WNCH-001',
                'description' => 'Premium over-ear headphones with active noise cancellation, 30-hour battery life, and multipoint Bluetooth connectivity.',
                'price' => 249.99,
                'stock' => 50,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Mechanical Keyboard TKL',
                'sku' => 'PROD-MKTKL-002',
                'description' => 'Tenkeyless mechanical keyboard with Cherry MX Blue switches, RGB backlighting, and a compact aluminium frame.',
                'price' => 129.99,
                'stock' => 35,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => '4K Ultra HD Monitor 27"',
                'sku' => 'PROD-MON27-003',
                'description' => '27-inch 4K IPS display with 144Hz refresh rate, HDR600, and USB-C power delivery up to 96W.',
                'price' => 599.99,
                'stock' => 20,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ergonomic Office Chair',
                'sku' => 'PROD-ERGO-004',
                'description' => 'Fully adjustable ergonomic chair with lumbar support, mesh back, and adjustable armrests for all-day comfort.',
                'price' => 399.00,
                'stock' => 15,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'USB-C Hub 10-in-1',
                'sku' => 'PROD-USBH-005',
                'description' => '10-in-1 USB-C hub with 4K HDMI, 100W PD, 3× USB-A 3.0, USB-C data, SD/MicroSD card slots, and Ethernet port.',
                'price' => 59.99,
                'stock' => 100,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Webcam 4K Pro',
                'sku' => 'PROD-WCAM-006',
                'description' => 'Professional 4K webcam with Sony sensor, auto-focus, built-in noise-cancelling microphone, and privacy shutter.',
                'price' => 199.99,
                'stock' => 40,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Standing Desk Converter',
                'sku' => 'PROD-SDKC-007',
                'description' => 'Height-adjustable desk converter that sits on top of any desk, supports dual monitors up to 27" each.',
                'price' => 279.00,
                'stock' => 25,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Portable SSD 1TB',
                'sku' => 'PROD-PSSD-008',
                'description' => 'Ultra-fast portable SSD with read speeds up to 2000MB/s, USB 3.2 Gen 2, rugged and shockproof casing.',
                'price' => 109.99,
                'stock' => 75,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Smartwatch Series X',
                'sku' => 'PROD-SWTX-009',
                'description' => 'Advanced smartwatch with health monitoring, GPS, 7-day battery, always-on display, and IP68 water resistance.',
                'price' => 349.00,
                'stock' => 30,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Desk LED Lamp',
                'sku' => 'PROD-DLMP-010',
                'description' => 'Smart LED desk lamp with adjustable colour temperature (2700K–6500K), 5 brightness levels, and wireless charging base.',
                'price' => 45.99,
                'stock' => 60,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Noise-Isolating Earbuds',
                'sku' => 'PROD-NIEB-011',
                'description' => 'Compact true-wireless earbuds with 8h playback, 32h total with case, IPX5 water resistance, and clear call quality.',
                'price' => 89.99,
                'stock' => 80,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Laptop Stand Aluminium',
                'sku' => 'PROD-LSAL-012',
                'description' => 'Premium aluminium foldable laptop stand with 6 height adjustments, compatible with 10"–17" laptops.',
                'price' => 39.99,
                'stock' => 0,
                'is_active' => false,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
