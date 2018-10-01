<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;

        // Create roles
        $guest  = $authManager->createRole('guest');
        $moderator  = $authManager->createRole('moderator');
        $editor = $authManager->createRole('editor');
        $admin  = $authManager->createRole('admin');

        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error  = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('sign-up');
        $index  = $authManager->createPermission('index');
        $home  = $authManager->createPermission('home');
        $view   = $authManager->createPermission('view');
        $update = $authManager->createPermission('update');
        $delete = $authManager->createPermission('delete');
        $create = $authManager->createPermission('create');

        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);
        $authManager->add($update);
        $authManager->add($delete);
        $authManager->add($create);
        $authManager->add($home);


        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        // Add rule "UserGroupRule" in roles
        $guest->ruleName  = $userGroupRule->name;
        $moderator->ruleName  = $userGroupRule->name;
        $editor->ruleName = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;

        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($moderator);
        $authManager->add($editor);
        $authManager->add($admin);

        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);
        $authManager->addChild($guest, $index);
       // $authManager->addChild($guest, $view);

        // MODERATOR
        $authManager->addChild($moderator, $update);
        $authManager->addChild($moderator, $guest);
        $authManager->addChild($moderator, $view);
        $authManager->addChild($moderator, $home);
        $authManager->addChild($moderator, $create);

        // EDITOR
        $authManager->addChild($editor, $update);
        $authManager->addChild($editor, $guest);

        // Admin
        $authManager->addChild($admin, $delete);
        $authManager->addChild($admin, $editor);
        $authManager->addChild($admin, $moderator);
    }
}