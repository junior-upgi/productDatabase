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
use App\Models\productDatabase\PlasticProduct;


/**
 * Class ProductRepository
 *
 * @package App\Repositories
 */
class ProductRepository
{
    private $plastic;
    private $common;

    public function __construct(PlasticProduct $plastic, Common $common)
    {
        $this->plastic = $plastic;
        $this->common = $common;
    }

    public function getPlastic($where = null)
    {
        $table = $this->plastic;
        $obj = $this->getByWhere($table, $where);
        return $obj;
    }
    public function plasticInsert($params)
    {
        $table = $this->plastic;
        $obj = $this->common->insert($table, $params);
        return $obj;
    }
    public function plasticUpdate($ind, $params)
    {
        $table = $this->plastic->where('ind', $ind);
        $obj = $this->common->update($table, $params);
        return $obj;
    }
    public function plasticDelete($ind)
    {
        $table = $this->plastic->where('ind', $ind);
        $obj = $this->common->delete($table);
        return $obj;
    }
    private function getByWhere($table, $where)
    {
        $obj = $table
            ->where(function ($q) use ($where) {
                if (isset($where)) {
                    foreach ($where as $w) {
                        $key = $w['key'];
                        $op = (!isset($w['op'])) ? '=' : $w['op'];
                        $value = $w['value'];
                        $or = (!isset($w['or'])) ? false : $w['or'];
                        if ($or) {
                            $q->orWhere($key, $op, $value);
                        } else {
                            $q->where($key, $op, $value);
                        }
                    }
                }
            });
        return $obj;
    }
    public function saveFile($file)
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $file_name = strval(time()).str_random(5).'.'.$extension;
            $destination_path = public_path().'/storage/';
            $upload_success = $file->move($destination_path, $file_name);
            return $file_name;
        } catch (\Exception $e) {
            return null;
        }
    }
}