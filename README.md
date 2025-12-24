# Unity Care CLI 

A command-line interface application for managing healthcare data in Unity Care system.

## Description

Unity Care CLI is a PHP-based application designed to manage various aspects of healthcare operations including departments, doctors, patients, and users. It provides a streamlined interface for administrative tasks in a healthcare environment.

## Features

- **Department Management**: Create, read, update, and delete department information
- **Doctor Management**: Manage doctor profiles and assignments
- **Patient Management**: Handle patient records and information
- **User Management**: Administer system users and permissions
- **Navigation System**: Intuitive menu-driven interface for easy navigation

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or PHP CLI environment
- Laragon (recommended for local development)

## Installation

1. Clone or download the project to your web server directory:
   ```
   git clone <repository-url>
   cd Unity_Care_CLI
   ```

2. Configure the database connection in `config/config_db.php`

3. Import the database schema:
   - Open your MySQL client
   - Run the SQL script in `config/schema.sql`

4. Ensure PHP has access to the project directory

## Database Setup

1. Create a new MySQL database for the application
2. Update the database credentials in `config/config_db.php`
3. Execute the schema file to create necessary tables:
   ```sql
   SOURCE config/schema.sql;
   ```

## Usage

Access the application through your web browser or run via PHP CLI:



### CLI Usage
Run the application from command line:
```bash
php index.php
```

Use the navigation menus to access different management sections:
- Department management
- Doctor management
- Patient management
- User management

## Project Structure

```
Unity_Care_CLI/
├── index.php                 # Main entry point
├── README.md                 # Project documentation
├── assets/                   # Static assets
├── config/
│   ├── config_db.php         # Database configuration
│   └── schema.sql            # Database schema
├── management/
│   ├── departements.php      # Department management
│   ├── doctor.php            # Doctor management
│   ├── patient.php           # Patient management
│   └── user.php              # User management
└── navigation/
    ├── departementsMenu.php  # Department menu
    ├── doctorsMenu.php       # Doctors menu
    ├── menu.php              # Main menu
    ├── patientMenu.php       # Patient menu

```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request


