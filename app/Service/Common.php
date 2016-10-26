<?php
/**
 * 共用元件
 *
 * @version 1.0.0
 * @author spark it@upgi.com.tw
 * @date 16/10/26
 * @since 1.0.0 spark: 於此版本開始編寫註解
 */
namespace App\Service;

use App\Service\Common;

/**
 * Class ProductRepository
 *
 * @package App\Repositories
 */
class Common
{

    public function insert($table, $params)
    {
        try {
            $table->getConnection()->beginTransaction();
            $table->insert($params);
            $table->getConnection()->commit();
            return array(
                'success' => true,
                'msg' => 'success!',
            );
        } catch (\Exception $e) {
            $table->getConnection()->rollback();
            return array(
                'success' => false,
                'msg' => $e['errorInfo'][2],
            );
        }
    }

    public function update($table, $params)
    {
        try {
            $table->getConnection()->beginTransaction();
            $table->update($params);
            $table->getConnection()->commit();
            return array(
                'success' => true,
                'msg' => 'success!',
            );
        } catch (\Exception $e) {
            $table->getConnection()->rollback();
            return array(
                'success' => false,
                'msg' => $e['errorInfo'][2],
            );
        }
    }

    public function delete($table)
    {
        try {
            $table->getConnection()->beginTransaction();
            $table->delete();
            $table->getConnection()->commit();
            return array(
                'success' => true,
                'msg' => 'success!',
            );
        } catch (\Exception $e) {
            $table->getConnection()->rollback();
            return array(
                'success' => false,
                'msg' => $e['errorInfo'][2],
            );
        }
    }
}