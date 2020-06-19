<?php

return $conn = mysqli_connect('localhost', 'root', '', 'ifest');

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}