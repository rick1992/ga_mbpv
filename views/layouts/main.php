<?php
/* @var $this \yii\web\View */
/* @var $content string */

//use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from aqvatarius.com/themes/gemini_v1_4/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Apr 2016 23:25:10 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <head>        
        <title>Gemini</title>    

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 10]><link rel="stylesheet" type="text/css" href="css/ie.css"/><![endif]-->

        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>        

        <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>        
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places"></script>
        <script type="text/javascript" src="js/plugins/fancybox/jquery.fancybox.pack.js"></script>                

        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>

        <script type='text/javascript' src='js/plugins/knob/jquery.knob.js'></script>

        <script type="text/javascript" src="js/plugins/daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script> 

        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-europe-mill-en.js'></script>

        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/demo.js"></script>
        <script type="text/javascript" src="js/maps.js"></script>        
        <script type="text/javascript" src="js/charts.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>        

    </head>
    <body>

        <?php $this->beginBody() ?>


        <div class="page-container">
            <div class="page-head">
                <ul class="page-head-elements">
                    <li><a href="#" class="page-navigation-toggle"><span class="fa fa-bars"></span></a></li>
                </ul>
<!--                <ul class="page-head-elements pull-right">
                    <li>
                        <div class="informer informer-pulsate">5</div>
                        <a href="#" class="dropdown"><span class="fa fa-comments"></span></a>                        
                        <div class="popup">
                            <div class="list no-controls">
                                <a href="#" class="list-item">
                                    <div class="list-item-content">
                                        <h4>John Doe</h4>
                                        <p><img src="img/samples/users/user-30.jpg" class="img-circle pull-left"/> RICARDOALFREDO Lorem ipsum dolor sit amet, consectetur adipiscing elit?</p>
                                        <span class="date">15:54</span>
                                    </div>                                
                                </a>
                                <a href="#" class="list-item">
                                    <div class="list-item-content">
                                        <h4>Benedict Cumberbatch</h4>
                                        <p><img src="img/samples/users/ben.jpg" class="img-circle pull-left"/> Nulla non venenatis nisl, nec sodales dolor</p>
                                        <span class="date">12:01</span>
                                    </div>
                                </a>
                                <a href="#" class="list-item">
                                    <div class="list-item-content">
                                        <h4>Jonny Lee Miller</h4>
                                        <p><img src="img/samples/users/jonny.jpg" class="img-circle pull-left"/> Ut leo ante, sodales vitae semper</p>
                                        <span class="date">10:25</span>
                                    </div>
                                </a>
                                <a href="#" class="list-item">
                                    <div class="list-item-content">
                                        <h4>Lucy Liu</h4>
                                        <p><img src="img/samples/users/liu.jpg" class="img-circle pull-left"/> Maecenas non felis tincidunt, rhoncus risus...</p>
                                        <span class="date">10:18</span>
                                    </div>
                                </a>
                                <a href="#" class="list-item">
                                    <div class="list-item-content">
                                        <h4>Martin Freeman</h4>
                                        <p><img src="img/samples/users/martin.jpg" class="img-circle pull-left"/> Maecenas non felis tincidunt, rhoncus risus</p>
                                        <span class="date">9:32</span>
                                    </div>
                                </a>
                            </div>
                            <div class="popup-block tac"><a href="pages-mailbox-inbox.html">Show all messages</a></div>
                        </div>
                        <div class="informer informer-pulsate">5</div>
                    </li>

                    <li><a href="#" class="page-sidebar-toggle"><span class="fa fa-tasks"></span></a></li>
                </ul>-->
            </div>

            <div class="page-navigation">
                <div class="page-navigation-info">
                    <a href="#">PONER LOGO</a>
                </div>
                <div class="profile">                    
                    <img src="img/samples/users/user-30.jpg"/>
                    <div class="profile-info">
                        <a href="#" class="profile-title">Howdy, John Doe</a>
                        <span class="profile-subtitle">Administrator</span>
                        <div class="profile-buttons">
                            <div class="btn-group">                                
                                <a class="but dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation" class="dropdown-header">Profile Menu</li>
                                    <li><a href="#">Messages</a></li>                                    
                                    <li><a href="#">Statistics</a></li>
                                    <li><a href="#">Changelog</a></li>
                                    <li><a href="#">Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                </div>
                <ul class="navigation">
                    <li><a href="index.html"><i class="fa fa-dashboard"></i> Perfil</a></li>
                    <li><a href="#"><i class="fa fa-pencil"></i> Form Stuff</a>
                        <ul>
                            <li><a href="form-elements.html">Elements</a></li>
                            <li><a href="form-editable.html">Editable Form</a></li>
                            <li><a href="form-validation.html">Validation</a></li>
                            <li><a href="form-wizard.html">Wizard</a></li>
                            <li><a href="form-wysiwyg.html">WYSIWYG Editors</a></li>
                            <li><a href="form-files.html">File Handling </a></li>
                        </ul>
                    </li>                    
                    <li><a href="#"><i class="fa fa-cogs"></i> UI Elements</a>
                        <ul>
                            <li><a href="ui-widgets.html">Widgets</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-slider-progress.html">Slider & Progress</a></li>
                            <li><a href="ui-modals.html">Modals & Popups</a></li>
                            <li><a href="ui-tabs.html">Tabs & Accordion</a></li>
                            <li><a href="ui-lists.html">Lists</a></li>
                            <li><a href="ui-blocks-panels.html">Blocks & Panels</a></li>
                            <li><a href="ui-icons.html">Icons</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                            <li><a href="ui-nestable.html">Nestable List</a></li>
                            <li><a href="ui-calendar.html">Calendar</a></li>
                            <li><a href="ui-portlet.html">Portlet</a></li>
                            <li><a href="ui-ajax.html">Ajax Content<span class="label label-danger">beta</span></a></li>
                        </ul>
                    </li> 
                    <li><a href="#"><i class="fa fa-table"></i> Tables</a>
                        <ul>
                            <li><a href="tables-default.html">Default Tables</a></li>
                            <li><a href="tables-datatables.html">DataTables</a></li>
                            <li><a href="tables-export.html">Export Tables</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Maps</a>
                        <ul>
                            <li><a href="maps-google.html">Google Maps</a></li>
                            <li><a href="maps-vector.html">Vector Maps</a></li>                            
                        </ul>
                    </li>
                    <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
                </ul>
            </div>
            <div class="page-content">
                <div class="container">
                    <?= $content ?>
                </div>
            </div>
            <div class="page-sidebar"></div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

