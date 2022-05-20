<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\ProductInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Admin\Product;
use App\Repository\Admin\ProductRepository;
use App\Services\Admin\ProductService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponser;
    private $ProductRepository;

    public function __construct(ProductInterface $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
        $this->middleware('store')->except('index', 'show');
    }

    public function index()
    {
        return $this->ProductRepository->all();
    }

    public function show(Product $product)
    {
        return $this->ProductRepository->show($product);
    }

    public function store(ProductRequest $request)
    {
        $parms = $request->all();
        if ($request->product_type == 'variable') {
            $productService = new ProductService;
            $validate = $productService->validateProductVariable($request);
            if ($validate != '1') {
                return $validate;
            }
        }
        return $this->ProductRepository->store($parms);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $parms = $request->all();
        if ($product->product_type != $request->product_type) {
            return $this->errorResponse("You Don't have a right to change the product type!", 401);
        }
        if ($request->product_type == 'variable') {
            $productService = new ProductService;
            $validate = $productService->validateProductVariable($request);
            if ($validate != '1') {
                return $validate;
            }
        }
        return $this->ProductRepository->update($parms, $product);
    }

    public function destroy($id)
    {
        return $this->ProductRepository->destroy($id);
    }

    public function priceRange()
    {
        return $this->ProductRepository->priceRange();
    }

    public function sku(Request $request)
    {

        if(isset($_GET['validatesku']) && $_GET['validatesku'] == 1){
            $validated = $request->validate([
                'sku' => 'required|unique:products,sku|max:255',
            ]);

            return $this->successResponse('', 'Sku Get Successfully!');

        }
        return $this->ProductRepository->sku($request);
    }
}
