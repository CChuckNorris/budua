<?php

namespace backend\modules\blog\modules\dashboard\managers;

use common\interfaces\IFileUploader;
use Intervention\Image\ImageManagerStatic as Image;
use yii\base\Security;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;

/**
 * Class FileUploaderManager
 * @package common\managers
 */
class FileUploaderManager implements IFileUploader
{
    private $width = 320;

    private $height = 240;

    private $quality = 100;

    private $target_dir_path = "/frontend/web/uploads/";

    private $level = "../..";

    private $uid;

    private $file_name_pattern;

    private $sizes = [
        "medium" =>[
            "width" => "780",
            "height" => "480"
        ]
    ];

    public function setSizes($sizes)
    {
        $this->sizes = $sizes;
        return $this;
    }

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param integer $width
     * @return FileUploaderManager
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param integer $height
     * @return FileUploaderManager
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return integer
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param integer $quality
     * @return FileUploaderManager
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
        return $this;
    }

    /**
     * @param string $pattern
     * @return FileUploaderManager
     */
    public function setFileNamePattern($pattern)
    {
        $this->file_name_pattern = $pattern;
        return $this;
    }

    /**
     * @param string $dir_path
     * @return FileUploaderManager
     */
    public function setTargetDirectory($dir_path)
    {
        $this->target_dir_path .= $dir_path;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetDirectory()
    {
        if ($this->uid)
        {
            return $this->target_dir_path . "/" . $this->uid;
        }
        return $this->target_dir_path;
    }

    /**
     * @param $uid
     * @return FileUploaderManager
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    public function upload($file)
    {

    }

    /**
     * @param UploadedFile[] $files
     * @return array
     * @throws \yii\base\Exception
     */
    public function bulkUpload($files = [])
    {
        $links = [];

        foreach ($files as $key => $file) {
            $path_origin = $this->getTargetDirectory();
            $path_thumb = $this->getTargetDirectory() . '/thumbnail';

            BaseFileHelper::createDirectory($this->level.$path_origin);
            BaseFileHelper::createDirectory($this->level.$path_thumb);

            $origin_name = $this->getFileName('', time(), $file->extension);
            $link_to_origin = $path_origin . '/' . $origin_name;


            $file->saveAs($this->level.$link_to_origin);

            $previews = [];
            foreach ($this->sizes as $size => $values)
            {
                $width = $values[0]; $height = $values[1];
                $thumb_name = $this->getFileName('', $size."-" . time(), $file->extension);
                $link_to_thumb = $path_thumb . '/' . $thumb_name;
                $this->makeThumbnail($link_to_origin, $link_to_thumb, ["width" =>$width, "height" => $height, "quality" => $this->quality]);
                $previews[$size] = $link_to_thumb;
            }

            $links [] = ["origin" => $origin_name, "previews" => $previews];
        }
        return $links;
    }

    /**
     * @param $from_file
     * @param $to_file
     * @param array $options
     */
    public function makeThumbnail($from_file, $to_file, $options = ["width" => null, "height" => null, "quality" => 100])
    {
        try {
            Image::make($this->level.$from_file)->fit($options["width"], $options["height"])
                ->save($this->level.$to_file);
        } catch (\Exception $e) {

        }
    }

    /**
     * @param string $suffix
     * @param string $prefix
     * @param $extension
     * @return string
     */
    private function getFileName($prefix = '', $suffix = '', $extension)
    {
        $suffix.= (new Security())->generateRandomString(10);
        return $prefix . $this->file_name_pattern . $suffix . "." . $extension;
    }


}