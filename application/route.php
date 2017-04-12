<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::rule('/','index/index/index');

Route::rule('/uploadImgWithIos','uploadImgWithIos/index/index','GET');//ios 上传图片反转90度的问题

Route::post('/upload','uploadImgWithIos/index/upload','POST');//ios 上传图片反转90度的问题


// 注册路由到index模块的News控制器的read操作
Route::rule('new/:id','index/News/read');

Route::rule(['new','new/:id'],'index/News/read');//取路由名称

Route::rule('new/:id','News/update','POST');//必须大写

Route::get('new/:id','News/read'); // 定义GET请求路由规则
Route::post('new/:id','News/update'); // 定义POST请求路由规则
Route::put('new/:id','News/update'); // 定义PUT请求路由规则
Route::delete('new/:id','News/delete'); // 定义DELETE请求路由规则
Route::any('new/:id','News/read'); // 所有请求都支持的路由规则

// return [

//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],
//     '[index]' => [

//     	'/' => ['Index/index',['method' => 'get']],
//     ],

// ];
