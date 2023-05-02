## This is a simple waitlist management system built entirely on php, Javascript using the JQuery library, HTML, CSS, and Bootstrap.
it allows for easy appointment bookings 
- users can create a lobby just by setting up a work profile
- users can join in on others lobby 
- you get an in site message if it's your turn to be attended to
- so many other functionalities
## i tried hard to keep the site super simple UI
|file                |       description                                                                |
|All .CSS files      | for stylings
|bootstrap-5.0.2-dist, css folders| Bootstrap 5
|dashboard.php| This is a PHP script that starts a session, includes a file for database connection, and retrieves user data from the database. It also fetches waitlists joined by the user and waitlists created by other users, and allows the user to join, remove, skip, or clear waitlists. The script uses SQL queries to interact with the database and header() function to redirect the user to a different page.
|authentication.php|  * The function handles user registration and login by validating input, checking for existing accounts, and performing SQL queries. 
- @param data The code is a PHP script that handles user registration and login functionality. It starts a session, includes a database connection file, and initializes variables for user input. The
- `test_input()` function is a global function that sanitizes user input by removing whitespace, slashes, and special characters.
-  @return There is no output being returned by the code. It is a PHP script that performs database operations and redirects the user to different pages based on the actions they take (register or login).