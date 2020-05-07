<?php
if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['like']) && !isset($_SESSION['dlike'])) {
    echo "<script type='text/js'>loadFragment(\"../forms/categories.survey.html\", document.getElementById(\"form\")";
    }
else
