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
Users can log in or register for a new account.</br>
![Zrzut ekranu 2023-12-13 o 15 24 15](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/9cad8a24-9898-4dcb-89a9-4366c0c03ff4)
![Zrzut ekranu 2023-12-13 o 15 38 16](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/bafaffab-863d-4eab-b685-e77a3855d903)

#### Main Menu View:
Options include Account, Friends, and Logout.</br>
![Zrzut ekranu 2023-12-13 o 15 24 33](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/616ef1bf-d8ad-4baa-8e48-ba6585edd276)

#### Account View:
Allows users to change their profile picture, nickname, email, and password.</br>
Provides functionality to manage friends or delete the account. </br>
![Zrzut ekranu 2023-12-13 o 15 24 40](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/15c9cb04-d5cb-4186-9bd6-68de347cea2f)

### Friends Management
#### Friend Search View:
Users can search for other registered users and send them friend requests.
#### Friend Requests Panel:
Displays friend requests awaiting acceptance or rejection.
![Zrzut ekranu 2023-12-13 o 15 41 40](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/855d35bc-2911-4bc9-8b97-4a2f0caf79ae)

### Friends View:
Lists accepted friends. </br>
Clicking on a friend redirects to the chat view.</br>

![Zrzut ekranu 2023-12-13 o 15 28 17](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/8b24317a-e15f-4d1c-9ea9-448e7b5a07d8)

### Chat Functionality
#### Chat View:
Users can exchange text messages in real-time. WebSocket server handles communication between users. Message history is stored in the PostgreSQL database.
![Zrzut ekranu 2023-12-13 o 15 29 20](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/2b8d5ac7-8c7d-48d6-8d6d-c84729ea1a71)
![Zrzut ekranu 2023-12-13 o 15 29 11](https://github.com/Nokrad997/WDPAI-Project/assets/115646961/15f4997d-e57d-403d-8040-71693af31f04)

#### Offline Messaging:
Messages to offline users are saved in the database and retrieved upon reconnection.
### Getting Started

1. Clone the repository: git clone https://github.com/Nokrad997/WDPAI-Project.git
2. Navigate to the project directory: cd <project-directory>
3. Run Docker Compose: docker-compose up
4. Access the application through your web browser.
### Dependencies

1. Docker
2. Docker Compose
