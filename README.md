# Blood-Bank
A blood donation bank for Hospitals and the Blood Receivers.

1) Assume you are designing a real-life system, that will be used by real users.
2) The application should contain 2 types of users: Hospitals and Receivers
3) Pages to be developed-
•	‘Registration’ pages - Different registration pages for hospitals & receivers. Capture receiver’s blood group during registration.
•	‘Login’ pages - Single/different login pages for hospitals & receivers.Hospital ‘Add blood info’ page - A hospital, once logged in, should be able to add details of available blood samples (along with type) to their bank. Access to this page should be restricted only to hospitals. 
•	‘Available blood samples’ page - There should be a page that displays all the available blood samples along with which hospital has them and a ‘Request Sample’ button. This page should be accessible to everyone, irrespective of whether the user is logged in or not. Expected functionality on click of the 'Request Sample' button-  
o	Only receivers should be able to request for blood samples by clicking the ‘Request Sample’ button. Make sure that only those receivers who are eligible for the blood sample are allowed to click the button.
o	If the user is not logged in, then he/she should be redirected to the login page.
o	If a user is logged in as a hospital, then the user should not be allowed to request for a blood sample.
•	Hospital ‘View requests’ page - Hospitals should be able to see the list of all the receivers who have requested for particular blood group from its blood bank.
