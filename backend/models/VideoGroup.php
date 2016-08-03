<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "video_group".
 *
 * @property integer $video_group_id
 * @property string $video_group_name
 * @property string $video_group_detail
 * @property integer $video_group_status
 */
class VideoGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_group_name', 'video_group_detail', 'video_group_status'], 'required'],
            [['video_group_detail'], 'string'],
            [['video_group_status'], 'integer'],
            [['video_group_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'video_group_id' => 'Video Group ID',
            'video_group_name' => 'ชื่อกลุ่มวีดีโอ',
            'video_group_detail' => 'รายละเอียด',
            'video_group_status' => 'สถานะ',
        ];
    }
}
