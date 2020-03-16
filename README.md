# StatTracker
This projects goal is to provide a mechanism for student's to give feedback to both students and the teacher.
It's main features will include:
- login/registration/password reset
- Dynamic data collection
    - The user's survey questions will be determined based on the first answers that they give. We will use categorical data to gather inputs on their likes and dislikes
    - Theme switcher, implemented through JavaScript, PHP and CSS
    - A statistical analysis engine built in JavaScript to test data and output results in the form of text files on the server, This will occur in real time as the data comes in
    - JavaScript front-end that parses test results into diagrams (Pie charts, frequency charts, etc)
    - Pandoc and ImageMagick will be used on the back-end to create customized PDF files for each of the groups, as well as for the professor
