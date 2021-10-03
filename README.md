# SSL-Project

Social media

# HIGHLIGHT

Clone your folder inside htdocs folder and then inside backend folder create new folder 'images' and inside images create another new folde 'posts'.
starting file src/index.php

# Database

For now we need to create Database manully...
Create Database name chat and some tables as described below:
users: id(int), unique_id(int), fname(varchar (250)), lname(varchar (250)), email(varchar (250)),password(varchar (250)), image(varchar (1000)), status(varchar(250));

posts: post_id(int), user_id(int 255), image(varchar 255), likes(int), comment(varchar 500);

messages: msg_id(int), incoming_msg_id(int 255), outgoing_msg_id(int 255), message(varchar 1000);

# Authentication Page

We will use authentication page for Signin/Signout type of things. Basically it is a login page. (Will contain userName(userId),Name, email, password) {It's a basic demand, if anyone
have another idea please append it in query}.

# Profile page

Profile page will show info about user

# Chat Page

We'll use this page to render messages (If possible we'll try to render it like any social media, if not will use any simple way to design it).

# Edit Account

Edit Account enable us to change userInfo.{Here we'll also ask user to upload his/her pic && currently we'll not ask to change userName}

# Media page

We'll work on media page bit later, if we would be able to make efficient backend for this.

# BACKEND

Created new src folder which includes enviorment setup and backend enabled for our works. Basically it's our new enviorment where we'll work now onwards.

# Task Completed

- Login/Signup with manual inputs completed
- Real time chat with front-end and backend completed
- Backend for post completed
- Global styles created which we can use if we need it

# Remaining Tasks

- Front-end for posts
- Needs to improve profile page for front-end
- Friends list
- Logout Feature
