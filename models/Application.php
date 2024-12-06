<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Application".
 *
 * @property int $id
 * @property int $id_User
 * @property int $id_Category
 * @property string $Title
 * @property int $id_Status
 * @property int $id_Depart
 *
 * @property Category $category
 * @property Depart $depart
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_User', 'id_Category', 'Title', 'id_Status', 'id_Depart'], 'required'],
            [['id_User', 'id_Category', 'id_Status', 'id_Depart'], 'integer'],
            [['Title'], 'string', 'max' => 255],
            [['id_Category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_Category' => 'id']],
            [['id_Depart'], 'exist', 'skipOnError' => true, 'targetClass' => Depart::class, 'targetAttribute' => ['id_Depart' => 'id']],
            [['id_Status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['id_Status' => 'id']],
            [['id_User'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_User' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_User' => 'Id User',
            'id_Category' => 'Id Category',
            'Title' => 'Title',
            'id_Status' => 'Id Status',
            'id_Depart' => 'Id Depart',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_Category']);
    }

    /**
     * Gets query for [[Depart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepart()
    {
        return $this->hasOne(Depart::class, ['id' => 'id_Depart']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'id_Status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_User']);
    }
}
