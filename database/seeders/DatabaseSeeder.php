<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insert into admins
        DB::table('admins')->insert([
            ['id' => 1, 'name' => 'Admin 1', 'email' => 'admin1@example.com', 'password' => 'password1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Admin 2', 'email' => 'admin2@example.com', 'password' => 'password2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Admin 3', 'email' => 'admin3@example.com', 'password' => 'password3', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Admin 4', 'email' => 'admin4@example.com', 'password' => 'password4', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Admin 5', 'email' => 'admin5@example.com', 'password' => 'password5', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Admin 6', 'email' => 'admin6@example.com', 'password' => 'password6', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Admin 7', 'email' => 'admin7@example.com', 'password' => 'password7', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Admin 8', 'email' => 'admin8@example.com', 'password' => 'password8', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Admin 9', 'email' => 'admin9@example.com', 'password' => 'password9', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Admin 10', 'email' => 'admin10@example.com', 'password' => 'password10', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert into categories
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Category A', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Category B', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Category C', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Category D', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Category E', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Category F', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Category G', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Category H', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Category I', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Category J', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert into users
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'User 1', 'email' => 'user1@example.com', 'cpf' => '111.111.111-11', 'address' => 'Address 1', 'city' => 'City A', 'state' => 'State A', 'password' => Hash::make('123456'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'User 2', 'email' => 'user2@example.com', 'cpf' => '222.222.222-22', 'address' => 'Address 2', 'city' => 'City B', 'state' => 'State B', 'password' => Hash::make('password2'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'User 3', 'email' => 'user3@example.com', 'cpf' => '333.333.333-33', 'address' => 'Address 3', 'city' => 'City C', 'state' => 'State C', 'password' => Hash::make('password3'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'User 4', 'email' => 'user4@example.com', 'cpf' => '444.444.444-44', 'address' => 'Address 4', 'city' => 'City D', 'state' => 'State D', 'password' => Hash::make('password4'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'User 5', 'email' => 'user5@example.com', 'cpf' => '555.555.555-55', 'address' => 'Address 5', 'city' => 'City E', 'state' => 'State E', 'password' => Hash::make('password5'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'User 6', 'email' => 'user6@example.com', 'cpf' => '666.666.666-66', 'address' => 'Address 6', 'city' => 'City F', 'state' => 'State F', 'password' => Hash::make('password6'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'User 7', 'email' => 'user7@example.com', 'cpf' => '777.777.777-77', 'address' => 'Address 7', 'city' => 'City G', 'state' => 'State G', 'password' => Hash::make('password7'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'User 8', 'email' => 'user8@example.com', 'cpf' => '888.888.888-88', 'address' => 'Address 8', 'city' => 'City H', 'state' => 'State H', 'password' => Hash::make('password8'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'User 9', 'email' => 'user9@example.com', 'cpf' => '999.999.999-99', 'address' => 'Address 9', 'city' => 'City I', 'state' => 'State I', 'password' => Hash::make('password9'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'User 10', 'email' => 'user10@example.com', 'cpf' => '000.000.000-00', 'address' => 'Address 10', 'city' => 'City J', 'state' => 'State J', 'password' => 'password10', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('products')->insert([
            ['id' => 1, 'name' => 'Product 1', 'description' => 'Description 1', 'price' => 10.00, 'category_id' => 1, 'quantity' => 100, 'main_image' => 'image1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Product 2', 'description' => 'Description 2', 'price' => 20.00, 'category_id' => 2, 'quantity' => 200, 'main_image' => 'image2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Product 3', 'description' => 'Description 3', 'price' => 30.00, 'category_id' => 3, 'quantity' => 300, 'main_image' => 'image3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Product 4', 'description' => 'Description 4', 'price' => 40.00, 'category_id' => 4, 'quantity' => 400, 'main_image' => 'image4.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Product 5', 'description' => 'Description 5', 'price' => 50.00, 'category_id' => 5, 'quantity' => 500, 'main_image' => 'image5.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Product 6', 'description' => 'Description 6', 'price' => 60.00, 'category_id' => 6, 'quantity' => 600, 'main_image' => 'image6.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Product 7', 'description' => 'Description 7', 'price' => 70.00, 'category_id' => 7, 'quantity' => 700, 'main_image' => 'image7.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Product 8', 'description' => 'Description 8', 'price' => 80.00, 'category_id' => 8, 'quantity' => 800, 'main_image' => 'image8.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Product 9', 'description' => 'Description 9', 'price' => 90.00, 'category_id' => 9, 'quantity' => 900, 'main_image' => 'image9.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Product 10', 'description' => 'Description 10', 'price' => 100.00, 'category_id' => 10, 'quantity' => 1000, 'main_image' => 'image10.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('product_images')->insert([
            ['id' => 1, 'product_id' => 1, 'image' => 'prod1_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'product_id' => 2, 'image' => 'prod2_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'product_id' => 3, 'image' => 'prod3_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'product_id' => 4, 'image' => 'prod4_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'product_id' => 5, 'image' => 'prod5_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'product_id' => 6, 'image' => 'prod6_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'product_id' => 7, 'image' => 'prod7_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'product_id' => 8, 'image' => 'prod8_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'product_id' => 9, 'image' => 'prod9_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'product_id' => 10, 'image' => 'prod10_img1.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('sales')->insert([
            ['id' => 1, 'user_id' => 1, 'product_id' => 1, 'value' => 10.00, 'quantity' => 2, 'total' => 20.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'user_id' => 2, 'product_id' => 2, 'value' => 20.00, 'quantity' => 3, 'total' => 60.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'user_id' => 3, 'product_id' => 3, 'value' => 30.00, 'quantity' => 1, 'total' => 30.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'user_id' => 4, 'product_id' => 4, 'value' => 40.00, 'quantity' => 5, 'total' => 200.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'user_id' => 5, 'product_id' => 5, 'value' => 50.00, 'quantity' => 2, 'total' => 100.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'user_id' => 6, 'product_id' => 6, 'value' => 60.00, 'quantity' => 1, 'total' => 60.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'user_id' => 7, 'product_id' => 7, 'value' => 70.00, 'quantity' => 4, 'total' => 280.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'user_id' => 8, 'product_id' => 8, 'value' => 80.00, 'quantity' => 3, 'total' => 240.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'user_id' => 9, 'product_id' => 9, 'value' => 90.00, 'quantity' => 1, 'total' => 90.00, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'user_id' => 10, 'product_id' => 10, 'value' => 100.00, 'quantity' => 6, 'total' => 600.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
