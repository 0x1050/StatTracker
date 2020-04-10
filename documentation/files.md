# Files

It is very important to separate content from structure and logic, because of this we will implement the following rules:
- PHP files will contain no HTML, they will only speak to the server.
- index.html and survey.html will be container files, to be filled with html from the files in the forms and survey folders
- All styling will be placed within CSS files, not in HTML or PHP
- JavaScript will do the heavy lifting, placing content in index.html and survey.html

## Project Files and Directory Structure

| File                    | Purpose                                                                                                      |
| ----                    | -------                                                                                                      |
| index.html              | Landing page, allows user to login, register and reset password. Updated by forms.js                         |
| survey.html             | Where you end up when logged in, controlled and updated by survey.js                                         |
| about.html              | Our about page, speaks about project and group members                                                       |
| css/styles.css          | The base style sheet                                                                                         |
| css/theme1....css       | [multiple files] Contains the changes needed to apply different themes                                       |
| forms/login.html        | Contains only the HTML that builds the login form, passed to index by forms.js                               |
| forms/reset.html        | Contains only the HTML that displays the reset form, passed to index by forms.js                             |
| forms/registration.html | Contains only the HTML that displays the registration form, passed to index by forms.js                      |
| php/login.php           | Verifies username and password passed from index through POST                                                |
| php/reset.php           | Verifies email address and username passed from index through POST, displays password reset form on index    |
| php/registration.php    | Creates user with information passed from POST                                                               |
| php/survey.php          | Handles the information passed from survey.html through POST                                                 |
| php/variables.php       | This file will hold the variables that your php programs will use to access MYSQL. Add it to your .gitignore |
| js/forms.js             | Changes the source code of index.html to create the different forms a user may need                          |
| js/survey.js            | Will handle all information that needs to be passed onto survey.php                                          |
| js/pie.js               | Creates pie charts from data                                                                                 |
| js/frequency.js         | Creates frequency diagrams from data                                                                         |
| js/themes.js            | Theme switcher, submits data to themes.php                                                                   |
| survey/...              | The files in this folder will contain the questions that the user will answer                                |
