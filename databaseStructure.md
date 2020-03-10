# Database Structure

## Users Table

| Field         | Type         | Description                                                                                                                       |
| -----         | ----         | ----------                                                                                                                        |
| email         | varchar(80)  | This is the user's email, it will be hashed to provide anonymity                                                                  |
| pw            | varchar(80)  | User's password, will be used along with username to login                                                                        |
| group number  | char(1)      | This will be used to provide a customized pdf at the end of the project for each individual group                                 |
| username      | varchar(128) | Used for login and anonymization                                                                                                  |
| theme         | char(1)      | This will keep track of what theme each user picks, will be used later to determine which theme to use during presentation        |
| active        | varchar(?)   | Is the user active? I don't think we need this, but the professor asked for it in the last homework, so we'll include it for now  |

*Note* I had originally planned to have fields for whether the person was the lead and for a user image, but I feel like that would bias the results

## Group Data

Group data will be collected in a set of tables, one for each group. Each table will have an index for each question. The users will fill these fields with data when they submit their survey answers. Storing information ere will serve to further anonymize the data received from users.

User's will only be able to submit answers during a groups allotted presentation time. All variables will be stored within a cookie until they are sent, then the table is populated with data and the cookie is destroyed. This preserves the integrity of the data in the case that the data could not be input for some reason (too many transactions at once, etc.)
