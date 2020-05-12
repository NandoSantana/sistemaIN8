<?php

function getElementsByClassName($dom, $ClassName, $tagName=null) {
    if($tagName){
        $Elements = $dom->getElementsByTagName($tagName);
    }else {
        $Elements = $dom->getElementsByTagName("*");
    }
    $Matched = array();
    for($i=0;$i<$Elements->length;$i++) {
        if($Elements->item($i)->attributes->getNamedItem('class')){
            if($Elements->item($i)->attributes->getNamedItem('class')->nodeValue == $ClassName) {
                $Matched[]=$Elements->item($i);
            }
        }
    }
    return $Matched;
}


function crawl_page($url, $depth = 5)
{
    static $seen = array();
    if (isset($seen[$url]) || $depth === 0) {
        return;
    }

    $seen[$url] = true;

    $dom = new DOMDocument();
    @$dom->loadHTMLFile($url);

    $anchors = $dom->getElementsByTagName('a');
    $classNameTitle = "feed-post-link gui-color-primary gui-color-hover";
    $links = getElementsByClassName($dom, $classNameTitle, 'a');
    
    $classNameImg = "bstn-fd-picture-image";
    $finder = new DomXPath($dom);
    $imgs = $finder->query("//*[contains(@class, '$classNameImg')]");
    
    foreach ($imgs as $img) {
       
       $linkImg .= $img->getAttribute("src");
    }

    $slice = explode('jpg', $linkImg);

    $dados = array(
        'primeira_noticia' => array('foto' => $slice[0]."jpg", 'titulo'=> $links[1]->nodeValue),
        'segunda_noticia' => array('foto' => $slice[1]."jpg", 'titulo'=> $links[2]->nodeValue),
        'terceira_noticia' => array('foto' => $slice[2]."jpg", 'titulo'=> $links[3]->nodeValue)

    );

    echo json_encode($dados);
}
crawl_page("https://g1.globo.com/", 2);