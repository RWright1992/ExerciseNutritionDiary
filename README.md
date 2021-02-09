# Final Year Project

# Diet and Nutrition Diary

### Brief

This repo contains my finaly year project written in 2015. It was originally hosted on a server located in Jordanstown Campus however the orginal server has been taken down. This application can still be run locally using XAMPP


1. [Project Requirements](#requirements)
2. [Running App Locally](#runapp)

  
### Project Requirements <a name="requirements"></a>

For my task I was given the objective of developing an application which would meet the following functional requirements:

* The user shall be able to load the application through the browser on mobile devices.
* The user shall have to log into the application with a username and password.
* The user can commit all entries to a MySQL data base.
* Each record of entries will have a unique ID attached.
* The MySQL database will place a time/date stamp on each collection of entries.
* The Nutrition Scientist must be able to use a PC to easily view the data from registered users.
 * The data must be in a format that is easy to view and study.
 * The ability to output results in a meaningful and easy to view manner.
* The user shall be able to enter foods and liquids into the database as separate entities.
* The user shall be able to input their exercise duration.
* The user shall be able to put in the values for Calories, Fat, Saturated Fat, Carbohydrates, Carbohydrates which sugar, Protein and Salt for nutritional entries.
* The user shall be able to use parts of the application when there is no internet connection
* The admin will be able to access student record details so a student can regain account information if it lost or forgotten.
### Running App Locally (Using XAMPP Windows) <a name="runapp"></a>

* Download XAMPP onto your local machine. (https://www.apachefriends.org/index.html)
* Once XAMPP is installed copy the folder nutritiondiary from repo into C:/xampp/htdocs
* Open the XAMPP control panel then start the MySQL and Apache modules
* Open your webbrowser and go to localhost
* Open the phpMyAdmin link in top right corner on XAMPP welcome screen
* Create table called 'nutritiondiary'
* Go into nutritiondiary table and import nutritiondiary.sql file from repo
* In broswer connect to localhost/nutritiondiary to use application
* To log into admin section of application use 'admin@dmin.com' as email and 'admin' as password