# horse-race-api

This is the REST API for the horse racing database. We have used an OOP approach for setting up our endpoints. The API is hosted on the UBC undergraduate servers and connects to an Oracle database. You must use your CWL credential in each endpoint.

# Set up

1. Open a connection to the UBC undergraduate server. `ssh <CWL>@remote.students.cs.ubc.ca`
2. Create a directory call public_html. `mkdir ~/public_html`
3. Copy contents of this repo into public_html. (Use Cyberduck)
4. Edit the file ~/public_html/horse-race-api/config/database.php so that the `$password` variable at the top is the correct PW.
5. Run the command `chmod -R 755 ~/public_html/horse-race-api`. (Must do this every time files are modified)
6. Open Postman and test endpoints.

# Completed endpoints

## Login user (for employee or customer)
(GET) https://www.students.cs.ubc.ca/~ &lt;CWL&gt; /horse-race-api/user/login.php?username=' &lt;USERNAME&gt; '&password=' &lt;PASSWORD&gt; '

## Sign up user (for customer)
(POST) https://www.students.cs.ubc.ca/~ &lt;CWL&gt; /horse-race-api/customer/signup.php

- Must supply body in request. E.g., 
{
    "username": "barack",
    "password": "potus44",
    "accountID": "13",
    "name": "Barack Obama",
    "address": "1600 Pennsylvania Avenue, Washington DC, USA",
    "memberID": "6",
    "fee": 150000,
    "type": "Tier 4"
}

## Fetch customers
(GET) https://www.students.cs.ubc.ca/~ &lt;CWL&gt; /horse-race-api/customer/read.php
