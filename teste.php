<?php

copy("DaoGenerico.interface.php", "interface.php.php");
chmod("interface.php.php", 0777);
rename("interface.php", "nbproject/DaoGenerico.interface.php");
chmod("nbproject/DaoGenerico.interface.php", 0777);
