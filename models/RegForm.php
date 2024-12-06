<?php

namespace app\models;

use Symfony\Component\VarDumper\VarDumper;
use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $Name
 * @property string $Surname
 * @property string $Lastname
 * @property string $Telephone
 * @property string $Password
 * @property string $Email
 * @property int $id_Role
 *
 * @property Application[] $applications
 * @property Role $role
 */
class RegForm extends User
{
    public $passwordConf;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Surname', 'Lastname', 'Telephone', 'Password', 'Email'], 'required'],
            [['id_Role'], 'integer'],
            ['Email', 'email', 'message' => 'Некорректная почта'],
            ['Password', 'string', 'min' => 0],
            ['passwordConf', 'compare', 'compareAttribute' => 'Password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться, для продолжения'],
            [['Name', 'Surname', 'Lastname', 'Telephone', 'Password', 'Email'], 'string', 'max' => 255],
            [['id_Role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_Role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Имя',
            'Surname' => 'Фамилия',
            'Lastname' => 'Отчество',
            'Telephone' => 'Номер телефона',
            'Password' => 'Пароль',
            'Email' => 'Почта',
            'id_Role' => 'Id Role',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['id_User' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'id_Role']);
    }
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        return self::find()->where(['login' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // return $this->authKey;
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        // VarDumper::dump($password);
        return $this->Password === $password;
    }
}
