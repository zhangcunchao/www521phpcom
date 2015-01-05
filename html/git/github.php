<?php
if(@$_POST['payload']){
   $p = json_decode($_POST['payload'],true);
   if('update' == $p['commits'][0]['message']){
       file_put_contents('/data/log/git.log','1111');
   }
}
?>
