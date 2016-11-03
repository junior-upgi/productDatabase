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

use App\Service\Export;
use File;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    private $product;
    private $export;

    public function __construct(
        ProductRepository $product,
        Export $export
    ) {
        $this->product = $product;
        $this->export = $export;
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
        $photoSet = $request->input('photoSet');
        $printSet = $request->input('printSet');
        $ignore = ['_token', 'img', 'type', 'ind', 'photoSet', 'printSet', 'photo', 'print'];
        $input = array_except($input, $ignore);
        $params = array();
        if (isset($photo)) {
            $photoLocation = $this->product->saveFile($photo);
            if (!$photoLocation['success']) {
                return [
                    'success' => false,
                    'msg' => $photoLocation['msg'],
                ];
            }
            $params['photoLocation'] = iconv($encode, "BIG5", $photoLocation['fileName']);
        } else if($photoSet == 'clear') {
            $params['photoLocation'] = null;
        }
        if (isset($print)) {
            $printLocation = $this->product->saveFile($print);
            if (!$printLocation['success']) {
                return [
                    'success' => false,
                    'msg' => $printLocation['msg'],
                ];
            }
            $params['printLocation'] = iconv($encode, "BIG5", $printLocation['fileName']);
        } else if($printSet == 'clear') {
            $params['printLocation'] = null;
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

    public function exportExcel()
    {
        $table = $this->product->getPlastic()->get()->toArray();
        $head = [
            'referenceNumber' => '產品代號',
            'alias' => '別號',
            'description' => '描述',
            'material' => '材質',
            'weight' => '重量(g)',
            'cavity' => '穴數',
            'cycleTime' => '循環時間(s)',
            'unitCost' => '單價(NT$)',
        ];
        $fileName = '塑膠產品清單';
        $sheetName = '塑膠產品基本資料';
        return $this->export->excel($fileName, $sheetName, $head, $table);
    }
}