<?php
$message = '';
include_once 'common.php';
include 'header.php';
include 'menu.php';
?>

<div class="main">
    <div class="body container">
        <div class="typecho-page-title">
            <h2><?php _e('数据转换'); ?></h2>
        </div>
        <div class="row typecho-page-main" role="form">
            <div id="dbmanager-plugin" class="col-mb-12 col-tb-8 col-tb-offset-2">
                <p>在您点击下面的按钮后，Typecho会转换文章数据,转换来自wordpress文章或者html为makedown。</p>
                <p>在转换前，强烈建议您进行备份，如果未备份造成的损失，由您来承担</p>
                <p>使用过程中如果有问题，请到 <a href="https://github.com/ibadboy-net/ByeTyp/issues">Github</a> 提出。</p>
                <p style="background: #f4ff1c"><?php echo $message; ?></p>
                <form action="<?php $options->index('/action/typexport?htmltomdzhuanhuan'); ?>" method="post">
                    <ul class="typecho-option typecho-option-submit" id="typecho-option-item-submit-3">
                        <li>
                            <button type="submit" class="primary"><?php _e('开始转换'); ?></button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'copyright.php';
include 'common-js.php';
include 'table-js.php';
include 'footer.php';
?>