# IT414
To import database and set up proper user credentials:
#1. Download and extract all files from the zipped folder. 
#2. Open phpMyAdmin, and select the 'User Accounts' tab. 
#3. Select 'Add user account'.
#4. Create a new user with the User name 'username,' and password set to 'password.' 'Local' should be selected under Host name.
#5. Next to 'Global privileges' select 'Check all'. 
#6. Select 'Go.' 
#7. Select 'new', enter a new database named "telmon_database",  and select utf8_general_ci.
#8. Select 'Create'. 
#9. Select the 'Import' tab and browse your computer for the telmon_database.sql file. 
#10. Select 'Go' to import tables into your new database.

To navigate database:
#1. First, open the wamp64 or XAMPP folder in the C drive.
#2. Next, open the root folder (www or htdocs depending on server).
#3. Place css, php, and images folders inside the root folder.
#4. To open the files, type localhost/php/department.php in the URL bar of an open browser.
#5. You should now be able to navigate the database with the HTML interface. 
