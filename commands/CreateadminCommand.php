<?php

class CreateadminCommand extends CConsoleCommand
{
   public function getHelp()
   {
       return <<<EOD
USAGE
  

DESCRIPTION
  

EOD;
   }
   
   public function run($args)
   {
       Yii::import('application.models.User');
       $user=new User();
       $user->username="admin";
       $user->password="admin";
       $user->verified=
       $user->save();
   }
}
