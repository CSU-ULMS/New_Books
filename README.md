# New_Books
Scripts to display new books added to CSU Collections.  In this implementation, the NewBooksTable.php file serves as a view for multiple Analytics queries (as can be pulled from a separate file).
# IMPLEMENTATION INSTRUCTIONS
1: CREATE YOUR ANALYTICS QUERY.  These should be based on items added recently filtered by call number.
![new books query](https://github.com/CSU-ULMS/New_Books/blob/master/A_Query.PNG)
Note also that the OCLC Number field requires special attention:
![oclc field](https://github.com/CSU-ULMS/New_Books/blob/master/OCLC_Number.PNG)

2: CREATE MULTIPLE QUERY PHP SCRIPTS TO PULL XML FILES FOR EACH QUERY.

3: SET UP CRON JOBS TO RUN THE QUERY FILES. 

