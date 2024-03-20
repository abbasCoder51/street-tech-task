# Project Name

A small program that loads a .csv file and returns a list of names in an array 
format. The .csv file is located in the files folder, can add files in this directory and can be called from the index.php file.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them:

- [PHP](https://www.php.net/) (Version 8.1.0 or higher)

### Installation

A step-by-step guide on how to install the project:

1. Clone the repository:

    ```bash
    git clone https://github.com/abbasCoder51/street-tech-task.git
    ```

2. Navigate to the project directory:

    ```bash
    cd project-directory
    ```

### Running the Script

Run the PHP script to execute program:

```bash
php index.php
```

### Running the Docker container

## Docker Setup

Run to build the docker container and set the tag 'laravel-docker'
> docker build -t street-tech-task .

Run to run the docker container on port 8081, mount current directory to 
the directory in the docker container
> docker run -d -p 8081:80 -v .:/var/www/html street-tech-task
