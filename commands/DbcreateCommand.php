<?php

class DbcreateCommand extends CConsoleCommand
{
   public function getHelp()
   {
       return <<<EOD
USAGE

dbcmd [OPTIONS] to create database from config

OPTIONS

-f  : drop existing database and create new


EOD;
   }
   
   public function run($args)
   {
       Yii::import('application.helpers.ConfMagic');
       $dbname=ConfMagic::getDbName();
       $db=ConfMagic::getDbConf();
       Yii::trace("DBNAME=".$dbname."\n");
       if(isset($args)){
       $first=isset($args)?$args[0]:"";
       switch ($first) {
           case '-f':
               echo(ConfMagic::dropDB($db->username,$db->password,$dbname));
               echo(ConfMagic::createDB($db->username,$db->password,$dbname));
               break;
           case 'force':
               echo(ConfMagic::dropDB($db->username,$db->password,$dbname));
               echo(ConfMagic::createDB($db->username,$db->password,$dbname));
               break;
           default:
               echo(ConfMagic::createDB($db->username,$db->password,$dbname));
               break;
       }
       }else{
           echo(ConfMagic::createDB($db->username,$db->password,$dbname));
       }




   }
}
