<?php
session_write_close();
session_start();
session_unset();
session_destroy();
session_write_close();
?>