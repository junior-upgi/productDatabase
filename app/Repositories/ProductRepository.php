<?php
/**
 * Product相關資料邏輯處理
 *
 * @version 1.0.0
 * @author spark it@upgi.com.tw
 * @date 16/10/26
 * @since 1.0.0 spark: 於此版本開始編寫註解
 */
namespace App\Repositories;

use App\Service\Common;
use App\Models\ProductDatabase;


/**
 * Class ProductRepository
 *
 * @package App\Repositories
 */
class ProductRepository
{
    private $product;
    private $common;

    public function __construct(ProductDatabase $product, Common $common)
    {
        $this->product = $product;
        $this->common = $common;
    }

    
}