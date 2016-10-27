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

    public function plasticList()
    {
        $request = request();
        $list = null;
        $searchContent = $request->input('searchContent');
        if (isset($searchContent)) {
            $where = array();
            $key = ['referenceNumber', 'alias', 'description', 'material'];
            $search = iconv('UTF-8', 'BIG-5', $searchContent);
            for ($i = 0; $i < count($key); $i++) {
                array_push($where, ['key' => $key[$i], 'op' => 'like', 'value' => "%$search%", 'or' => true]);
            }
            $obj = $this->product->getPlastic($where);
            $list = $obj->get();
        }
        return view('plastic.list')
            ->with('plastic', $list)
            ->with('search', $searchContent);
    }

    public function plasticSave()
    {
        $request = request();
        $photo = $request->file('photo');
        $print = $request->file('print');
        $input = $request->input();
        $ind = $request->input('ind');
        $type = $request->input('type');
        $ignore = ['_token', 'img', 'type', 'ind', 'fileSet', 'photo', 'print'];
        $input = array_except($input, $ignore);
        $params = array();
        if (isset($photo)) {
            $photoLocation = $this->product->saveFile($photo);
            $params['photoLocation'] = iconv("UTF-8", "BIG-5", $photoLocation);
        }
        if (isset($print)) {
            $printLocation = $this->product->saveFile($print);
            $params['printLocation'] = iconv("UTF-8", "BIG-5", $printLocation);
        }
        $countInput = count($input);
        list($key, $value) = array_divide($input);
        for ($i = 0; $i < $countInput; $i++) {
            $big5 = iconv("UTF-8", "BIG-5", $value[$i]);
            $params[$key[$i]] = $big5;
        }
        if ($type == 'add') {
            $tran = $this->product->plasticInsert($params);
        } else if ($type = 'edit') {
            $tran = $this->product->plasticUpdate($ind, $params);
        }
        return $tran;
    }

    public function plasticDelete()
    {
        $request = request();
        $input = $request->json()->all();
        $ind = $input['ind'];
        $del = $this->product->plasticDelete($ind);
        return $del;
    }
}