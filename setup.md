# Setup
I tried to set up an automatic script to do the following, but I was unable to do so.
That being the case, I will need you guys to enter your MYSQL server as the root user and enter the following lines of code. Be sure to replace the word username with the mysql user that will be accessing the table.
You can enter most one by one, but the create table command bust be pasted in full all the way down to the MYISAM line.

```
CREATE DATABASE StatTracker;
GRANT ALL PRIVILEGES ON StatTracker TO 'username'@'localhost';
USE StatTracker;

CREATE TABLE users (
    username VARCHAR(128),
    email CHAR(60),
    pw CHAR(60),
    direction int,
    PRIMARY KEY (direction),
    submitted1 TINYINT(1),
    submitted2 TINYINT(1),
    submitted3 TINYINT(1),
    submitted4 TINYINT(1),
    submitted5 TINYINT(1),
    submitted6 TINYINT(1),
    submitted7 TINYINT(1),
    theme TINYINT(1),
    groupnum INT NOT NULL
) ENGINE = MYISAM;

DESCRIBE users;
```
---
Now that you have the database set up, you can edit the 'variables.php' file with your server's information so that our PHP scripts will be able to connect.
Just type in the following and add your username and password.
```
$server = "localhost";
$admin = "";
$adminpass = "";
$database = "StatTracker";
```
