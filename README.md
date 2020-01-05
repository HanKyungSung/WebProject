![Web_Status](https://img.shields.io/badge/Web_Status-online-success)
![Last_Update](https://img.shields.io/badge/Last_Update-Dec_12-important)
# Introduction
Konada is the web project for korean, canadian community. At the moment, focucing on Univeristy students.

# Purpose of the project
Learning about full-stack on web developement using **React** and **laravel** frameworks.

# Getting Started
The following instructions will get you a copy of the project up and running on virtualbox for development and testing purposes.

# Prerequisites
The development environment is based on Windows OS. It would be okay with any other OS that can run a VirtualBox.

# Tech Stack
[![Laravel](https://img.shields.io/badge/Laravel-5.8-green)](https://laravel.com/docs/5.8)
[![Homestead](https://img.shields.io/badge/Homestead-v8.4.0-green)](https://laravel.com/docs/5.8/homestead)
[![VirtualBox](https://img.shields.io/badge/VirtualBox-6.1-green)](https://www.virtualbox.org/)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-10.10-green)](https://www.postgresql.org)
[![React](https://img.shields.io/badge/React-16.8.6-green)](https://reactjs.org/)
* [Laravel](https://laravel.com/docs/5.8) - Using Laravel version 5.8.
* [Homestead](https://laravel.com/docs/5.8/homestead) - Laravel development environment running in virtualbox.
* [VirtualBox](https://www.virtualbox.org/) - For development environment.
* [PostgreSQL](https://www.postgresql.org) - Database.
* [React](https://reactjs.org/) - Frontend (next iteration).

# Installation
## Before start
- SSH key should be added to your Github account. If you haven't done it, or not sure, follow the instruction [here](https://help.github.com/en/github/authenticating-to-github/adding-a-new-ssh-key-to-your-github-account)
- Install Git
  - Go to [GIT](https://git-scm.com/download/win) and download the setup.
  - Follow the instruction on setup, and modify the options as you need.
- Create a folder where you want to a repository, and clone the project.
```
mkdir project
cd project
mkdir project1
cd project1
git clone git@github.com:HanKyungSung/WebProject.git
```
>The reason we clone our repository inside project1 not in project is because we don't want to git track the Homestead directory.

>The example of directory tree will be as below.
```
proejct
├── project1
│   └── WebProject
│       ├── backend
|	├── frontend
|       └── README.md
└── Homestead
```

## Frontend
1. We need to install npm. npm will install with Node.js. So, we install Node.js.   
    1.1 Go to [Node.js](https://nodejs.org/en/) and download Node.js installation file.
    > We are going to use 10.15.3 LTS for this project.
2. In frontend directory, make `.env` file and open it with either `vim` or text editor, and copy the content from google drive `env.txt` and paste into `.env` file you just created.
3. In frontend directory, run `npm install`.
4. To start the frontend, go to frontend folder using either `cmd` or `git bash` and type following command.  
   `npm start`
   > you can run this command using git bash, cmd, and terminal in OS X.

## Backend
1. Install [VirtualBox](https://www.virtualbox.org/wiki/Downloads).
2. Install [Vagrant](https://www.vagrantup.com/downloads.html).
3. Now, go to the folder you created for the project (project folder tree in above example). Using git bash. Example below.  
   
   `cd desktop/project`  
4. Now, its time to setup for the backend. You can find detail instruction [here](https://laravel.com/docs/5.8/homestead).
   > We are using Laravel 5.8 and Homestead v8.4.0.  
   
    4.1 Use git bash, and add the `laravel/homestead` box to your **Vagrant** installation.  

    `vagrant box add laravel/homestead`  

    4.2 Once you entered the command, it will ask to choose provider. Choose `virtualbox`.  

    4.3 Once box is successfully added, you can check the box and version with following command.  

    `vagrant box list`  
    You should be able to see `laravel/homestead (virtualbox, 7.2.1)`.  
    > `vagrant box list` command will show the list of the box you have added.   
    
    4.4 Now, we are going to install Homestead by cloning the repository onto your host machine.  

    `git clone https://github.com/laravel/homestead.git Homestead`  
    > This will create Homestead folder. Now, go to Homestead folder.  

    4.5 Once you change the directory to Homestead, you should check out a desire version. Since we are going to use `Homestead v8.4.0`, we checkout `v8.4.0`.  

    `git checkout v8.4.0`

    4.6 After checkout desired version, create `Homestead.yaml` file by following command.  

    `bash init.sh`  
    
    4.7 Now you can open `Homestead.yaml` file, and copy the code from **Google drive** file `Homestead.txt` and paste into your `Homestead.yaml`, and save it.  

    4.8 After save and close the `Homestead.yaml` file, use git bash (inside Homestead directory) type following command.  

    `vagrant up`  
    > This command will bring up virtual machine name **webProject_laravel** and it takes time.  

    4.9 Once virtual machine is up, `vagrant ssh` to access virtual machine. After get into virtual machine, command `ls` and you will see **backend** shared directory with host machine. Use `cd` to go to **backend** directory.

5. In **backend** directory, use `cp .env.example .env` then use `composer install` to create **vendor folder**.  
   
    5.1 Once step **5** is finished, use command `php artisan key:generate` to generate the application key.
    > Once virtual machine is up, nginx running and Laravel is already serve. To test this, go to the browser and enter 192.168.10.10 (this ip can be modify in **Homestead.yaml**, but you have to provision the virtual machine).

## Connect to Database
> Homestead already contains **MySQL** and **PostgreSQL**. Name the database is **homestead** and password is **secret** as default of **Laravel**

> Database name and password can be change in **Homestead.yaml** and need to change in **.env** file in **backend** directory.

### MySQL
1. Connect to virtual machine using `vagrant up` then `vagrant ssh`.
2. To connect database use command `mysql -u homestead -p` and enter the password.
3. Once get into mysql, go to homestead database use command `use homestead` to use **homestead** database.

### PostgreSQL
1. Connect to virtual machine using `vagrant up` then `vagrant ssh`.
2. To connect database use command `sudo -u postgres psql`.
3. Once get into postgres, go to homestead database use command `\c homestead` to use **homestead** database.

### If consider to use **Laravel Dusk**
> Order to use `Laravel Dusk`, use following commands to install chrome.  
> https://www.ubuntuupdates.org/ppa/google_chrome  
> Need to install **Web Chrome Driver** to make **Laravel Dusk** work.

```
wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | sudo apt-key add -
sudo sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list'
sudo apt-get update && sudo apt-get install -y google-chrome-stable
sudo apt-get install -y xvfb
```

# Team Konada
   - [Han Kyung Sung](https://github.com/HanKyungSung)
   - [Won Koo Jung](https://github.com/wkjung19)
   - [SangMin Lee](https://github.com/paldalgom)
   - [Harrison Kim](https://github.com/hsookim90)
