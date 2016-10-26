<?php
/**
 * Product程式邏輯處理
 *
 * @version 1.0.0
 * @author spark it@upgi.com.tw
 * @date 16/10/26
 * @since 1.0.0 spark: 於此版本開始編寫註解
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ProductRepository;


/**
 * Class ProductController
 *
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    private $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function productList()
    {

    }

    public function productSave()
    {

    }

    public function productDelete()
    {
        
    }
}