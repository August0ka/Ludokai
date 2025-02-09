<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admins = [
            ['name' => 'Admin 1', 'email' => 'augusto@admin.com', 'password' => '123456'],
            ['name' => 'Admin 2', 'email' => 'admin2@example.com', 'password' => 'password2'],
        ];

        foreach ($admins as $admin) {
            Admin::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => Hash::make($admin['password']),
                ]
            );
        }

        $categories = [
            ['name' => 'Category A'],
            ['name' => 'Category B'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                ['name' => $category['name']]
            );
        }

        $users = [
            [
                'name' => 'Augusto Ferreira', 
                'email' => 'augusto@user.com', 
                'cpf' => '76736625076', 
                'address' => 'Address 1', 
                'city' => 'City A', 
                'state' => '11', 
                'cep' => '11111111', 
                'phone' => '5566999080622', 
                'password' => '123456'
            ],
            [
                'name' => 'User 2', 
                'email' => 'user2@example.com', 
                'cpf' => '90639164005', 
                'address' => 'Address 2', 
                'city' => 'City B', 
                'state' => '12', 
                'cep' => '22222222', 
                'phone' => '5566999458722', 
                'password' => '123456'
            ],
        ];
        

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'cpf' => $user['cpf'],
                    'address' => $user['address'],
                    'city' => $user['city'],
                    'state' => $user['state'],
                    'cep' => $user['cep'], 
                    'phone' => $user['phone'],
                    'password' => Hash::make($user['password']),
                ]
            );
        }

        $products = [
            ['name' => 'Product 1', 'description' => 'Description 1', 'price' => 10.00, 'category_id' => 1, 'quantity' => 100, 'main_image' => 'image1.jpg'],
            ['name' => 'Product 2', 'description' => 'Description 2', 'price' => 20.00, 'category_id' => 2, 'quantity' => 200, 'main_image' => 'image2.jpg'],
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['name' => $productData['name']],
                $productData
            );
        }


        $productImages = [
            ['product_id' => 1, 'image' => 'prod1_img1.jpg'],
            ['product_id' => 2, 'image' => 'prod2_img1.jpg'],
        ];

        foreach ($productImages as $imageData) {
            ProductImage::updateOrCreate(
                ['image' => $imageData['image']],
                $imageData
            );
        }


        $sales = [
            ['user_id' => 1, 'product_id' => 1, 'value' => 10.00, 'quantity' => 2, 'total' => 20.00],
            ['user_id' => 2, 'product_id' => 2, 'value' => 20.00, 'quantity' => 3, 'total' => 60.00],
        ];

        foreach ($sales as $saleData) {
            Sale::updateOrCreate(
                ['value' => $saleData['value']],
                $saleData
            );
        }
    }
}
