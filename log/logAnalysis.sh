#!/bin/sh
num_file='/data/www/www.521php.com/log/num'
log_file='/data/www/www.521php.com/log/www.521php.com.log'
log_file_bak='/data/www/www.521php.com/log/www.521php.com.log.bak'
num=`cat $num_file`
let "num = $num + 1"
`cat $log_file|wc -l > $num_file`
log=`tail -n +$num $log_file`
if [ -n "$log" ]
then
tail -n +$num $log_file > $log_file_bak
#`printf $log`
cat $log_file_bak | awk '{
if("403" == $9 || "112.253.28.43" == $1){}
else if("\"-\"" == $12 && "\"-\"" == $11 && $7 ~ "\\.php"){
  cmd="/root/shell/nginx/editblocksip.sh add "$1;
  system(cmd);
}
else if("/wp-comments-post.php" == $7 && "MSIE"==$14 && "6.0;"==$15){
  cmd="/root/shell/nginx/editblocksip.sh add "$1;
  system(cmd);
}else if($7 ~ "\\.zip" || $7 ~ "\\.rar" || $7 ~ "download.php"){
  cmd="/root/shell/nginx/editblocksip.sh add "$1;
  system(cmd);
 }
}'
#cat $log_file_bak | awk '{print "sh /root/shell/nginx/editblocksip.sh add "$1}'
#cat $log_file_bak | awk '{echo $1}{print $1" "$9" "$14" "$15}'
# | awk '{print $1" "$14" "$15}'| sort | uniq -c | sort -nr | head -40
fi
