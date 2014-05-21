<?php

class DebugController extends Controller
{
    
    public $index, $apiQuit, $apiHome, $apiList, $apiStat;
    
    public $serviceConfigList; 
    
    public $admin;
    
    //public $defaultAction='play';
    
    public function init ()
    {
        parent::init();
        
        // init memu url list
        $this->index = array(
            '/debug/'
        );
        $this->apiQuit = array(
            '/debug/apiQuit'
        );
        $this->apiHome = array(
            '/debug/apiHome'
        );
        $this->apiList = array(
            '/debug/apiList'
        );
        $this->apiStat = array(
            '/debug/apiStat'
        );
        
        // Get service action's annotation list
        $this->serviceConfigList = $this->_getServiceConfigList();
        
        $this->_printHead();
    }
    
    // //////////////////////////////////////////////////////////////////////////////////////////////
    // public methods

    public function actionIndex ()
    {
        $username = $this->param('username');
        $password = $this->param('password');
        if ($username && $password) {
            if ($username == 'admin' && $password == Yii::app()->params["apiDebugKey"]) {
                $this->admin['sid'] = session_id();
                $this->admin['name'] = $username;
                $this->session['admin'] = $this->admin;
                $this->redirect($this->apiHome);
            }
        }
        //echo "<link rel='stylesheet' href=".Yii::app()->baseUrl."/css/signin.css>";
       /*  echo '
        <div class="form">
        <form id="login-form" role="form">
        <h2 class="form-signin-heading">Login in</h2>
        <input type="text" name="username" required autofocus>
                <br/><br/>
        <input type="password" name="password" required>
        <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input type="submit">Sign in</button>
        </form>
        
        </div> <!-- /container -->'; */
        
        echo "<form method='post' class='well form-vertical'>";
        echo '<label for="TestForm_textField">username:</label>';
        echo "<input name='username' type='text' /><br/>";
        echo '<label for="TestForm_textField">password:</label>';
        echo "<input name='password' type='password' /><br/>";
        echo '<button class="btn" type="submit" name="yt2">Login</button>';
        echo "</form>\n";
       
    }
    
    
    public function actionApiQuit ()
    {
        $this->session->clear();
        $this->redirect($this->index);
    }

    public function actionApiHome ()
    {
        $this->_doAuthAdmin();
        $this->_printMenu();
        $this->widget('bootstrap.widgets.TbDetailView', array(
                'data'=>array('id'=>1, 'firstName'=>'实时接口测试', 'lastName'=>'接口访问统计', 'language'=>'Gii构建模块'),
                'attributes'=>array(
                        array('name'=>'firstName', 'label'=>'Api Test'),
                        array('name'=>'lastName', 'label'=>'Api State'),
                        array('name'=>'language', 'label'=>'Gii Module'),
                ),
        ));
        echo "<hr/>\n";
        
        echo "<b>Welcome <font color=red>{$this->admin['name']}</font></b>";
    }

    public function actionApiStat ()
    {
        $this->_doAuthAdmin();
        $this->_printMenu();
        
        $html = "<table class='tbfix' cellpadding=1 cellspacing=1>\n";
        foreach ((array) $this->serviceConfigList as $serviceName => $actionList) {
            $html .= "<tr><td class='title' colspan=4>{$serviceName}</td></tr>\n";
            foreach ((array) $actionList as $actionName => $actionConfig) {
                $actionKey = "$serviceName::$actionName";
                $visit = 0; // count visit count
                $runtime = 0; // count average visit runtime
                $html .= "<tr><td>{$actionName}</td><td>接口地址：
                {$actionConfig['action']}</td><td>访问次数：
                {$visit}</td><td>平均响应时间：{$runtime}</td></tr>\n";
            }
        }
        $html .= "</table>\n";
        echo $html;
    }

    public function actionApiList ()
    {
        $this->_doAuthAdmin();
        $this->_printMenu();
        
        $html = "<table class='tbfix' cellpadding=1 cellspacing=1>\n";
        foreach ((array) $this->serviceConfigList as $serviceName => $actionList) {
            $html .= "<tr><td class='title' colspan=4>{$serviceName}</td></tr>\n";
            foreach ((array) $actionList as $actionName => $actionConfig) {
                
                $url = $this->createUrl('debug/apiTest', 
                        array(
                                'serviceName' => $serviceName,
                                'actionName' => $actionName
                        ));
                $html .= "<tr><td>{$actionName}</td><td>{$actionConfig['title']}</td><td>{$actionConfig['action']}
				</td><td>" . CHtml::link('测试', $url) .
                         "</td></tr>\n";
            }
        }
        $html .= "</table>\n";
        echo $html;
    }

    public function actionApiTest ()
    {
        $this->_doAuthAdmin();
        $this->_printMenu();
        
        echo "<script type='text/javascript' src='".Yii::app()->baseUrl."/assets/apiTest.js'></script>\n";
        //echo "<script type='text/javascript'>";
        //echo "function apiTest () { var headers = arguments[0] || {}; var action = $('#action').val(); var method = $('#method').val(); var keys = new Array(); var vals = new Array(); var data = ''; $('input[name=paramKey]').each(function(){ var key = $.trim($(this).val()); keys.push(encodeURIComponent(key)); }); $('input[name=paramVal]').each(function(){ var val = $.trim($(this).val()); vals.push(encodeURIComponent(val)); }); for(var i=0; i<keys.length; i++){ data += keys[i] + '=' + vals[i] + '&'; } $.ajax({ 'headers' : headers, 'type' : method, 'url' : action, 'data' : data, 'success' : function(msg){ $('#result').val(formatJson(msg)); } }); }  ";
        //echo "</script>\n";
        echo "<script type='text/javascript'>\n";
        echo "$(document).ready(function(){";
        echo "var header={};";
        echo "$('.doTest').click(function(){apiTest(header)});";
        echo "});\n";
        echo "</script>\n";
        
        $serviceName = $this->param('serviceName');
        $actionName = $this->param('actionName');
        $configList = $this->serviceConfigList[$serviceName][$actionName];
        if (! $configList) {
            echo "Error : can not found '$serviceName::$actionName'.\n";
            exit();
        }
        
        // append sid
        $configList['action'] = $this->_format($configList['action']);
        
        $action = $configList['action'];
        $method = $configList['method'];
        $html = "<input type='hidden' id='action' value='{$action}'/>\n";
        $html .= "<input type='hidden' id='method' value='{$method}'/>\n";
        $html .= "<table class='tbcom' cellpadding=1 cellspacing=1>\n";
        $html .= "<tr><td class='title' colspan=2>{$serviceName} > {$actionName}</td></tr>\n";
        foreach ((array) $configList as $configKey => $configVal) {
            // action params
            if (is_array($configVal)) {
                $html .= "<tr><td>Test Data</td><td><table>\n";
                foreach ((array) $configVal as $paramName => $paramData) {
                    $paramDval = $paramData['dval']; // default value
                    $paramDesc = $paramData['desc']; // description
                    $html .= "  <tr><td>KEY : <input type='text' name='paramKey' value='{$paramName}'/> VALUE : <input type='text' name='paramVal' style='width:300px' value='$paramDval'/> ({$paramDesc}) </td></tr>\n";
                }
                $html .= "</table></td></tr>\n";
                // action attr
            } else {
                $html .= "<tr><td class='left'>{$configKey}</td><td>{$configVal}</td></tr>\n";
            }
        }
        $html .= "<tr><td class='left'>Test Submit</td><td><input type='button' class='doTest' value='提交测试'/></td></tr>\n";
        $html .= "<tr><td class='left'>Test Result</td><td><textarea id='result'></textarea></td></tr>\n";
        $html .= "</table>\n";
        echo $html;
    }

    protected function _format ($action)
    {
        $action = substr($action, 1);
        return $this->createUrl($action,array(
        				'sid'=>$this->session['admin']['sid']));
    }
    
    // //////////////////////////////////////////////////////////////////////////////////////////////
    // protected methods
    protected function _printHome ()
    {
        echo "<table class='tbmin' cellpadding=0 cellspacing=0>\n";
        echo "<tr><td>VISITOR IP</td><td>:</td><td>" . $_SERVER['REMOTE_ADDR'] .
                 "</td></tr>\n";
        echo "</table>\n";
        echo "<hr/>\n";
    }

    protected function _printMenu ()
    {
        $this->widget('bootstrap.widgets.TbMenu',array(
                'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
                'stacked'=>false, // whether this is a stacked menu
                'items'=>array(
                    array('label'=>'Home', 'url'=>$this->apiHome),
                    array('label'=>'Api Test', 'url'=>$this->apiList),
                    array('label'=>'Api Stat', 'url'=>$this->apiStat),
                    array('label'=>'Gii Module', 'url'=>array('gii/')),
                    array('label'=>'Phpmyadmin', 'url'=>'http://localhost/phpmyadmin'),
                    array('label'=>'Logout', 'url'=>$this->apiQuit),
                       
                 )));
    }

    protected function _printHead ()
    {
       
        header("Content-type: text/html; charset=utf-8");
        Yii::app()->bootstrap->register();
        echo "<style>\n";
        echo "table {margin:0px; padding:0px;}\n";
        echo "table.tbfix {width:100%; table-layout:fixed; background:#bbb}\n";
        echo "table.tbcom {width:100%; background:#bbb}\n";
        echo "td {padding:3px; background:#fff}\n";
        echo "td.title {background:#eee}\n";
        echo "td.left {width:200px}\n";
        echo "input.button {width:100px}\n";
        echo "textarea#result {width:100%; height:300px; background:#ffffe0}";
        echo "</style>\n";
        
        echo "<script type='text/javascript' src='".Yii::app()->baseUrl."/assets/jquery.js'></script>\n";
        echo "<script type='text/javascript' src='".Yii::app()->baseUrl."/assets/app.util.js'></script>\n";
        // bootstrap
        echo "<link rel='stylesheet' href=".Yii::app()->baseUrl."/css/bootstrap.css>";
        echo "<div><h2>" . Yii::app()->name . "  - v" .Yii::app()->params['version']. "</h2></div>";
        echo "<hr/>\n";
    }

    protected function _getServiceConfigList ()
    {
        $serviceConfigList = array();
        foreach (glob(dirname(__FILE__) . '/*.php') as $classFile) {
            $className = basename($classFile, '.php');
            if ($classFile && $className) {
                require_once $classFile;
                $rClass = new ReflectionClass($className);
                $methodList = $rClass->getMethods();
                $doc = new Document($classFile);
                foreach ($methodList as $method) {
                    if (preg_match('/^action/', $method->name)) {
                        // echo $method->name;
                        $config = $doc->getAnnotation($className, $method->name);
                        if ($config) {
                            $serviceConfigList[$className][$method->name] = $config;
                        }
                    }
                }
            }
        }
        // echo "servicelist\n";
        // var_dump($serviceConfigList);
        return $serviceConfigList;
    }

    protected function _doAuthAdmin ()
    {

        if (!$this->session['admin']) 
        {
            $this->redirect($this->index); // auth action
        } 
        else 
        {
            $this->admin = $this->session['admin'];
        }
    }
    
    /**
     * @title 网速测试
     * @action /debug/nettest
     * @params url http://teach.dlut.edu.cn STRING
     * @method get
     */
    public function actionNettest ()
    {
        $ch = curl_init($this->param('url'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(!curl_exec($ch))
        {
            die("Can't connect!");
        }
        curl_close($ch);    
        die('OK');
    }
}