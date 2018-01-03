<?php

class Imagine_Image
{

    /**
     * 返回相邻数值size
     * @param $size
     * @return mixed
     */
    protected function sizeChange($size){
        $sizeArr = [100,200,300,400,500,600,700,800,900,1000];
        if(in_array($size,$sizeArr)){
            return $size;
        }else if($size < reset($sizeArr)){
            return reset($sizeArr);
        }else if ($size > end($sizeArr)){
            return end($sizeArr);
        }else{
            array_push($sizeArr,$size);
            sort($sizeArr);
            foreach ($sizeArr as $k=>$v){
                if($v == $size){
                    return $sizeArr[$k+1];
                }
            }
        }
    }
    /**
     * 取完整的图，不保证最终尺寸。不变形 $mode    = Imagine\Image\ImageInterface::THUMBNAIL_INSET;
     * //保证最终尺寸，把多余的图像切除，不变形 $mode    = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
     * @param $url
     * @param string $size
     * @param string $ext
     * @return array
     */
    public function createInset($url, $size = '', $ext = '')
    {
        $file = APP_PUBLIC . $url;
        if (!is_file($file)) {
            return ['status' => 0, 'message' => '没有图片'];
        }
        $fileDir = dirname($file);
        $fileName = pathinfo($file, PATHINFO_FILENAME);
        $fileExt = pathinfo($file, PATHINFO_EXTENSION);

        if ($size) {
            $saveSize = substr($size, 2);
            $saveFileDir = $fileDir . '/' . self::sizeChange($saveSize);
        } else {
            $saveSize = '';
            $saveFileDir = $fileDir;
        }

        if ($ext) {
            $saveExt = $ext;
        } else {
            $saveExt = '.' . $fileExt;
        }

        if (!is_dir($saveFileDir)) {
            mkdir($saveFileDir, 0777, true);
        }
        $saveFile = $saveFileDir . '/' . $fileName . $saveExt;

        if (!is_file($saveFile)) {
            $imagine = new \Imagine\Imagick\Imagine();
            if ($saveSize) {
                $sizeType = new \Imagine\Image\Box($saveSize, $saveSize);
                $mode = Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                $imagine->open($file)->thumbnail($sizeType,$mode)->save($saveFile);
            } else {
                $imagine->open($file)->save($saveFile,['quality' => 100]);
            }
        }
        return ['status' => 1, 'message' => '图片ok', 'data' => ['url'=>$saveFile,'ext'=>$saveExt]];
    }
}