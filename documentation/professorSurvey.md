## Professor Survey Data

Information below will include the questions included in the survey as well as a walk through on how to create the database table required for our profsurveys.html and profsurveys.php.

---

### Survey Questionaire:

#### Course Questions

1. How would you rate CSC350 content?
(1-Extremely valuable,2-Highly valuable,3-Valuable,4-Partly valuable,5-Not Valuable)

2. How would you rate your CSC350 course delivery before Distance Learning?
(1-Extremely effective,2-Highly effective,3-Effective,4-Partly effective,5-Not effective)

3. How would you rate your CSC350 course delivery during Distance Learning?
<br>
(1-Extremely effective,2-Highly effective,3-Effective,4-Partly effective,5-Not effective)

4. How would you rate your professor for subject knowledge?
(1-Extremely valuable,2-Highly valuable,3-Valuable,4-Partly valuable,5-Not Valuable)

5. How would you rate your interest during course sessions?
(1-Extremely interesting,2-Highly interesting,3-Interesting,4-Partly interesting,5-Not interesting)

---

#### Group Activity Questions

1.  How do you rate the difficulty level of the project task assigned to you?
(1-Not difficult,2-Slightly difficult,3-Difficult,4-Need help,5-Not attainable)

2.  How do you rate the organization skills of your project leader?
<br>
(1-Extremely organized,2-Organized,3-Somewhat organized,4-Slightly disorganized,5-Chaos)

3.  How do you rate the contributions of your team members?
(1-Extremely valuable,2-Highly valuable,3-Fair enough,4-Uneven,5-No contribution)

4.  How do you rate yourself as a student in this course?
(1-A student,2-B student,3-C student,4-I am hoping,5-No comment)

5.  How do you rate what you have learned in this course?
<br>
(1-Extremely valuable,2-Highly valuable,3-Valuable,4-Partly valuable,5-Not Valuable)

---

#### Create ProfData SQL Table:
Run with **MySQL** in your ***terminal*** or ***PHPMYADMIN***:
```SQL
CREATE TABLE ProfData(    Content        INT(1)    NOT NULL,
            BeforeDL    INT(1)    NOT NULL,
            AfterDL        INT(1)    NOT NULL,
            Knowledge    INT(1)    NOT NULL,
            Interest    INT(1)    NOT NULL,
            Difficulty    INT(1)    NOT NULL,
            Leader        INT(1)    NOT NULL,
            Contribution    INT(1)    NOT NULL,
            Evaluation    INT(1)    NOT NULL,
            Learned        INT(1)    NOT NULL,
            );
```
