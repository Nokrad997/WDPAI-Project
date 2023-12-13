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
#### Main Menu View:
Options include Account, Friends, and Logout.
#### Account View:
Allows users to change their profile picture, nickname, email, and password.</br>
Provides functionality to manage friends or delete the account. </br>
### Friends Management
####Friend Search View:
Users can search for registered friends and send friend requests.
#### Friend Requests Panel:
Displays friend requests awaiting acceptance or rejection.
###Friends View:
Lists accepted friends. </br>
Clicking on a friend redirects to the chat view.
### Chat Functionality
#### Chat View:
Users can exchange text messages in real-time. WebSocket server handles communication between users. Message history is stored in the PostgreSQL database.
#### Offline Messaging:
Messages to offline users are saved in the database and retrieved upon reconnection.
### Getting Started

1. Clone the repository: git clone <repository-url>
2. Navigate to the project directory: cd <project-directory>
3. Run Docker Compose: docker-compose up
4. Access the application through your web browser.
### Dependencies

1. Docker
2. Docker Compose
