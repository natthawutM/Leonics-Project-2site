<?php

setcookie("id","",time() - 3600*24);
setcookie("auth","",time() - 3600*24);
setcookie("user","",time() - 3600*24);
setcookie("password","",time() - 3600*24);

header ("location: login.html");
?>