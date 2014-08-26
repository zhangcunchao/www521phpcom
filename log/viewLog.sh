cat www.521php.com.log | awk '{print $1" "$14" "$15}'| sort | uniq -c | sort -nr | head -40
