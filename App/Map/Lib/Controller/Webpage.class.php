<?php
/**
 *  舞萌DX店铺分布可视化地图
 *
 *  @author Hayao Midoriya <zs6096@gmail.com>
 *  @license WTFPL
 *  @description 页面控制器扩展类
 *  @package Map\Lib\Controller
 */

namespace Map\Lib\Controller;

use \Think\Controller,
    \Think\Exception;

class Webpage extends Controller {

    /**
     *  模型实例存储对象
     *
     *  @var \StdClass
     */

    protected $model;

    /**
     *  构造函数
     *
     *  @return void
     */

    public function __construct() {
        //调用父类 Think\Controller 的构造函数
        parent::__construct();
        //实例化空对象以存储模型实例
        $this->model = new \StdClass();
    }

    /**
     *  页面闭包
     *
     *  @param string $method 请求方法
     *  @param callback $action 页面逻辑
     *  @param string $title 页面标题
     *  @return void
     */

    protected function page($method, $action, $title = '') {
        if (I('server.REQUEST_METHOD') == $method || strtolower(I('server.REQUEST_METHOD')) == $method) {
            if (!empty($title)) {
                $this->assign('pageTitle', $title . ' ' . C('PAGE_TITLE_DELIMITER') . ' ');
            }
            if (!is_callable($action)) {
                throw new Exception('请设置一个有效的响应逻辑');
            } else {
                call_user_func($action);
            }
        } else {
            throw new Exception('无效的请求');
        }
    }

    /**
     *  空操作
     *
     *  @return void
     */

    public function _empty() {
        throw new Exception('请求资源不存在');
    }

}