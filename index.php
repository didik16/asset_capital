<?php

class Route
{

    private function simpleRoute($file, $route)
    {

        if (!empty($_REQUEST['uri'])) {
            $route = preg_replace("/(^\/)|(\/$)/", "", $route);
            $reqUri =  preg_replace("/(^\/)|(\/$)/", "", $_REQUEST['uri']);
        } else {
            $reqUri = "/";
        }

        if ($reqUri == $route) {
            $params = [];
            include($file);
            exit();
        }
    }

    function add($route, $file)
    {

        //will store all the parameters value in this array
        $params = [];

        //will store all the parameters names in this array
        $paramKey = [];

        //finding if there is any {?} parameter in $route
        preg_match_all("/(?<={).+?(?=})/", $route, $paramMatches);

        //if the route does not contain any param call simpleRoute();
        if (empty($paramMatches[0])) {
            $this->simpleRoute($file, $route);
            return;
        }

        //setting parameters names
        foreach ($paramMatches[0] as $key) {
            $paramKey[] = $key;
        }


        //replacing first and last forward slashes
        //$_REQUEST['uri'] will be empty if req uri is /

        if (!empty($_REQUEST['uri'])) {
            $route = preg_replace("/(^\/)|(\/$)/", "", $route);
            $reqUri =  preg_replace("/(^\/)|(\/$)/", "", $_REQUEST['uri']);
        } else {
            $reqUri = "/";
        }

        //exploding route address
        $uri = explode("/", $route);

        //will store index number where {?} parameter is required in the $route 
        $indexNum = [];

        //storing index number, where {?} parameter is required with the help of regex
        foreach ($uri as $index => $param) {
            if (preg_match("/{.*}/", $param)) {
                $indexNum[] = $index;
            }
        }

        //exploding request uri string to array to get
        //the exact index number value of parameter from $_REQUEST['uri']
        $reqUri = explode("/", $reqUri);

        //running for each loop to set the exact index number with reg expression
        //this will help in matching route
        foreach ($indexNum as $key => $index) {

            //in case if req uri with param index is empty then return
            //because url is not valid for this route
            if (empty($reqUri[$index])) {
                return;
            }

            //setting params with params names
            $params[$paramKey[$key]] = $reqUri[$index];

            //this is to create a regex for comparing route address
            $reqUri[$index] = "{.*}";
        }

        //converting array to sting
        $reqUri = implode("/", $reqUri);

        //replace all / with \/ for reg expression
        //regex to match route is ready !
        $reqUri = str_replace("/", '\\/', $reqUri);

        //now matching route with regex
        if (preg_match("/$reqUri/", $route)) {
            include($file);
            exit();
        }
    }

    function notFound($file)
    {
        include($file);
        exit();
    }
}
//Route instance
$route = new Route();

//route address and home.php file location
$route->add("/koneksi", "config/koneksi.php");
$route->add("/", "view/index.php");
$route->add("/about_us", "view/about_us.php");
$route->add("/why_us", "view/why_us.php");
// $route->add("/careers", "view/career.php");
// $route->add("/our_team", "view/our_team.php");

$route->add("/option_trading", "view/option_trading.php");
$route->add("/etf_trading", "view/etf_trading.php");
$route->add("/investment_banking", "view/investment_banking.php");
$route->add("/fixed_income_trading", "view/fixed_income_trading.php");
$route->add("/wealth_management", "view/wealth_management.php");

$route->add("/mergers", "view/mergers.php");
$route->add("/institutional_trading", "view/institutional_trading.php");
$route->add("/retail_trading", "view/retail_trading.php");
$route->add("/portfolio_management", "view/portfolio_management.php");
$route->add("/ecm_trading", "view/ecm_trading.php");

$route->add("/contact", "view/contact.php");

$route->add("/retirement_calculator", "view/retirement_calculator.php");
$route->add("/calculator", "view/calc/calculator.php");
$route->add("/research", "view/research.php");

$route->add("/login", "view/auth/login.php");
$route->add("/send_email", "view/send_email.php");
$route->add("/logout", "view/auth/logout.php");

$route->add("/ipo", "view/ipo.php");
$route->add("/ipo/all", "view/ipo_all.php");
$route->add("/ipo/{ipo}", "view/detail_ipo.php");

$route->add("/our-vision-and-values", "view/vision.php");

$route->notFound("view/404.php");
