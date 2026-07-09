<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // === DAILY MENU (Quota set 0 atau sesuaikan) ===
            ['name' => 'Strawberry Juice', 'price' => 11000, 'category' => 'daily', 'quota' => 0, 'image' => 'strawberry-juice.webp', 'narration' => 'Jus segar dari stroberi pilihan dengan rasa manis alami kaya vitamin C dan antioksidan.'],
            ['name' => 'Strawberry Milk Juice', 'price' => 13000, 'category' => 'daily', 'quota' => 0, 'image' => 'strawberry-milk-juice.webp', 'narration' => 'Minuman segar yang memadukan stroberi pilihan dengan susu creamy berkualitas, menghasilkan cita rasa manis, lembut, dan menyegarkan.'],
            ['name' => 'Puding Sedot Black Coffee', 'price' => 10000, 'category' => 'daily', 'quota' => 0, 'image' => 'puding-black-coffee.webp', 'narration' => 'Perpaduan sempurna antara kelembutan puding dan aroma kopi hitam yang autentik.'],
            ['name' => 'Puding Sedot Butterscotch', 'price' => 10000, 'category' => 'daily', 'quota' => 0, 'image' => 'puding-butterscotch.webp', 'narration' => 'Perpaduan puding lembut dengan rasa butterscotch yang manis dan creamy.'],
            ['name' => 'Dimsum Original', 'price' => 18000, 'category' => 'daily', 'quota' => 0, 'image' => 'dimsum-original.webp', 'narration' => 'Cita rasa gurih autentik dan isian daging pilihan yang lezat.'],
            ['name' => 'Dimsum Mentai', 'price' => 23000, 'category' => 'daily', 'quota' => 0, 'image' => 'dimsum-mentai.webp', 'narration' => 'Dimsum premium yang dipadukan dengan saus mentai creamy dan gurih.'],
            ['name' => 'Dimsum Bolognese', 'price' => 23000, 'category' => 'daily', 'quota' => 0, 'image' => 'dimsum-bolognese.webp', 'narration' => 'Dimsum gurih dengan saus bolognese yang kaya rasa.'],
            ['name' => 'Dimsum Bolognese-Mozarella', 'price' => 25000, 'category' => 'daily', 'quota' => 0, 'image' => 'dimsum-bolognese-mozzarella.webp', 'narration' => 'Dimsum gurih, saus bolognese yang kaya rasa, dan lelehan keju mozzarella yang creamy.'],
            ['name' => 'Ayam Bumbu Gojuchang', 'price' => 30000, 'category' => 'daily', 'quota' => 0, 'image' => 'ayam-gojuchang.webp', 'narration' => 'Ayam goreng crispy dengan balutan saus khas Korea yang gurih, manis, dan pedas.'],
            ['name' => 'Ayam Bumbu Bolognese', 'price' => 30000, 'category' => 'daily', 'quota' => 0, 'image' => 'ayam-bolognese.webp', 'narration' => 'Ayam goreng crispy dengan saus tomat berbumbu khas Italia yang gurih.'],
            ['name' => 'Ayam Bumbu Parmesan', 'price' => 30000, 'category' => 'daily', 'quota' => 0, 'image' => 'ayam-parmesan.webp', 'narration' => 'Ayam goreng crispy dengan topping keju parmesan yang gurih dan creamy.'],
            ['name' => 'Dimsum Frozen', 'price' => 18000, 'category' => 'daily', 'quota' => 0, 'image' => 'dimsum-frozen.webp', 'narration' => 'Dimsum ayam premium beku dengan tekstur lembut dan rasa gurih.'],
            ['name' => 'Nugget Frozen', 'price' => 15000, 'category' => 'daily', 'quota' => 0, 'image' => 'nugget-frozen.webp', 'narration' => 'Nugget ayam beku dengan lapisan tepung renyah dan isi daging ayam yang lembut serta juicy.'],
            ['name' => 'Chicken Braised Frozen', 'price' => 45000, 'category' => 'daily', 'quota' => 0, 'image' => 'chicken-braised-frozen.webp', 'narration' => 'Ayam braised beku yang dimasak dengan teknik slow-cooking dan bumbu khas dilengkapi dengan sayur. Praktis tinggal dipanaskan.'],
            ['name' => 'Kornet Ayam Frozen', 'price' => 20000, 'category' => 'daily', 'quota' => 0, 'image' => 'kornet-frozen.webp', 'narration' => 'Home-made kornet ayam beku berkualitas dengan tekstur lembut dan rasa gurih yang kaya.'],
            
            // === SPECIAL ORDER ===
            ['name' => 'Whole Chicken with BBQ Sauce', 'price' => 85000, 'category' => 'special', 'quota' => 0, 'image' => 'whole-chicken-bbq.webp', 'narration' => 'Ayam utuh panggang yang dilapisi saus BBQ mengilap berwarna cokelat keemasan, disajikan bersama aneka sayuran segar.'],
            
            // === PRE-ORDER (PO) MENU (Dikasih quota > 0 biar lolos query filter di CatalogController) ===
            ['name' => 'Chicken Salad', 'price' => 20000, 'category' => 'po', 'quota' => 30, 'image' => 'chicken-salad.webp', 'narration' => 'Salad ayam segar dengan potongan dada ayam panggang yang juicy, dipadukan dengan selada renyah, tomat ceri, mentimun, jagung manis, dan saus wijen creamy.'],
            ['name' => 'Zuppa Soup', 'price' => 15000, 'category' => 'po', 'quota' => 50, 'image' => 'zuppa-soup.webp', 'narration' => 'Sup krim hangat yang kaya rasa dengan isian ayam dan sayuran pilihan, disajikan dalam mangkuk pastry lezat keemasan.'],
            ['name' => 'Mie Ayam Charsiu', 'price' => 17000, 'category' => 'po', 'quota' => 25, 'image' => 'mie-ayam-charsiu.webp', 'narration' => 'Mie kenyal yang disajikan dengan irisan ayam charsiu manis gurih berwarna kemerahan, lengkap dengan sayur dan kuah kaldu.'],
            ['name' => 'Baked Potato', 'price' => 15000, 'category' => 'po', 'quota' => 20, 'image' => 'baked-potato.webp', 'narration' => 'Kentang panggang lembut di dalam renyah di luar, diisi keju leleh, smoked beef, dan saus krim gurih.'],
            ['name' => 'Macaroni Schootel', 'price' => 12000, 'category' => 'po', 'quota' => 40, 'image' => 'macaroni-schootel.webp', 'narration' => 'Macaroni panggang dengan susu, keju, ayam cincang, dan sayuran pilihan.']
        ];

        foreach ($data as $item) {
            Product::create($item);
        }
    }
}