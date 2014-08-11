
<?php
function smarty_modifier_trun_cn($string, $length = 80, $etc = '...', $code = 'GB2312')
{
    if ($length == 0)
        return '';
    if ($code == 'UTF-8') {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
    }
    else {
    $pa = "/[\x01-\x7f]|[\xa1-\xff][\xa1-\xff]/";
    }
    preg_match_all($pa, $string, $t_string);
    if (count($t_string[0]) > $length)
        return join('', array_slice($t_string[0], 0, $length)) . $etc;
    return join('', array_slice($t_string[0], 0, $length)) . $etc;
}
?>
