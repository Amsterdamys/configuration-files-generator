## Getting started

### Install

##### 1. Clone the repo

`git clone https://github.com/weblab-technology/configuration-files-generator.git`

##### 2. install [composer](https://getcomposer.org/)

`curl -sS https://getcomposer.org/installer | php`

`php composer.phar install`

##### 3. private config

Clone private.yml.dist to private.yml, now there is an example section here. You may fill this file with all your projects. Don't forget to add templates for them.

```yml
- template: example
  format: php
  destination: "../path-to-php-project/example.php"
```
##### 4. parameters

Clone parameters.yml.dist to parameters.yml, now there are some tests parameters. This file is not required, It's used for generating command with these parameters. You may compose such command manually.

```yml
DB__TEST__HOST: "localhost"
DB__TEST__NAME: "test"
DB__TEST__USERNAME: "root"
DB__TEST__PASSWORD: "password"
```

### Usage

##### 1. Get command

Run command **php commands/generateCommand.php** (command with test parameters will be generated)

Output will look like this:

for windows

```
php run.php --DB__TEST__HOST="localhost"  --DB__TEST__NAME="test"  --DB__TEST__USERNAME="root"  --DB__TEST__PASSWORD="password"
```

for linux

```
php run.php --DB__TEST__HOST="localhost" \
--DB__TEST__NAME="test" \
--DB__TEST__USERNAME="root" \
--DB__TEST__PASSWORD="password"
```

##### 2. Run generation

Copy output command and execute it in your command line.

Generated configuration files will be moved to the paths specified in the private.yml


## License

Weblab technology configuration project is licensed under the MIT license.

Eugene Suvorov zarkovsky@yandex.ru

Oleksandr Knyga oleksandrknyga@gmail.com
