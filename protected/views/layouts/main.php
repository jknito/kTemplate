<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jknito">
	<meta name="author" content="keliasjes@gmail.com">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->clientScript->registerCoreScript('bootstrap'); ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!-- http://html5shim.googlecode.com/svn/trunk/html5.js -->
    <!--[if lt IE 9]>
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/html5.js"></script>
    <![endif]-->
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/prettify/prettify.css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/prettify/prettify.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/sugar-1.3.7-custom.min.js"></script>    
    <script type="text/javascript">
        $(document).ready(function() {
            prettyPrint();
            Date.setLocale('es');
            $('a[ktype="cellinfo"]').popover({
                content: function(){
                    return $(this).find("#content").html();
                }
            });
            $('input[ktype="datetime"]').tooltip({
                trigger: "focus",
                placement: "right",
                title: function(){
                    return Date.create($(this).val()).format('{yyyy}-{MM}-{dd} {HH}:{mm}:{ss}');
                }
            });
            $('input[ktype="datetime"]').keyup(function(){
                $(this).tooltip('show');
            });
            $('input[ktype="datetime"]').blur(function(){
                var texto = Date.create($(this).val()).format('{yyyy}-{MM}-{dd} {HH}:{mm}:{ss}');
                if( ! texto.has("Invalid") && ! $(this).val().isBlank() )
                    $(this).val(texto);
                else
                    $(this).val("");
            });
            $('input[ktype="date"]').tooltip({
                trigger: "focus",
                placement: "right",
                title: function(){
                    return Date.create($(this).val()).format('{yyyy}-{MM}-{dd}');
                }
            });
            $('input[ktype="date"]').keyup(function(){
                $(this).tooltip('show');
            });
            $('input[ktype="date"]').blur(function(){
                var texto = Date.create($(this).val()).format('{yyyy}-{MM}-{dd}');
                if( ! texto.has("Invalid") && ! $(this).val().isBlank() )
                    $(this).val(texto);
                else
                    $(this).val("");
            });
        });
    </script>
    <style type="text/css" media="print">
        .pagination ul { background-color: #fff; }
    </style>
</head>

<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo Yii::app()->request->baseUrl; ?>"><?php echo Yii::app()->name?></a>
          <div class="nav-collapse">
            <?php 
            require_once('menu_items.php');
            $user = Yii::app()->getModule('user')->user(Yii::app()->user->id);
            $this->widget('zii.widgets.CMenu',array(
                'htmlOptions'=>array('class'=>'nav'),
                'items'=>$itemsForFile,
            )); 
            $this->widget('zii.widgets.CMenu',array(
                'htmlOptions'=>array('class'=>'nav pull-right'),
                'items'=>array(
                    array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"),  'visible'=>Yii::app()->user->isGuest,),
                    array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                    array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>$user?$user->profile->firstname.' '.$user->profile->lastname:' ', 'visible'=>!Yii::app()->user->isGuest),
                    array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout"), 'visible'=>!Yii::app()->user->isGuest),
                ),
            )); ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
        <?php echo $content; ?>
        <footer>
        <hr/>Powered by <a href="http://jknito.net" target="_blank">jknito</a>
        </footer><!-- footer -->
    </div><!-- page -->

</body>
</html>
