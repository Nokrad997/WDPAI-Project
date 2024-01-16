# ChatFever Readme

## Introduction

This document provides an overview of the Chat Application, a web-based chat platform utilizing Docker containers. The application consists of several containers, each serving a specific purpose to enable seamless communication between users.

## Docker Containers

#### NGINX (Web Server):</br>
Responsible for serving static files and handling HTTP requests.</br>
#### PHP:</br>
Manages dynamic content and interactions on the server-side.</br>
#### Ratchet WebSocket Server:</br>
Implements real-time communication through WebSockets, enhancing chat functionality.</br>
#### PostgreSQL (pgsql):</br>
Database container for storing user information, messages, and other relevant data.</br>
#### pgAdmin4:</br>
Provides a web-based interface for PostgreSQL administration.</br>
## Application Features

### User Authentication and Management
#### Login and Registration Views:
##### Login Process
1. Users provide their email and password for authentication.
2. Server Interaction:</br>
The system communicates with the PostgreSQL database to verify the existence of the provided email and its corresponding password.</br>
3. Authentication Decision:
If the email and password match, the server grants access, allowing the user to proceed. If there is no match or an error occurs, the server returns an error message, indicating unsuccessful authentication.</br>

#### Registration Process:
1. User Input:
Users enter their registration details, including email and password, on the registration form.
2. Client-Side Validation:
JavaScript scripts on the page ensure that the entered email follows the correct email format, and passwords meet the minimum length requirement (e.g., 8 characters) and are identical.
3. Fetch API Request:
Upon successful client-side validation, a Fetch API request is sent to the server to check whether the provided email already exists in the database.
4. Server-Side Verification:
The server verifies if the email is unique. If the email is already registered, an error message is returned.
5. Password Hashing:
Before storing the user's information in the database, the system securely hashes the password to enhance data security.
6. Registration Decision:
If the email is unique, the user is redirected to the login page, indicating successful registration.
If there are validation errors or the email is not unique, an error message is displayed to the user, and they are prompted to correct the information.

![Zrzut ekranu 2023-12-13 o 15 24 15](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/9cad8a24-9898-4dcb-89a9-4366c0c03ff4)
![Zrzut ekranu 2023-12-13 o 15 38 16](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/bafaffab-863d-4eab-b685-e77a3855d903)

#### Main Menu View:
Options include Account, Friends, and Logout.</br>

![Zrzut ekranu 2023-12-13 o 15 24 33](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/616ef1bf-d8ad-4baa-8e48-ba6585edd276)

#### Account View:
The Account View provides users with the ability to modify various account details, including nickname, email, and password. Additionally, users can change their profile picture. The following describes the mechanisms and processes involved in these modifications:

#### Changing Nickname and Email:
1. User Interaction:
Users initiate changes by clicking on the respective account detail (nickname or email).
A JavaScript prompt is displayed, prompting users to enter the new nickname or email.
2. Verification Process:
JavaScript scripts ensure the correctness of the entered data, including the proper email format.
The entered data is verified on the client side before further processing.
3. Server Interaction:
A Fetch API request is sent to the server to verify the entered data against the database.
The server checks the validity of the data (e.g., email format) and ensures that the data is not already in use.
4. Confirmation and Save:
Upon successful verification, a "Save changes" button becomes active.
Clicking the button triggers a JavaScript script that sends a request to save the changes to the database.
#### Changing Password:
1. User Interaction:
Users click on the "Change Password" option, triggering a modal that prompts them to enter a new password and confirm it.
2. Password Verification:
JavaScript scripts ensure that the new password meets security criteria (e.g., minimum length) and matches the confirmation.
3. Server Interaction:
A Fetch API request is sent to the server for verification of the new password.
4. Password Hashing and Save:
The server securely hashes the new password before storing it in the database.
Clicking the "Save changes" button updates the password in the database.
#### Changing Profile Picture:
1. User Interaction:
Users click on the default profile picture, enabling them to upload a new image file.
2. Image Upload:
Selected images are uploaded to the server.
The server stores the images locally, and only the file path is saved in the database.
3. Save Changes:
After selecting a new profile picture, the "Save changes" button becomes active.
Clicking the button triggers a JavaScript script that sends a request to update the profile picture path in the database.

#### Delete Account:
1. User Interaction:
Users click on the "Delete Account" option.
A JavaScript prompt is displayed, asking users to confirm whether they want to delete their account.
2. Confirmation:
If users confirm deletion, they are redirected to the login view.
A Fetch API request is sent to the server to delete the user's data from the database.
#### Manage Friends:
1. User Interaction:
Users click on the "Manage Friends" option.
This action redirects users to the Friends Management View.

![Zrzut ekranu 2023-12-13 o 15 24 40](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/15c9cb04-d5cb-4186-9bd6-68de347cea2f)

#### Friends Management

The Friends Management View is divided into two panels, each serving distinct:

#### Search and Add Friends Panel:
1. User Interaction:
Users enter a username in the provided input field.
Clicking the "Search" button triggers a JavaScript script, which sends a Fetch API request to retrieve users with similar names from the database.
2. Result Display:
Fetched user data populates a select dropdown, allowing users to choose the desired friend.
3. Adding Friends:
Users select a friend from the dropdown and click the "Add Friend" button.
A Fetch API request is sent to the server to add a new entry in the database with a "pending" status, indicating a friend request.
#### Manage Existing Friends Panel:
1. Friends List:
Displays a list of current friends with each entry accompanied by a button to remove that friend.
2. Removing Friends:
Clicking the "Remove" button triggers a Fetch API request to remove the friendship entry from the database.
3. Friend Requests Tab:
Displays a tab with pending friend requests.
Each entry is accompanied by "Accept" and "Reject" buttons.
4. Accepting/Rejecting Friend Requests:
Clicking the "Accept" or "Reject" button triggers a Fetch API request to update the status of the friend request in the database.
If accepted, the friend's name is added to the Friends List.

![Zrzut ekranu 2023-12-13 o 15 41 40](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/855d35bc-2911-4bc9-8b97-4a2f0caf79ae)

#### Friends View

The Friends View provides users with a panel displaying data retrieved from the database, representing the friends of the current user. The data is presented in the format of profile picture | email of the user. Additionally, users can click on a specific friend to be redirected to the Chat View with that particular user.

#### Friends Panel:
1. Display Format:
The panel presents a list of friends, each entry showing the friend's profile picture and email.
Interactive Elements:
Users can click on a friend's entry to initiate a conversation with that friend in the Chat View.

![Zrzut ekranu 2023-12-13 o 15 28 17](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/8b24317a-e15f-4d1c-9ea9-448e7b5a07d8)

### Chat Functionality
The Chat View is comprised of a message panel, a button to navigate back to the Friends View, and a text input field for sending messages. The functionality and interactions within the Chat View are as follows:

#### Message panel:
1. Data Loading:
Upon redirection to the Chat View, a connection to the WebSocket server is established.
User information is sent to the WebSocket server, which associates the user's connection ID with their user ID in an associative array.
2. Display Format:
Messages are displayed in a panel, with sender messages on the right and receiver messages on the left.
Messages are retrieved from the database and displayed in the appropriate format.
#### Back Button:
1. User Interaction:
Clicking the back button redirects users to the Friends View.
#### Message Input Field:
1. Text Input:
Users can type text messages in the input field.
A JavaScript script waits for the "Enter" keypress event to send the message.
2. Sending Messages:
If the input field is not empty, the script reads the message, user ID, and friend's ID.
The script displays the message on the sender's side and uses the WebSocket connection to send the message, user ID, and friend's ID to the server.
3. Handling Offline Friends:
If the friend is not currently connected (no entry in the WebSocket connections array), the message is stored in the database using Fetch API.
4. Receiving Messages:
The WebSocket server forwards the message to the friend's WebSocket connection.
The JavaScript script on the friend's side receives the message, parses it as JSON, and displays it appropriately on the friend's page.

![Zrzut ekranu 2023-12-13 o 15 29 20](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/2b8d5ac7-8c7d-48d6-8d6d-c84729ea1a71)
![Zrzut ekranu 2023-12-13 o 15 29 11](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/15f4997d-e57d-403d-8040-71693af31f04)

### ERD diagram
![image](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/3405278a-051c-4cce-94d1-6e23dae49869)


### Getting Started

1. Clone the repository: git clone https://github.com/Nokrad997/WDPAI-Project.git
2. Navigate to the project directory: cd <project-directory>
3. Run Docker Compose: docker-compose up
4. Access the application through your web browser.
### Dependencies

1. Docker
2. Docker Compose
