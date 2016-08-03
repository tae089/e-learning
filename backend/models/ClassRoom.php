<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "class_room".
 *
 * @property integer $class_room_id
 * @property string $class_room_name
 * @property string $class_room_detail
 * @property integer $branch_id
 * @property string $class_room_image
 * @property integer $class_room_status
 */
class ClassRoom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_room_name', 'class_room_detail', 'class_room_status'], 'required'],
            [['class_room_detail'], 'string'],
            [['class_room_status'], 'integer'],
            [['class_room_name', 'class_room_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_room_id' => 'Class Room ID',
            'class_room_name' => 'ชื่อห้องเรียน',
            'class_room_detail' => 'รายละเอียด',
            'class_room_status' => 'สถานะ',
        ];
    }
}
