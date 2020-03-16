# Technologies
The way we will use technology can be broken down as follows:

## HTML 5
- We will need to stick to standards here, HTML can only be used to structure the contents of the site, no presentational elements.
## CSS
- This is where we will create our presentation
- Will be updated through JavaScript in order to change theme
## PHP
- Database creation, access and management
- Will keep track of users as well as whether or not they have submitted a response to a group survey in order to ensure that there will only be one entry per group.
- Will keep track of what theme the user chose, this info will be tested at the end and we will use the classes' favorite theme during our presentation.
## JavaScript
- Implement the theme switcher
- Receive data from PHP and will run statistical analysis on it
- Produce visualizations of data results
- Create cookies to keep track of user's choices until it is posted in the database
- Keep track of user settings
- Rewrite page upon the user's choices, i.e. if the user says he likes the way that the project uses technology, it'll ask questions about that
- Decides order of Likert scales for each individual student
- Update individual's table with direction of Likert questions (AJAX? JQuery?)
