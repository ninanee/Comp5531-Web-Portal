# Comp5531-Web-Portal

This is our web portal project, and written in PHP and HTML using CSS.

It is connected to a MySQL server using SQL language.

To run the website locally, do the following:
   1. Clone this repo.
   2. cd to the clone.
   3. Install php and mysql.
   4. Access your local mysql instance from terminal or a DBMS software of choice, and run the two .sql files inside the Database.
   5. Edit the database.php file with your local mysql creds.
   6. Go to localhost:8080 from your browser of choice.

## Contributors
@ninanee
@Zikstar

## Screenshoots
   ## Index Page
   ![image](https://user-images.githubusercontent.com/71697803/130803445-1948c1cb-6afb-4f55-b024-f5f7500e54c6.png)
   
   Description: User/Admin can login in this page or register a new user.
   
   ## Lgoin Page
   ![image](https://user-images.githubusercontent.com/71697803/130803878-6be5f225-cf86-4c98-85a5-b9eea5040e6c.png)
   
   ## Register Page
   ![image](https://user-images.githubusercontent.com/71697803/130804944-0eb8e87b-2e12-4516-96d3-87c2a3da33d0.png)

   ## Retrieve password
   ![image](https://user-images.githubusercontent.com/71697803/130804037-81f052b7-c0f6-472e-b4b0-088a20260767.png)

   ## Employer Dashboard
   ![image](https://user-images.githubusercontent.com/71697803/130804276-d66bc1ba-a7e4-4f84-ae82-5a933573af18.png)
   
   The Employer side:
   1. Employers have an admin login and a mechanism to verify credentials or forgot password.
   2. They are able to post jobs.
   3. They are able to maintain current jobs and categories.
   4. They are able to maintain status of applied jobs.
   5.  They are able to see a summary of current application at a glance.
   6.  Two Employer categories are provided:
	 Prime: Employer can post up to five jobs. A monthly charge of $50 is applied.
	 Gold: Employer can post as many jobs as he/she wants. A monthly charge of $100 is applied.
   7.  The Employers have the ability to upgrade or downgrade their category. Charges are updated based on the new category.When they upgrade their category, it should update the user category status.
   8.  The Employer dashboard has a contact us section to help user with contact information/helpline.


   ## Candidate Dashboard
   ![image](https://user-images.githubusercontent.com/71697803/130804549-04b9fb65-ec31-435a-ade4-99ec0b8d5363.png)

   The Employee side:
   1. Employees are able to sign up as users.
   2. Three user categories are provided:
	 Basic: Employee can only view jobs but cannot apply. No charge.
	 Prime: Employee can view jobs as well as apply for up to five jobs. A monthly charge of $10 is applied.
	 Gold: Employee can view and apply to as many jobs as he/she wants. A monthly charge of $20 is applied.
   3. The Employees are able to choose categories.
   4. They have the ability to upgrade or downgrade their category. Charges are updated based on the new category.
   5. When the Employees upgrade their category, the user category status is updated.
   6. They have a user login and a mechanism to verify credentials or forgot password.
   7. They are able to search for jobs.
   8. They are able to search by job category.
   9. They are able to apply for jobs.
   10. They are able to maintain status of applied jobs.
   11. They are able to delete their user profile.
   12. THey are able to update user profile details.
   13. They are able to withdraw from an applied job.

   ## Admin Dashboard
   ![image](https://user-images.githubusercontent.com/71697803/130804806-396cfe6f-977f-4925-8dcb-47d2652acfcd.png)

   The Administratior side:
   1. An administrator has an admin login and a mechanism to verify credentials or forgot password.
   2. They are able to activate or deactivate a user.
   3. They are able to see all activities in the system.
