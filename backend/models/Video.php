<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
/**
* This is the model class for table "video".
*
* @property integer $video_id
* @property string $video_name
* @property string $video_detail
* @property integer $video_group_id
* @property integer $video_order
* @property string $video_image
*/
class Video extends \yii\db\ActiveRecord
{

  public $image;
  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'video';
  }

  /**
  * @inheritdoc
  */
  public function rules()
  {
    return [
      [['video_name', 'video_group_id', 'video_order'], 'required'],
      [['video_detail'], 'string'],
      [['video_group_id', 'video_order'], 'integer'],
      [['video_name'], 'string', 'max' => 255],
      [['video_image'], 'file', 'extensions'=>'jpg, gif, png'],
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
      'video_id' => 'Video ID',
      'video_name' => 'ชื่อวีดีโอ',
      'video_detail' => 'รายละเอียด',
      'video_group_id' => 'กลุ่มวีดีโอ',
      'video_order' => 'ลำดับ',
      'video_image' => 'รูปภาพ',
    ];
  }

  public function getImageFile()
  {
    return isset($this->video_image) ? Yii::$app->params['uploadPath'] . $this->video_image : null;
  }

  /**
  * fetch stored image url
  * @return string
  */
  public function getImageUrl()
  {
    // return a default image placeholder if your source avatar is not found
    $avatar = isset($this->video_image) ? 'img-learning/'.$this->video_image : '';
    return Yii::$app->params['uploadUrl'] . $avatar;
  }

  public function uploadImage() {
    // get the uploaded file instance. for multiple file uploads
    // the following data will return an array (you may need to use
    // getInstances method)
    $image = UploadedFile::getInstance($this, 'video_image');

    // if no image was uploaded abort the upload
    if (empty($image)) {
      return false;
    }

    // store the source file name
    $this->video_image = $image->name;
    $ext = end((explode(".", $image->name)));

    // generate a unique file name
    $this->video_image = Yii::$app->security->generateRandomString().".{$ext}";

    // the uploaded image instance
    return $image;
  }

  /**
  * Process deletion of image
  *
  * @return boolean the status of deletion
  */
  public function deleteImage() {
    $file = $this->getImageFile();

    // check if file exists on server
    if (empty($file) || !file_exists($file)) {
      return false;
    }

    // check if uploaded file can be deleted on server
    if (!unlink($file)) {
      return false;
    }

    // if deletion successful, reset your file attributes
    $this->avatar = null;
    $this->filename = null;

    return true;
  }

}
