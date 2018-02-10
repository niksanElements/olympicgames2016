<?php

/**
 * Parse REQUEST_URI to extract request parts: {controller}/{action}/{params}
 * @return array holding: 'controller' (string), 'action' (string) and
 * 'params' (array of strings). When controller / action is not available,
 * returns the default controller 'home' / action 'index'.
 */
function parseRequest() : array
{
    $requestPath = $_SERVER['REQUEST_URI'];
    if (substr($requestPath, 0, strlen(APP_ROOT . '/')) != APP_ROOT . '/') {
        die('APP_ROOT is incorrectly defined in config.php. Use "" or "/olympicgames-2016".');
    }

    $requestPath = substr($requestPath, strlen(APP_ROOT)); // remove APP_ROOT prefix
    $requestParts = explode('/', $requestPath);

    // Extract the controller from {controller}/{action}/{params}
    $controller = DEFAULT_CONTROLLER;
    if (count($requestParts) >= 2 && $requestParts[1] != '') {
        $controller = $requestParts[1];
    }

    // Extract the action from {controller}/{action}/{params}
    $action = DEFAULT_ACTION;
    if (count($requestParts) >= 3 && $requestParts[2] != '') {
        $action = $requestParts[2];
    }

    // Extract the action parameters from {controller}/{action}/{params}
    $params = array_splice($requestParts, 3);

    $requestParsed = [
        'controller' => $controller,
        'action' => $action,
        'params' => $params];
    return $requestParsed;
}

/**
 * Processes the parsed request /{controller}/{action}/{params}. Creates and
 * initializes the requested controller class, invokes the requested action
 * and renders its view.
 * @param array $requestParsed associative array holding: 'controller' (string),
 * 'action' (string) and 'params' (array of strings).
 */
function processRequest(array $requestParsed)
{
    // Create the controller class
    // var_dump("I'm inside processRequest");
    $controller = $requestParsed['controller'];
    $action = $requestParsed['action'];
    $controllerClassName = ucfirst(strtolower($controller)) . 'Controller';
    if (class_exists($controllerClassName)) {
        // var_dump("I found the $controllerClassName");
        $controller = new $controllerClassName($controller, $action);
        // var_dump("$controller");
    } else {
        $controllerFileName = "controllers/" . $controllerClassName . '.php';
        die("Cannot find controller '$controller' in class '$controllerFileName'");
    }

    // Invoke the requested action and renders its view (if not rendered)
    if (method_exists($controller, $action)) {
        // Invoke $controller->{$action}($params);
        $params = $requestParsed['params'];
        call_user_func_array(array($controller, $action), $params);
        // var_dump("Invoke the requested action");
        $controller->renderView();
    } else {
        var_dump("method does not exist: $controller, $action");
        die("Cannot find action '$action' in controller '$controllerClassName'");
    }
}

/**
 * Auto load the controller and model classes from their .php files.
 * @param string $class_name <p>the name of the class to load</p>
 */
function __autoload(string $class_name)
{
    if (file_exists("controllers/$class_name.php")) {
        include "controllers/$class_name.php";
    }
    if (file_exists("models/$class_name.php")) {
        include "models/$class_name.php";
    }
}

function cutLongText(string $text, int $maxSize=400, bool $htmlEscape = true) : string
{
    $append = '';
    if (strlen($text) > $maxSize) {
        $text = substr($text, 0, $maxSize);
        $append = '&hellip;';
    }
    if ($htmlEscape)
        $text = htmlspecialchars($text);
    return $text . $append;
}

function findImage(string $content) : array 
{
    preg_match_all('/<img[^>]+>/i',$content, $result);
    return $result;
}

function getDescription(string $content,int $length=400): string
{
    $result = "";

    $s_p = strpos($content, "<p>");
    $e_p = strpos($content, "</p>");

    $result = substr($content,$s_p,$e_p);
    if(strlen($result) > $length)
    {
        $pos = strpos(substr($result,$length,strlen($result)), " ")+$length;
        $result = substr($result,0,$pos)."...";
    }

    return $result;
}

function getKeywords(string $string,array $stopWords= [" "])
{   
    if(count($stopWords) <= 4){
        // replace array below with proper Bengali stopwords
        $stopWords = ['i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in','is','it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www','на','от','за','да','се','по','са','ще','че','не','това','си','като','до','през','които','най','при','но','има','след','който','към','бъде','той','още','може','му','което','много','със','която','или','само','тази','те','обаче','във','вече','около','както','над','така','между','ако','лв','им','тези','преди','млн','бе','също','пред','ни','когато','защото','кв','би','пък','тъй','ги','ли','пак','според','този','все','някои','и','е','с','в'];
    }

    $string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
    $string = trim($string); // trim the string
    // remove this preg_replace because Bengali sybmols doesn't match this pattern
    // $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
    $string = strtolower($string); // make it lowercase

    preg_match_all('/\s.*?\s/i', $string, $matchWords);
    $matchWords = $matchWords[0];

    foreach ( $matchWords as $key=>$item ) {
        if ( $item == '' || in_array(strtolower(trim($item)), $stopWords) || strlen($item) <= 3 ) {
            unset($matchWords[$key]);
        }
    }
    $wordCountArr = array();
    if ( is_array($matchWords) ) {
        foreach ( $matchWords as $key => $val ) {
            $val = trim(strtolower($val));
            if ( isset($wordCountArr[$val]) ) {
                $wordCountArr[$val]++;
            } else {
                $wordCountArr[$val] = 1;
            }
        }
    }
    arsort($wordCountArr);
    $wordCountArr = array_slice($wordCountArr, 0, 20);
    return $wordCountArr;
}

function
 beliefmedia_keywords($string, $min_word_length = 3, $min_word_occurrence = 2, $as_array = false, $max_words = 8, $restrict = false) {
 
   function keyword_count_sort($first, $sec) {
     return $sec[1] - $first[1];
   }
 
   $string = preg_replace('/[^\p{L}0-9 ]/', ' ', $string);
   $string = trim(preg_replace('/\s+/', ' ', $string));
	
   $words = explode(' ', $string);
 
   /* 	
	Only compare to common words if $restrict is set to false
	Tags are returned based on any word in text
	If we don't restrict tag usage, we'll remove common words from array 
   */
 
   if ($restrict === false) {
      $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','home','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
      $words = array_udiff($words, $commonWords,'strcasecmp');
   }
 
   /* Restrict Keywords based on values in the $allowedWords array */
   if ($restrict !== false) {
      $allowedWords =  array('engine','boeing','electrical','pneumatic','ice');
      $words = array_uintersect($words, $allowedWords,'strcasecmp');
   }
 
   $keywords = array();
 
   while(($c_word = array_shift($words)) !== null) {
 
     if (strlen($c_word) < $min_word_length) continue;
     $c_word = strtolower($c_word);
 
        if (array_key_exists($c_word, $keywords)) $keywords[$c_word][1]++;
        else $keywords[$c_word] = array($c_word, 1);
   }
 
   usort($keywords, 'keyword_count_sort');
   $final_keywords = array();
 
   foreach ($keywords as $keyword_det) {
     if ($keyword_det[1] < $min_word_occurrence) break;
     array_push($final_keywords, $keyword_det[0]);
   }
	
  $final_keywords = array_slice($final_keywords, 0, $max_words);
 
 return $as_array ? $final_keywords : implode(', ', $final_keywords);
}