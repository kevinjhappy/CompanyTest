# Company Test

This project is a test project to calculate Tax on Company passing by phpUnit test case 

## Getting Started

These instructions below will get you a copy of the project up and running on your local machine for development and testing purposes.


### Prerequisites

To start this project, you will need Git and Docker installed on your machine

```
Git : https://git-scm.com/book/fr/v1/D%C3%A9marrage-rapide-Installation-de-Git
(installation example on ubuntu)
Sudo apt-get install git 

```

```
Docker : https://docs.docker.com/install/linux/docker-ce/ubuntu/
(installation example on ubuntu)
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo apt-key fingerprint 0EBFCD88
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
sudo apt-get update
sudo apt-get install docker-ce
```

### Installing

First copy the project into your working directory

```
git clone https://github.com/kevinjhappy/CompanyTest.git
```

Then with your terminal go to your working directory, enter the project directory and enter this command

```
docker-compose up
```

You can now access the database at this url

```
http://localhost:8081
```

## Running the tests

You can run the tests in two ways :
Locally by running ``` ./bin/phpunit ```
Or by the container php-fpm build with the docker-compose command
``` sudo docker-compose exec php-fpm ./bin/phpunit ```

### Break down into end to end tests

Those tests are running a set of data that will create a Company Object and ask the annual tax the company will need to pay.
In this tests series we have an example with a SAS Company Type and a FREELANCER Company Type

## Built With

* [Symfony](https://symfony.com/doc/current/index.html) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management


## Authors

* **Kevin Nadin** - *Initial work* - [kevinjhappy](https://github.com/kevinjhappy)

## License

This project is open-source
