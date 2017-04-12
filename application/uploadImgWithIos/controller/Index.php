<?php
namespace app\uploadImgWithIos\controller;

use app\uploadImgWithIos\controller\uploadCommon;


class Index extends uploadCommon
{
    public function index()
    {

    	// echo $this->method();
    	echo 'test in controller';
    	return view();
        // return $this->display();
    }


    public function upload(){

    	// 获取表单上传文件 
	    $file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	    if($info){

	    	$pathname = $info->getPathName();

	    	$image = \think\Image::open($pathname);
	    	//$image = \think\Image::open(request()->file('image'))

	        //判断反转没有
	       	$exif = exif_read_data($pathname);

	       	echo '<pre>';
	       	var_dump($exif);

	       	$rotate = 0;
			if(isset($exif['Orientation'])){
				switch ($exif['Orientation']) {
					case 1:
				       	$rotate = 0;
						echo '反转了0度，即没有反转';
						break;

					case 6:
				       	$rotate = 90;
						echo '顺时针反转了90度';
						break;

					case 8:
				       	$rotate = -90;
						echo '逆时针反转了90度';
						break;

					case 3:
				       	$rotate = 180;
						echo '顺时反转了180度';
						break;
					
					default:
						# code...
						break;
				}

			echo '<hr>';

			echo $exif['Orientation'];

			}else{
				echo '没有上传图反转角度的值';
			}


			echo '<hr>';

			$thumbname = ROOT_PATH . 'public' . DS . 'uploads'.'/test.png';

			$image->thumb(150, 150)->save($thumbname);

			$thumbimage = \think\Image::open($thumbname);

			// echo $rotate;
			if($rotate != 0){
				$thumbimage->rotate($rotate)->save($thumbname);
			}

	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();
	    }

    	var_dump('test');
    }
}