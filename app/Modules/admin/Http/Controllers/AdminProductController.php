<?php

namespace App\Modules\admin\Http\Controllers;

use App\Modules\site\Http\Repositories\ProductImageRepository;
use App\Modules\admin\Http\Repositories\CategoryRepository;
use App\Modules\site\Http\Repositories\ProductRepository;
use App\Modules\admin\Http\Requests\AdminProductRequest;
use Intervention\Image\Drivers\Gd\Encoders\WebpEncoder;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Throwable;

class AdminProductController extends Controller
{
    public function __construct(
        protected ProductImageRepository $productImageRepository,
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
    ) {}

    public function index()
    {
        $products = $this->productRepository->fetchAll();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->pluck();

        return view('admin.products.form', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $inputs = $request->validated();

        $mainImage = $request->file('main_image');

        $filename = 'product_' . Str::uuid() . '.webp';
        $path = "product_main_images/$filename";

        $this->compressImage($path, $mainImage);

        $inputs['main_image'] = $path;

        $product = $this->productRepository->create($inputs);

        $productImages = $request->file('product_images');
        foreach ($productImages as $productImage) {
            $filename = 'product_' . Str::uuid() . '.webp';
            $secondaryPath = "product_secondary_images/$filename";

            $this->compressImage($secondaryPath, $productImage);

            $this->productImageRepository->create([
                'product_id' => $product->id,
                'image' => $secondaryPath,
            ]);
        }
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->pluck();

        return view('admin.products.form', compact('product', 'categories'));
    }

    public function update(AdminProductRequest $request, product $product)
    {
        $inputs = $request->validated();
        if ($request->hasFile('main_image')) {
            Storage::disk('public')->delete($product->main_image);

            $mainImage = $request->file('main_image');
            $filename = 'product_' . Str::uuid() . '.webp';
            $path = "product_main_images/$filename";

            $this->compressImage($path, $mainImage);

            $inputs['main_image'] = $path;
        }

        if ($request->hasFile('product_images')) {
            $oldImages = $this->productImageRepository->fetchImageByProduct($product->id);

            foreach ($oldImages as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            $this->productImageRepository->deleteImageByProduct($product->id);

            $productImages = $request->file('product_images');
            foreach ($productImages as $productImage) {
                $filename = 'product_' . Str::uuid() . '.webp';
                $secondaryPath = "product_secondary_images/$filename";

                $this->compressImage($secondaryPath, $productImage);

                $this->productImageRepository->create([
                    'product_id' => $product->id,
                    'image' => $secondaryPath,
                ]);
            }
        }

        $this->productRepository->update($inputs, $product->id);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        try {
            $this->productRepository->delete($product->id);

            return response()->json(['success' => true, 'message' => 'Produto deletado com sucesso']);
        } catch (Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function removeSecondaryImage(Request $request)
    {
        try {
            $productId = $request->get('product_id');
            $secondaryImageId = $request->get('image_id');

            $this->productImageRepository->deleteSecondaryImageByProduct($productId, $secondaryImageId);

            return response()->json(['success' => true, 'message' => 'Imagem deletada com sucesso']);
        } catch (Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    private function compressImage($savePath, $image)
    {
        $imageManager = new ImageManager(new Driver());

        $img = $imageManager->read($image);
        $encodedImage = $img->encode(new WebpEncoder(quality: 40));
        $imageContent = $encodedImage->toString();

        Storage::disk('public')->put($savePath, $imageContent);
    }
}
