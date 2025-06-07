<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Entity\Theme;
use Hb\SkyblogSlayevalphp\Repository\ThemeRepo;
use Hb\SkyblogSlayevalphp\View\MessageView;
use Hb\SkyblogSlayevalphp\View\ThemeView;

class ThemeController extends BaseController{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView{
        $themeRepo = new ThemeRepo();

        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            $themeRepo->reset();
            $themeRepo->setActive($_GET["id"]);
            
            return new MessageView("Thème modifié") ;
        }else {

        return new ThemeView($themeRepo->getAll());}   
    }

    protected function doPost(){
        $themeRepo = new ThemeRepo();

        $themeRepo->persist(new Theme($_POST["mainbgcolor"],$_POST["sidebgcolor"],
        $_POST["publibgcolor"],$_POST["secondarypublicolor"],false));
        return new ThemeView($themeRepo->getAll());   
        
    }
}