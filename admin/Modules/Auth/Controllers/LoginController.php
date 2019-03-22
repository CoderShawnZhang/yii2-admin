<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/26
 * Time: 下午5:59
 */
namespace admin\Modules\Auth\Controllers;


use admin\Modules\Auth\models\LoginForm;
use admin\Modules\Auth\models\User;
use Yii;

class LoginController extends \yii\web\Controller
{
    public $layout = '@admin/views/layouts/main-login';
    private $loginInPath = '/Index/index/desktop';
    private $logOutPath = '/Auth/login/login';

    public function actionLogin()
    {
        $_SESSION['RM'] = 1;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if($model->login()){
                $this->redirect([$this->loginInPath]);
            }else{
                Yii::$app->session->setFlash('error', '账号被锁定, 请联系店长解锁账号.');
            }
            return $this->refresh();
        }
        //记住密码
        if($_SESSION['RM'] == 1){
            setcookie('username',Yii::$app->request->post('username','13189221217'),time()+3600*24);
            setcookie('password',Yii::$app->request->post('password','111111'),time()+3600*24);
        } else {
            setcookie('username','',time()+20);
            setcookie('password','',time()+20);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect([$this->logOutPath]);
    }

    public function actionRegister()
    {
        $userName = 13189221217;
        $password = 111111;
        $user = new User();
        $user->setPassword($password);
        $user->username = $userName;
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        $user->email = 'taobao1875@163.com';
        $user->save();
    }
}