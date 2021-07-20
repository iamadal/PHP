<?php
  switch ($_SERVER['REQUEST_URI']) {
  	case '/':
  		echo "/ is showed";
  		break;

    case '/apps':
  		echo "/apps is showed";
  		break;
  	
  	default:
  		echo "Requested URL not found";
  		break;
  }