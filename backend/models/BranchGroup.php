<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branch_group".
 *
 * @property integer $branch_group_id
 * @property string $branch_group_name
 * @property string $branch_group_detail
 * @property integer $branch_group_status
 */
class BranchGroup extends \yii\db\ActiveRecord
{
    /** 
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_group_name', 'branch_group_detail', 'branch_group_status'], 'required'],
            [['branch_group_detail'], 'string'],
            [['branch_group_status'], 'integer'],
            [['branch_group_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_group_id' => 'Branch Group ID',
            'branch_group_name' => 'ชื่อกลุ่ม สาข/วิชา',
            'branch_group_detail' => 'รายละเอียด',
            'branch_group_status' => 'สถานะ',
        ];
    }
}
