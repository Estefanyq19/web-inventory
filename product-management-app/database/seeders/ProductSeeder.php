<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Insertar productos de ejemplo
        Product::create([
            'name' => 'laptop lenovo',//nombre
            'description' => 'laptop última generación, pantalla táctil',//descripción
            'unit_price' => 500.00,//precio unitarios
            'initial_quantity' => 100,//cantidad inicial del producto
            'current_quantity' => 10,//cantidad actual que estará disponible en el inventario
        ]);

        Product::create([
            'name' => 'Smartphone',
            'description' => 'Samsung galaxy a20',
            'unit_price' => 150.00,
            'initial_quantity' => 15,
            'current_quantity' => 5,
        ]);

        Product::create([
            'name' => 'reloj',
            'description' => 'Apple watch',
            'unit_price' => 50.00,
            'initial_quantity' => 5,
            'current_quantity' => 3,
        ]);
        Product::create([
            'name' => 'Mouse',
            'description' => 'Mouse inalámbrico con batería incluída',
            'unit_price' => 14.00,
            'initial_quantity' => 20,
            'current_quantity' => 6,
        ]);
    }
}
