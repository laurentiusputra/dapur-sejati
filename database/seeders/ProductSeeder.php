<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {

        Product::query()->delete();
        
        $data = [
            // === DAILY MENU ===
            [
                'name' => 'Strawberry Juice', 
                'price' => 11000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'strawberry-juice.webp', 
                'description' => 'Jus segar dari stroberi pilihan dengan rasa manis alami kaya vitamin C dan antioksidan.'
            ],
            [
                'name' => 'Strawberry Milk Juice', 
                'price' => 13000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'strawberry-milk-juice.webp', 
                'description' => 'minuman segar yang memadukan stroberi pilihan dengan susu creamy berkualitas, menghasilkan cita rasa manis, lembut, dan menyegarkan.'
            ],
            [
                'name' => 'Puding Sedot Black Coffee', 
                'price' => 10000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'puding-black-coffee.webp', 
                'description' => 'perpaduan sempurna antara kelembutan puding dan aroma kopi hitam yang autentik.'
            ],
            [
                'name' => 'Puding Sedot Butterscoth', 
                'price' => 10000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'puding-butterscotch.webp', 
                'description' => 'perpaduan puding lembut dengan rasa butterscotch yang manis dan creamy.'
            ],
            [
                'name' => 'Dimsum Original', 
                'price' => 18000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'dimsum-original.webp', 
                'description' => 'cita rasa gurih autentik dan isian daging pilihan yang lezat.'
            ],
            [
                'name' => 'Dimsum Mentai', 
                'price' => 23000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'dimsum-mentai.webp', 
                'description' => 'dimsum premium yang dipadukan dengan saus mentai creamy dan gurih.'
            ],
            [
                'name' => 'Dimsum Bolognese', 
                'price' => 23000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'dimsum-bolognese.webp', 
                'description' => 'dimsum gurih dengan saus bolognese yang kaya rasa.'
            ],
            [
                'name' => 'Dimsum Bolognese-Mozarella', 
                'price' => 25000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'dimsum-bolognese-mozzarella.webp', 
                'description' => 'dimsum gurih, saus bolognese yang kaya rasa, dan lelehan keju mozzarella yang creamy.'
            ],
            [
                'name' => 'Ayam Bumbu Gojuchang', 
                'price' => 30000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'ayam-gojuchang.webp', 
                'description' => 'Ayam goreng crispy dengan balutan saus khas korea yang gurih, manis, dan pedas.'
            ],
            [
                'name' => 'Ayam Bumbu Bolognese', 
                'price' => 30000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'ayam-bolognese.webp', 
                'description' => 'ayam goreng crispy dengan saus tomat berbumbu khas Italia yang gurih.'
            ],
            [
                'name' => 'Ayam Bumbu Parmesan', 
                'price' => 30000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'ayam-parmesan.webp', 
                'description' => 'ayam goreng cripsy dengan topping keju parmesan yang gurih dan creamy.'
            ],
            [
                'name' => 'Dimsum Frozen', 
                'price' => 18000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'dimsum-frozen.webp', 
                'description' => 'Dimsum ayam premium beku dengan tekstur lembut dan rasa gurih.'
            ],
            [
                'name' => 'Nugget Frozen', 
                'price' => 15000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'nugget-frozen.webp', 
                'description' => 'Nugget ayam beku dengan lapisan tepung renyah dan isi daging ayam yang lembut serta juicy.'
            ],
            [
                'name' => 'Chicken Braised Frozen', 
                'price' => 45000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'chicken-braised-frozen.webp', 
                'description' => 'Ayam braised beku yang dimasak dengan teknik slow-cooking dan bumbu khas dilengkapi dengan sayur. Tinggal dipanaskan sebelum disajikan, praktis untuk hidangan sehari-hari maupun acara khusus.'
            ],
            [
                'name' => 'Kornet Ayam Frozen', 
                'price' => 20000, 
                'category' => 'daily', 
                'quota' => 0, 
                'stock' => 50,
                'image_path' => 'kornet-frozen.webp', 
                'description' => 'Home-made kornet ayam beku berkualitas dengan tekstur lembut dan rasa gurih yang kaya.'
            ],
            
            // === SPECIAL ORDER ===
            [
                'name' => 'Whole Chicken with BBQ Sauce', 
                'price' => 85000, 
                'category' => 'special', 
                'quota' => 0, 
                'stock' => 10,
                'image_path' => 'whole-chicken-bbq.webp', 
                'description' => 'Ayam utuh panggang yang dilapisi saus BBQ mengilap berwarna cokelat keemasan, disajikan secara bersama aneka sayuran segar.'
            ],
            
            // === PRE-ORDER (PO) MENU ===
            [
                'name' => 'Chicken Salad', 
                'price' => 20000, 
                'category' => 'po', 
                'quota' => 30, 
                'stock' => 30,
                'image_path' => 'chicken-salad.webp', 
                'description' => 'Salad ayam segar dengan potongan dada ayam panggang yang juicy, dipadukan dengan selada renyah, tomat ceri, mentimun, jagung manis, dan saus wijen creamy.'
            ],
            [
                'name' => 'Zuppa Soup', 
                'price' => 15000, 
                'category' => 'po', 
                'quota' => 50, 
                'stock' => 50,
                'image_path' => 'zuppa-soup.webp', 
                'description' => 'Sup krim hangat yang kaya rasa dengan isian ayam dan sayuran pilihan, disajikan dalam mangkuk yang ditutup puff pastry berlapis keemasan dan renyah.'
            ],
            [
                'name' => 'Mie Ayam Charsiu', 
                'price' => 17000, 
                'category' => 'po', 
                'quota' => 25, 
                'stock' => 25,
                'image_path' => 'mie-ayam-charsiu.webp', 
                'description' => 'Mie kenyal yang disajikan dengan irisan ayam charsiu manis gurih berwarna kemerahan, dilengkapi sayuran segar, daun bawang, dan kuah kaldu hangat.'
            ],
            [
                'name' => 'Baked Potato', 
                'price' => 15000, 
                'category' => 'po', 
                'quota' => 20, 
                'stock' => 20,
                'image_path' => 'baked-potato.webp', 
                'description' => 'Kentang panggang bertekstur lembut di dalam dan renyah di luar, diisi dengan campuran keju leleh, smoked beef, dan saus krim yang gurih.'
            ],
            [
                'name' => 'Macaroni Schootel', 
                'price' => 12000, 
                'category' => 'po', 
                'quota' => 40, 
                'stock' => 40,
                'image_path' => 'macaroni-schootel.webp', 
                'description' => 'Macaroni panggang dengan susu, keju, ayam cincang, dan sayuran pilihan.'
            ]
        ];

        foreach ($data as $item) {
            Product::create($item);
        }
    }
}