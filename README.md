# TimerSet
This project allows for an accurate tracking of timing of requests through a Web Server.
Contestants click the button from index.php,
Loading the page places an entry into a SQL Table.
The first contestant is rewarded with a green background, all subsequent get a red background

______________
To Set This Up
______________

Go to the index.php file and fill in the variable declarations on lines 2-6 with your SQL server information
Ensure the table is already created having at least the following rows with the correct types
  'Time': TimeStamp,
  'Group': String,
  'Game': String,
  'Question':Integer,
Additionally each playing computer must identify themselves with the correct gamename through the "cookieset.html" page
The groupname merely identifies which group came first. It may be used more in future iterations.




Planned Improvements:
  Admin page that establishes a too early to submit through the placement of a Row in the table.
  Automatic Deletion of Rows from table after 24 Hours
  Point System from admin page
