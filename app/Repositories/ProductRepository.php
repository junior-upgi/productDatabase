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

use File;

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
            if ($file->isValid()){
                File::append(storage_path('logs/check.log'), "file valid: true \r\n");
            } else {
                File::append(storage_path('logs/check.log'), "file valid: false \r\n");
            }
            File::append(storage_path('logs/check.log'), "savefile: $file \r\n");

            $oname = $file->getClientOriginalName();
            File::append(storage_path('logs/check.log'), "file o name: $oname \r\n");
            $tmpName = $file->getFileName();
            File::append(storage_path('logs/check.log'), "file tem name: $tmpName \r\n");
            $realPath = $file->getRealPath(); 
            File::append(storage_path('logs/check.log'), "real path: $realPath \r\n");

            

            $extension = $file->getClientOriginalExtension();

            File::append(storage_path('logs/check.log'), "extension: $extension \r\n");

            $file_name = strval(time()).str_random(5).'.'.$extension;

            File::append(storage_path('logs/check.log'), "file name: $file_name \r\n");

            $destination_path = public_path().'/storage/';
            $upload_success = $file->move($destination_path, $file_name);
            File::append(storage_path('logs/check.log'), "success: $upload_success \r\n");
            return $file_name;
        } catch (\Exception $e) {
            File::append(storage_path('logs/check.log'), "error: $e \r\n");
            return null;
        }
    }
}