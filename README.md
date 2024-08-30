# 🏗️ Construction Project Management Application Backend API

Welcome to the **Construction Project Management Application**! This API provides a robust solution for managing construction projects with essential features such as creating, editing, deleting, and viewing project details. The application also allows users to view a list of all created construction projects.

## 🚀 Introduction

The Construction Project Management API is designed to help users efficiently manage construction projects. It provides a simple yet powerful interface for handling the core operations related to construction project management.

## 📜 Description

The API supports the following functionalities:

- **Create Construction Project**: Easily create a new construction project by providing all required details.
- **Edit Construction Project**: Update existing construction project details whenever needed.
- **Delete Construction Project**: Remove a construction project from the system if it's no longer needed.
- **View Construction Project**: Retrieve and view detailed information about a specific construction project.
- **List Construction Projects**: View a list of all construction projects created within the application.

> **Note:** All the fields in the Construction Project entity are required and must be validated.

## 🎯 Must-Have Functionalities

- **Create/Edit Construction Project**: 
  - Capture essential details required for each construction project.
  - Ensure data integrity and validation for all fields.

- **Show List of Construction Projects**:
  - Display a comprehensive list of all created projects with relevant details.

## 🔧 Optional Functionalities

While the core functionalities focus on project management, there is room for expansion with additional features to enhance the application. However, these are not required for the initial implementation.

## 💻 Technologies Used

- **Framework**: Symfony (PHP)
- **Database**: PostgreSQL
- **ORM**: Doctrine
- **Testing**: PHPUnit

## 📁 Project Structure

- **Controller**: Handle incoming requests and return responses.
- **Services**: Contain the business logic for handling operations.
- **Repositories**: Interact with the database to perform CRUD operations.
- **Entity**: Define the structure of data used in the application.
- **Utils**: Utility classes such as `Tools` for generate random number.
- **tests**: Test case for the application.

## 🚀 Getting Started

### Prerequisites
- PHP 8.1+ should installed
- Symfony cli installed
- PostgreSQL should installed

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/manggiperdana/construction-project-management
   ```
2. Get into the project folder and Install it using composer:
   ```bash
   cd construction-project-management && composer install
   ```
3. Verify and mtch up the .env config for connect postgresql database:
   ```bash
   DATABASE_URL="postgresql://postgres:!changeme!@127.0.0.1:5432/project?serverVersion=16&charset=utf8"
   ```
4. If all good for connected database then run migration script:
   ```bash
   php bin/console doctrine:database:create //for creating database
   php bin/console doctrine:migrations:migrate //for generate the tables
   ```
5. Run the server:
   ```bash
   symfony server:start
   ```
6. Access the endpoint url:
   ```bash
   http://localhost:8000
   ```

### Endpoint List with example

1. Gel All Project:
   ```bash
   Method : GET
   Endpoint : http://localhost:8000/constructions 
   ```
2. Gel All Project with filter:
   ```bash
   Method : GET
   Endpoint : http://localhost:8000/constructions?projectId=098765
   ```
3. Show Project By Id:
   ```bash
   Method : GET
   Endpoint : http://localhost:8000/constructions/1
   ```
4. Create Project:
   ```bash
   Method : POST
   Endpoint : http://localhost:8000/constructions
   Body :
   {
        "name":"Project 1",
        "location":"Some location",
        "stage":"Stage",
        "category":"Category",
        "otherCategory":"Other Category",
        "startDate":"2024-09-01",
        "description":"Description",
        "creatorId":2
   }
   ```
5. Update Project:
   ```bash
   Method : PUT
   Endpoint : http://localhost:8000/constructions/1
   Body :
   {
        "name":"update Project 1",
        "location":"Some location",
        "stage":"Stage",
        "category":"Category",
        "otherCategory":"Other Category",
        "startDate":"2024-09-01",
        "description":"Description",
        "creatorId":2
   }
   ```
6. Delete project:
   ```bash
   Method : DELETE
   Endpoint : http://localhost:8000/constructions/1
   ```
### Run test case
Run test case command:
   ```bash
   php bin/phpunit
   ```