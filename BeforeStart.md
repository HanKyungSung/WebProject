# Before Start
* SSH key should be added to your Github account. If you haven't done it, or not sure, follow the instruction [here](https://help.github.com/en/articles/adding-a-new-ssh-key-to-your-github-account).
* Install text editor.
	> You can download any text editor you prefer.   
	> For myself, I am using Visual Studio Code, you can download it [here](https://code.visualstudio.com/).
* Install Git.  
   * Go to [Git](https://git-scm.com/download/win) and download the setup.   
   * Follow the instruction on setup, and modify the options as you need.
* Create a folder where you want to clone a repository, and clone the project. 
```
mkdir project
cd project
mkdir project1
cd project1
git clone git@github.com:HanKyungSung/WebProject.git
```
> The reason we clone our repository inside project1 not in project is because we don't want to git track the Homestead directory.
* The example of directory tree will be as below   
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
3. Now, go to the folder you created for the project (project folder in above example). Using git bash. Example below.   
	
    `cd desktop/project`
  
4. Now, its time to setup for the backend. You can find detail instruction [here](https://laravel.com/docs/5.8/homestead).
	> We are going to use Laravel 5.8, Homestead v8.4.0.   
   
   4.1 Use git bash, and add the `laravel/homestead` box to your Vagrant installation.    
   
   `vagrant box add laravel/homestead`  
   
   4.2 Once you entered the command, it will ask to choose provider. Choose `virtualbox`.
   
   4.3 Once box is successfully added, you can check the box and version with following command.  
   
   `vagrant box list`
   
   You should be able to see `laravel/homestead (virtualbox, 7.2.1)`.   
   > vagrant box list command will show the list of the box you have added.   
   
   4.4 Now, we are going to install Homestead by cloning the repository onto your host machine.  
   
   `git clone https://github.com/laravel/homestead.git Homestead`   
   
   This will create Homestead folder. Now, go to Homestead folder. 
   
   4.5 Once you change the directory to Homestead, you should check out a desire version. Since we are going to use `Homestead v8.4.0`, we checkout `v8.4.0`.   
   
   `git checkout v8.4.0`  
   
   4.6 After check out desired version, create `Homestead.yaml` file by follow command.   
   
   `bash init.sh`
   
   4.7 Now you can open `Homestead.yaml` file with either text editor or `vim`, and copy the code from Google drive file `Homestead.txt` and paste into your `Homestead.yaml`, and save it. 
   
   4.8 After save and close the `Homestead.yaml` file, use git bash (inside Homestead directory) type following command.    
   
   `vagrant up`
   
   > This command will bring up virtual machine name webProject_laravel and it takes time.
   
   4.9 Once virtual machine is up, `vagrant ssh` to access virtual machine. After get into virtual machine, command `ls` and you will see `backend` directory. Use `cd` to go to `backend` directory.
   
   5.0 in `backend` directory, use `cp .env.example .env` then use `composer install` to create vender folder.   
   
   5.1 Once step 5.0 finished, use command `php artisan key:generate` to generate app key. 

   > Once virtual machine is up, nginx is running and Laravel is already serve. To test this, go to browser and type 192.168.10.10

## Connect to Database
> Homestead already setup the database in mysql and postgres already.
> Name of the database is `homestead` and password is `secret`

1. Go to backend folder and `vagrant up` then `vagrant ssh`.
2. To connect database use command `mysql -u homestead -p` and enter the password.   
3. Once get into mysql, go to homestead database use `use homestead`. 
4. You are good to go!.
   
## IMPORTANT!
> Order to user `Laravel Dusk`, use follow commands to install chrome. 
> https://www.ubuntuupdates.org/ppa/google_chrome
```
wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | sudo apt-key add -
sudo sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list'
sudo apt-get update && sudo apt-get install -y google-chrome-stable
sudo apt-get install -y xvfb
```
