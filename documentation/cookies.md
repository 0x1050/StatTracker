# Cookies
A cookie is data that a server saves on a client's hard disk.
It can contain almost any alphanumeric data, up to 4KB.
They can be used for session tracking, maintaining data across visits, login details, etc.
For privacy, they can only be read by the issuing domain.

Third-party cookies are cookies created by elements on a page that come from other domains than the one you are visiting.
Most people that disable cookies do so only for third-party cookies.

Cookies are exchanged during the transfer of headers, before HTML is ever sent out.

## Setting a Cookie
As long as no HTML has been transferred,  you can use the 'setcookie' function:

- name - The name of the cookie
- value - The contents of the cookie
- expire - (optional) Unix timestamp of expiration date. If not set, the cookie expires when the browser closes
- path - (optional) The path of the cookie on the server. If this is a '/', the cookie is available over the entire domain. The default is the current subdomain that issues the cookie
- domain - (optional) The internet domain of the cookie
- secure - (Optional) When set to TRUE, the cookie can only be transferred over a secure connection, default is FALSE
- httponly - (Optional) Whether the cookie must use HTTP protocol. If TRUE, scripting languages cannot access the cookie. Default is FALSE

```php
setcookie(name, value, expire, path, domain, secure, httponly);
//Username los, expires in seven days
setcookie('username', 'Los', time() + 60 * 60 * 24 * 7, '/');
```

## Accessing a Cookie
```
if (isset($_COOkIE['data'])) $$data = $_Cookie['data'];
```
You can only read a cookie back after it has been sent to the bowser

## Destroying a Cookie
issue it again and set it's expiration to a date in the past
```php
setcookie('username', 'Los', time() - 2592000, '/');
```

# Sessions
Sessions can be used to track what users do between pages.
We will use this to keep track of the user's choices.

## Starting a Session
To begin a session, use the PHP function `session_start` before outputting any HTML, similar to cookies.

```PHP
$_SESSION['variable'] = $value;

//Retrieve session variables.....

$variable = $_SESSION['variable'];

//To destroy a session, we use the session_destroy() function
//We can use a function to destroy a session and its variables

destroy_session_and_data();

function destroy_session_and_data() {
session_start();
$_SESSION = array();
setcookies(session_name(), '', time() - 2592000, '/');
session_destroy();
}
```

## Setting a Time-Out
```php
ini_set('session.gc_maxlifetime', 60 * 60 * 24);

//Display time till time-out
echo ini_get('session.gc.maxlifetime');
```

## Force Cookie-Only Sessions
```php
ini_set('session.use_only_cookies', 1);
```







