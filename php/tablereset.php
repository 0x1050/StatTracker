<!-- This script resets and recreates your tables, it also fills them
in with user names and passwords gathered from users.php. The email
addresses are simply their name@stu.bmcc.cuny.edu, and is hashed, so
we can verify them with password_verify(), the password is simply their
names backwards in lowercase. This gives us enough information to validate
users and move forward in our production to the survey.

Also, this script fills in the group tables with random data, enabling us
to begin parsing the information to create the statistics neccesary for
the visualizations and the feedback -->
<?php
    require_once 'config.php';
    require_once 'users.php';

    $serverlink = mysqli_connect($server,$admin,$adminpass,$database);
    if ($serverlink->connect_error) {
	    die("Connection failed: " . $serverlink->connect_error);
    } else {
	    $sql = "DROP TABLE Users";
	    mysqli_query($serverlink, $sql);
	    for ( $i = 1; $i < 7; $i++) {
		    $sql = "DROP TABLE G" . $i;
		    mysqli_query($serverlink, $sql);
	    }

	    //Create Users table
	    $sql  = "CREATE TABLE IF NOT EXISTS Users(";
	    $sql .= "UserID       INT(2)      UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,";
	    $sql .= "username     VARCHAR(20) NOT NULL,";
	    $sql .= "email        CHAR(60)    NOT NULL,";
            $sql .= "password     CHAR(60)    NOT NULL,";
            $sql .= "groupNumber  INT(1)      NOT NULL,";
            $sql .= "theme        INT(1)      NOT NULL DEFAULT 1,";
            $sql .= "active       INT(1)      NOT NULL DEFAULT 0,";
            $sql .= "stayLoggedIn INT(1)      NOT NULL DEFAULT 0,";
            $sql .= "s1           INT(1)      NOT NULL DEFAULT 0,";
            $sql .= "s2           INT(1)      NOT NULL DEFAULT 0,";
            $sql .= "s3           INT(1)      NOT NULL DEFAULT 0,";
            $sql .= "s4           INT(1)      NOT NULL DEFAULT 0,";
	    $sql .= "s5           INT(1)      NOT NULL DEFAULT 0,";
	    $sql .= "s6           INT(1)      NOT NULL DEFAULT 0)";

	    mysqli_query($serverlink, $sql);

	    //Populate Users table
	    for ($i = 1; $i <= count($names); $i++) {
		    $id = $i;
		    if ($id > 5) {
			    $id -= 4;
		    }
		    $email = password_hash($names[$i] . "@bmcc.cuny.edu", PASSWORD_BCRYPT);
		    $passhash = password_hash($names[$i], PASSWORD_BCRYPT);
		    $sql = "INSERT INTO Users(username,
			                          email,
                                      password,
					      groupNumber,
                                              theme,
                                              active,
                                              stayLoggedIn) VALUES(\"$usernames[$i]\",
                                                                   \"$email\",
                                                                   \"$passhash\",
                                                                   \"$id\",
                                                                   \"1\",
                                                                   \"1\",
                                                                   \"1\")";
		    mysqli_query($serverlink, $sql);
	    }

	            //Create group tables
	            for ($i = 1; $i < 7; $i++) {
			    $sql  = "CREATE TABLE IF NOT EXISTS G" . $i;
			    $sql .= "(LikeA INT(1) DEFAULT NULL,";
			    $sql .= "LikeB INT(1) DEFAULT NULL,";
			    $sql .= "likeC INT(1) DEFAULT NULL,";
                            $sql .= "DislikeA INT(1) DEFAULT NULL,";
                            $sql .= "DislikeB INT(1) DEFAULT NULL,";
                            $sql .= "DislikeC INT(1) DEFAULT NULL,";
                            $sql .= "A1 INT(1) DEFAULT NULL, ";
                            $sql .= "A2 INT(1) DEFAULT NULL,";
                            $sql .= "A3 INT(1) DEFAULT NULL,";
                            $sql .= "B1 INT(1) DEFAULT NULL,";
                            $sql .= "B2 INT(1) DEFAULT NULL,";
                            $sql .= "B3 INT(1) DEFAULT NULL,";
                            $sql .= "C1 INT(1) DEFAULT NULL,";
                            $sql .= "C2 INT(1) DEFAULT NULL, ";
                            $sql .= "C3 INT(1) DEFAULT NULL,";
                            $sql .= "Scale INT(1) NOT NULL,";
                            $sql .= "FF1 TINYTEXT,";
                            $sql .= "FF2 TINYTEXT)";
		    mysqli_query($serverlink, $sql);

		    //Populate group tables
		    for ($j = 1; $j <= count($names); $j++) {
			    $like = rand(1, 3);
			    $dislike = rand(1, 3);
			    while ($dislike == $like) {
				    $dislike = rand(1, 3);
			    }
			    if ($like == 1)
				    $like = "A";
			    else if ($like == 2)
				    $like = "B";
			    else
				    $like = "C";
			    if ($dislike == 1)
				    $dislike = "A";
			    else if ($dislike == 2)
				    $dislike = "B";
			    else
				    $dislike = "C";
			    $sql = "INSERT G" . $i . "(Like"    . $like    . ",
                        			       Dislike" . $dislike . ",
                        			       "        . $like    . "1,
                        			       "        . $like    . "2,
                        			       "        . $like    . "3,
                        			       "        . $dislike . "1,
                        			       "        . $dislike . "2,
                        			       "        . $dislike . "3,
                        			       Scale,
                        		               FF1,
                        		               FF2) VALUES(\"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 5)     . "\",
                                                                   \"" . rand(1, 10)    . "\",
                                                                   \"" . $names[$j]     . "\",
                                                                   \"" . $usernames[$j] . "\")"; 
			    mysqli_query($serverlink, $sql);
		    }
	    }

    mysqli_close($serverlink);
  }
?>
