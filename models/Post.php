<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $date
 * @property integer $category_id
 * @property string $text
 * @property string $title
 * @property string $abridgment
 * @property integer $activity
 */
class Post extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'date', 'category_id', 'text', 'title', 'abridgment'], 'required'],
            [['author_id', 'date', 'category_id', 'activity', 'img_id'], 'integer'],
            [['text', 'abridgment'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'date' => 'Date',
            'category_id' => 'Category ID',
            'text' => 'Text',
            'img_id' => 'Img',
            'title' => 'Title',
            'abridgment' => 'Abridgment',
            'activity' => 'Activity',
        ];
    }
}
