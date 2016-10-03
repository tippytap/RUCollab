# RUCollab
Student group project collaboration... project
Team Name - Wildcats 2.0

Members
Ryan Richardson
Corey Caldwell
Erik Miller - Liaison

Web Pages:
Log-in / Register - Presents a user with a form to sign in or register if they have not created an account already.
User Dashboard - Shows a list of groups the user belongs to. Clicking on a group brings the user to the group page. User can create groups from this page.
Create Group - Input fields for group name, success brings the user to the group dashboard
Group Dashboard - Contains a message board, to-do list, and deadline tracker widgets.
To do list - The user can enter task items, assign other users to them, and select a due date from here. A message indicating success or failure will be provided upon completion, and the user can go back to the group dashboard.
Banner - Contains a link to the user dashboard, a sign out link, and the create group button. The menu will be slightly different depending on the user’s state (i.e. signed in vs signed out).

List of input fields:
Email - the email can’t already exist, needs to be in email format
Password - needs a minimum of 8 characters and a max of 20
First name- no numbers and no symbols
Last name- no numbers and no symbols
Phone number - has to be 10 digits
Text area for the messages - no restrictions other than no html
Text area for creating a task - no restrictions other than no html
Check box for adding members to a task
Banner buttons - home/login/create group that take you to that specific page
A submit button for login/register, invite member, create task, send message
Drop down menu?

Database Schema:
Users - userId, user email, pw, fname, lname, phone
Membership - groupid, userid
Groups - groupId, groupPageUrl, formedDate, project leader
Messages - msgId, member, groupId, timestamp, msgString
Tasks - taskid, userid, groupid, timestamp, task string, due date
Assignments - assigned user, task id
