<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property integer $branch_id
 * @property string $branch_name
 * @property string $branch_detail
 * @property integer $branch_group_id
 * @property integer $branch_order
 * @property string $branch_imges
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_name', 'branch_detail', 'branch_group_id', 'branch_order'], 'required'],
            [['branch_detail'], 'string'],
            [['branch_group_id', 'branch_order'], 'integer'],
            [['branch_name', 'branch_imges'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'branch_name' => 'สาขา/วิชา',
            'branch_detail' => 'รายละเอียด',
            'branch_group_id' => 'กลุ่มสาขา/วิชา',
            'branch_order' => 'ลำดับ',
            'branch_imges' => 'รูปภาพ',
        ];
    }
}
