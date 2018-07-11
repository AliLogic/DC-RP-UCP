<?php
function BBCodeToHTML($content) 
{
  $search = array (
    '/(\[b\])(.*?)(\[\/b\])/',
    '/(\[i\])(.*?)(\[\/i\])/',
    '/(\[u\])(.*?)(\[\/u\])/',
    '/(\[ul\])(.*?)(\[\/ul\])/',
    '/(\[li\])(.*?)(\[\/li\])/',
    '/(\[url=)(.*?)(\])(.*?)(\[\/url\])/',
    '/(\[url\])(.*?)(\[\/url\])/',
    '/(\[s\])(.*?)(\[\/s\])/',
    '/(\[img\])(.*?)(\[\/img\])/',
    '/(\[center\])(.*?)(\[\/center\])/',
    '/(\[hr\])(.*?)(\[\/hr\])/',
    '/(\[div=)(.*?)(\])(.*?)(\[\/div\])/',
    '/(\[color=)(.*?)(\])(.*?)(\[\/color\])/',
    '/(\[size=)(.*?)(\])(.*?)(\[\/size\])/',
  );

  $replace = array (
    '<strong>$2</strong>',
    '<em>$2</em>',
    '<u>$2</u>',
    '<ul>$2</ul>',
    '<li>$2</li>',
    '<a href="$2" target="_blank">$4</a>',
    '<a href="$2" target="_blank">$2</a>',
    '<s>$2</s>',
    '<img class="img-responsive" src="$2">',
    '<center>$2</center>',
    '<hr>',
    '<span style="color: $2;">$4</span>',
    '<span style="font-size: $2;">$4</span>',
  );

  return preg_replace($search, $replace, nl2br($content));
}
?>