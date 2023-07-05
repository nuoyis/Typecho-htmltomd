<?php
error_reporting(0);
class htmltomd_Action extends Typecho_Widget implements Widget_Interface_Do
{
    
    public function action()
    {
        $this->widget('Widget_User')->pass('administrator');
        $this->on($this->request->is('htmltomdzhuanhuan'))->start();
    }
    
    public function start()
    {
    header("Content-type: text/html; charset=utf-8");
    $db = Typecho_Db::get();
    $postnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allpostnum'))->from ('table.contents')->where('table.contents.type=?', 'post'));
    $postnum = $postnum['allpostnum'];
    for($i = $postnum-1;$i >= 0;$i--)
    {
        $post=$db->fetchRow($db->select('*')->from('table.contents')->offset($i)->limit(1));
        if(substr($post['text'], 0, 15)=='<!--markdown-->') $post['text']=substr($post['text'], strripos($post['text'], "->") + 1);
        if(substr($post['text'], 0, 21)=='<!-- wp:paragraph -->') $post['text']=substr($post['text'], strripos($post['text'], "->") + 1);
        include_once "markdown.class.php";
        $obj       = new Markdown();
        $html      = $post['text'];
        $html2md   = $obj->parseHtml($html);
        $cid       = $post['cid'];
        $update = $db->update('table.contents')->rows(array('text'=>$html2md))->where("cid=$cid");
        $updateRows= $db->query($update);
    }
    echo 'Done';
    }
}
?>