<?php

class FUN{
  public static function getBaseUrl(){
// if(isset($_SERVER['HTTPS'])){
//         $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
//     }
//     else{
//         $protocol = 'http';
//     }
//     return $protocol . "://" . $_SERVER['HTTP_HOST'];
//
//   }


  // first get http protocol if http or https
  $base_url = "http://";
  if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && ('https' == $_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    $base_url = "https://";
  }
  $https = false;
  // get default website root directory

  $tmpURL = dirname(__FILE__);

  // when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",

  //convert value to http url use string replace,

  // replace any backslashes to slash in this case use chr value "92"

  $tmpURL = str_replace(chr(92),'/',$tmpURL);

  // now replace any same string in $tmpURL value to null or ''

  // and will return value like /localhost/my_website/ or just /my_website/

  $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

  // delete any slash character in first and last of value

  $tmpURL = ltrim($tmpURL,'/');

  $tmpURL = rtrim($tmpURL, '/');


  // check again if we find any slash string in value then we can assume its local machine

      if (strpos($tmpURL,'/')){

  // explode that value and take only first value

         $tmpURL = explode('/',$tmpURL);

         $tmpURL = $tmpURL[0];

        }

  // now last steps

  // assign protocol in first value

     if ($tmpURL !== $_SERVER['HTTP_HOST'])

  // if protocol its http then like this

        $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL;

      else

  // else if protocol is https

        $base_url .= $tmpURL;

  // give return value

  return $base_url;

  }

  public static function truncate($text, $chars = 25) {
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    $text = $text."...";
    return $text;
}
}
