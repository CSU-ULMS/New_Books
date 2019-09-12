# New_Books
Scripts to display new books added to CSU Collections.  In this implementation, the NewBooksTable.php file serves as a view for multiple Analytics queries (as can be pulled from a separate file).

# Working Example: 
See: https://libguides.sdsu.edu/new-books
Here is an example of the PHP page:
https://serials.sdsu.edu/AnalyticsReporting/NewBooks/NewBooksTable.php?no=a

# IMPLEMENTATION INSTRUCTIONS
1: CREATE YOUR ANALYTICS QUERY.  These should be based on items added recently filtered by call number.
![new books query](https://github.com/CSU-ULMS/New_Books/blob/master/A_Query.PNG)

-- Note also that the OCLC Number field requires special attention:


![oclc field](https://github.com/CSU-ULMS/New_Books/blob/master/OCLC_Number.PNG)

-- Example queries can also be found here in the CSU shared folder:/shared/Community/Reports/Institutions/CalState/NewBooks

2: CREATE MULTIPLE QUERY PHP SCRIPTS TO PULL XML FILES FOR EACH QUERY.  You may want to separate your lists by location or format, this can be done by creating separate query PHP scripts for each Analytics query.

3: SET UP CRON JOBS TO RUN THE QUERY FILES. Since some of these queries may take a while to load, you will want to run these by cron jobs to load the XML in the background.  So, for example, SDSU runs daily cron jobs to run the query.php files.  These queries write to the xml files which are then read by the NewBooksTable.php file.  

Figure 1: Crontab for the SDSU New Books Feeds
![new books crontab](https://github.com/CSU-ULMS/New_Books/blob/master/NewBooksCrontab.PNG)



