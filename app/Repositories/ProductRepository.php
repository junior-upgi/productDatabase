<?php
/**
 * Product相關資料邏輯處理
 *
 * @version 1.0.1
 * @author spark it@upgi.com.tw
 * @date 16/10/26
 * @since 1.0.0 spark: 於此版本開始編寫註解
 * @since 1.0.1 spark: 完成plastic CRUD
 */
namespace App\Repositories;

use App\Service\Common;
use App\Models\productDatabase\PlasticProduct;

use File;

/**
 * Class ProductRepository
 *
 * @package App\Repositories
 */
class ProductRepository
{
    /** @var PlasticProduct 注入PlasticProduct */
    private $plastic;
    /** @var Common 注入Common */
    private $common;

    /**
     * 建構式
     *
     * @param PlasticProduct $plastic
     * @param Common $common
     * @return void
     */
    public function __construct(PlasticProduct $plastic, Common $common)
    {
        $this->plastic = $plastic;
        $this->common = $common;
    }

    /**
     * 取得plastic資料
     * 
     * @param array $where 傳入查詢條件
     * @return Module 回傳Module
     */
    public function getPlastic($where = null)
    {
        $table = $this->plastic;
        $obj = $this->getByWhere($table, $where);
        return $obj;
    }

    /**
     * 新增plastic資料
     * 
     * @param array $params 傳入新增資料
     * @return array 回傳結果
     */
    public function plasticInsert($params)
    {
        $table = $this->plastic;
        $obj = $this->common->insert($table, $params);
        return $obj;
    }

    /**
     * 更新plastic資料
     * 
     * @param array $params 傳入更新資料
     * @return array 回傳結果
     */
    public function plasticUpdate($ind, $params)
    {
        $table = $this->plastic->where('ind', $ind);
        $obj = $this->common->update($table, $params);
        return $obj;
    }

    /**
     * 刪除plastic資料
     * 
     * @param string $ind 傳入刪除鍵值
     * @return array 回傳結果
     */
    public function plasticDelete($ind)
    {
        $table = $this->plastic->where('ind', $ind);
        $obj = $this->common->delete($table);
        return $obj;
    }

    /**
     * 取得Module查詢後回傳
     * 
     * @param Module $table 傳入Module
     * @param array $where 傳入查詢條件
     * @return Module 回傳查詢後Module
     */
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

    /**
     * 儲存檔案
     * 
     * @param File $file 傳入檔案資訊
     * @return array 回傳結果
     */
    public function saveFile($file)
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $file_name = strval(time()).str_random(5).'.'.$extension;
            $destination_path = public_path().'/storage/';
            $upload_success = $file->move($destination_path, $file_name);
            return [
                'success' => true,
                'fileName' => $file_name,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'msg' => $e,
            ];
        }
    }
}