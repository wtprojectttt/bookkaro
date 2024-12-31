# BookKaro Tour and Travel

A responsive web-based travel booking platform that allows users to book flights, trains, and buses.

## Features

- **Multi-service Booking**
  - Flight booking
  - Train booking
  - Bus booking

- **User Management**
  - User registration
  - Login system
  - Session management

- **Travel Services**
  - Search available flights
  - View trip offers
  - Compare rates
  - Multiple fare types (Regular, Armed Forces, Student, Senior Citizen, etc.)
  - Round trip and one-way booking options

- **Customer Support**
  - Contact form
  - Business hours information
  - Office location details
  - Social media integration

## Tech Stack

- **Frontend**
  - HTML5
  - CSS3
  - JavaScript/jQuery
  - Bootstrap 5
  - Font Awesome Icons
  - IonIcons

- **Backend**
  - PHP
  - MySQL Database

## Installation & Setup

1. Clone the repository
2. Set up a local web server (e.g., XAMPP, WAMP)
3. Import the database schema
4. Configure database connection in PHP files:
   - Update credentials in `login.php`
   - Update credentials in `regis.php`
   - Update credentials in `contact.php`
   - Update credentials in `fbooking.php`

## Database Configuration

```php
$servername = "localhost";
$username = "root";
$password = "system";
$dbname = "bookkaro";
```

## Project Structure

- `index.html` - Main landing page
- `login.html` - User login page 
- `regis.html` - User registration page
- `contact.html` - Contact form
- `fbooking.html` - Flight booking
- `tbooking.html` - Train booking  
- `bbooking.html` - Bus booking
- `search.html` - Search functionality
- `pass.html` - Ticket display

### CSS Files
- `main.css` - Main stylesheet
- `login.css` - Login page styles
- `regis.css` - Registration page styles
- `contact.css` - Contact page styles
- `fbooking.css` - Flight booking styles
- `tbooking.css` - Train booking styles
- `bbooking.css` - Bus booking styles
- `search.css` - Search page styles
- `pass.css` - Ticket display styles

### JavaScript
- `main.js` - Core functionality
- `search.js` - Search functionality

### PHP Files
- `login.php` - Login processing
- `regis.php` - Registration processing
- `contact.php` - Contact form processing
- `fbooking.php` - Flight booking processing

### Config Files
- `.vscode/settings.json` - VS Code settings

## Contributors

- Vinayak Patnaik 
- Selva Perumal 