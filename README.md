## Getting started

### Install

##### 1. composer

`composer install`

##### 2. private config

Clone private.yml.dist to private.yml (set your path in example section)

```
- template: example
  format: php
  destination: "../path-to-php-project/example.php"
```
##### 3. parameters

Clone parameters.yml.dist to parameters.yml (there are some tests parameters)

```
DB__TEST__HOST: "localhost"
DB__TEST__NAME: "test"
DB__TEST__USERNAME: "root"
DB__TEST__PASSWORD: "password"
```

### Usage

##### 1. Get command

Run command **php commands/generateCommand.php** (command with test parameters will be generated)

Output will look like this:

```
php run.php --DB__TEST__HOST="localhost"  --DB__TEST__NAME="test"  --DB__TEST__USERNAME="root"  --DB__TEST__PASSWORD="password"
```

##### 2. Run generation

Copy output command and execute it in your command line

Then config should be generated

