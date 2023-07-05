<?php

/**
 * 转换wordpress html复制时间长且麻烦?遇到本插件就是快速解放你的双手的方法。
 *
 * @package htmltomd
 * @author 诺依阁
 * @version 1.0.0
 * @link https://blog.nuoyis.com
 */
class htmltomd_Plugin implements Typecho_Plugin_Interface
{
    /**
     * @return mixed
     */
    public static function activate()
    {   
        Helper::addAction('typexport', 'htmltomd_Action');
        Helper::addPanel(1, 'htmltomd/panel.php', _t('数据转换'), _t('数据转换'), 'administrator');
        return _t('哎嘿，htmltomd开始发挥作用');
    }

    /**
     * @return mixed
     */
    public static function deactivate()
    {
        Helper::removeAction('typexport');
        Helper::removePanel(1, 'htmltomd/panel.php');
        return _t('呜呜呜,htmltomd已被丢弃惹');
    }
    
    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
}
