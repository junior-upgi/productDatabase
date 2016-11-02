<?php
/**
 * 資料匯出Service
 *
 * @version 1.0.0
 * @author spark it@upgi.com.tw
 * @date 16/11/2
 * @since 1.0.0 spark: 於此版本開始編寫註解
 */
namespace App\Service;

use Excel;

/**
 * Class Export
 *
 * @package App\Service
 */
class Export
{
    /**
     * Excel文件匯出功能
     *
     * @param string $fileName 檔名
     * @param string $sheetName 工作表名
     * @param array $head 標頭
     * @param array $list 內容
     * @return excel
     */
    public function excel($fileName, $sheetName, $head, $list){
        $cellData = [];
        list($headKey, $headValue) = array_divide($head);
        $aHead =[];
        for ($h = 0; $h < count($headValue); $h++) {
            array_push($aHead, $headValue[$h]);
        }
        array_push($cellData, $aHead);

        for ($i = 0; $i < count($list); $i++) {
            $aList = [];
            for ($s = 0; $s < count($headKey); $s++) {
                array_push($aList, $list[$i][$headKey[$s]]);
            }
            array_push($cellData, $aList);
        }
        
        Excel::create($fileName,function($excel) use ($cellData, $sheetName){
            $excel->sheet($sheetName, function($sheet) use ($cellData){
                $sheet->setColumnFormat(array(
                    'A' => '@',
                    'B' => '@',
                ));
                $sheet->rows($cellData);
            });
        })->export('xlsx');
    }
}